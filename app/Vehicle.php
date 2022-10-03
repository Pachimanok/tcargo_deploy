<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    public static function fetch_trailer_types(){
        return array(
            1=>__('vehicle.no_trailer'),
            2=>__('vehicle.side_kit'),
            3=>__('vehicle.trailer_open'),
            4=>__('vehicle.trailer_closed'),
            5=>__('vehicle.half_trailer_open'),
            6=>__('vehicle.half_trailer_closed'),
            7=>__('vehicle.half_b_train_open'),
            8=>__('vehicle.half_b_train_closed'),
        );
    }

    public static function fetch_vehicle_types(){
        return array(
            1=>__('vehicle.type_truck_simple'),
            2=>__('vehicle.type_truck_3_axle'),
        );
    }
	public static function index($shipping_company_id=null){
		 $vehicles = Vehicle::query();
        if(request()->search){
             $vehicles = $vehicles->where('brand', 'like', '%'.request()->search.'%')
                ->orWhere('model', 'like', '%'.request()->search.'%')
                ->orWhere('plate', 'like', '%'.request()->search.'%');
        }
        if($shipping_company_id){
            $vehicles = $vehicles->where('shipping_company_id', $shipping_company_id);
        }

        if(request()->order_by){
            $vehicles = $vehicles->orderBy(request()->order_by, request()->sort);
        }
        $vehicles = $vehicles->paginate();
        return $vehicles;
	}
    public function shipping_company(){
        return $this->belongsTo(ShippingCompany::class, 'shipping_company_id');
    }
    use SoftDeletes;
    protected $dates = ['deleted_at'];

}
