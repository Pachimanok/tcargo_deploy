<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterPoint extends Model
{

	use SoftDeletes;
	protected $dates = ['deleted_at'];

    public static function fetch_closest_master_point($point, $range_factor=0) {      
       //Takes bot coordinates and make a range for each
        $lat_round = round($point['latitude'], 1);
        $lat_range = array($lat_round-$range_factor, $lat_round+$range_factor);
        $long_round = round($point['longitude'], 1);
        $long_range = array($long_round-$range_factor, $long_round+$range_factor);
        //echo implode('|', $lat_range).'..................'.implode('|', $long_range).'<hr>';

        //Query the database to find MPs within the range
        #\DB::enableQueryLog();
        $master_points = MasterPoint::whereBetween('latitude', $lat_range)->whereBetween('longitude', $long_range)->get();
        $total = $master_points->count();
        //echo 'TOTAL :'.$total.'<hr>';
        #dd(\DB::getQueryLog());       

        //If it finds one - returns its ID
        if ($total == 1) {
            return $master_points->first();
            
        //If it finds any between 2 and 10 runs the distance matrix
        }elseif ($total > 0 AND  $total <= 10) {

            //Gets the closest in the distance matrix
            $url = 'https://maps.googleapis.com/maps/api/distancematrix/json?units=kilometers';
            $url .='&origins='.$point['latitude'].','.$point['longitude'];
            $master_points_string = '';
            foreach($master_points as $master_point){
                $master_points_string .= $master_point->latitude.','.$master_point->longitude.'|';
            }
            $url .='&destinations='.rtrim($master_points_string, '|');
            $url .= '&key=AIzaSyBpDDz78g16QPdPatf138KcRu_2OlihaWY';

            $arrContextOptions=array(
                "ssl"=>array(
                    "verify_peer"=>false,
                    "verify_peer_name"=>false,
                ),
            );  
            $contents = file_get_contents($url, false, stream_context_create($arrContextOptions));
            $results = json_decode($contents);

            //Determine wich is the closest in the collection and sets the return key
            $return_key = 0;
            $min_distance = false;
            foreach($results->rows[0]->elements as $key=>$object){
                //If its the shortest distance, sets as the selected return object
                if(!$min_distance OR $object->distance->value < $min_distance){
                    $min_distance = $object->distance->value;
                    $return_key = $key;
                }
            }
            $return_key = 1;
            
            //Returns it.
            return $master_points[$return_key];
        
        //If it doesnot find, try it with a wider range.
        }elseif($total == 0){
            $range_factor = $range_factor+0.01; //Expands area
            //echo 'will expand';
            return MasterPoint::fetch_closest_master_point($point, $range_factor);
        
        //If it finds more than 10, try again with a smaller 0.01 range.    
        }elseif($total > 10) {
            $range_factor = $range_factor-0.01; //Reduces area
            //echo 'will reduce';
            return MasterPoint::fetch_closest_master_point($point, $range_factor);
        }
    }

	public static function index(){
        $master_points= MasterPoint::query();
        if(request()->search){
             $master_points= $master_points->where('name', 'like', '%'.request()->search.'%');
        }
        if(request()->order_by){
            $master_points= $master_points->orderBy(request()->order_by, request()->sort);
        }        
        $master_points = $master_points->paginate();
        return $master_points;
	}

}
