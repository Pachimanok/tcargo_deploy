<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transit extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public static function driver_transits($driver_email){
        
        #Fetch driver ids from e-mail
        $drivers = Driver::where('email', $driver_email)->get();
        
        $driver_transits = array();

        foreach($drivers as $driver){
           
            $transits = Transit::where('driver_id', $driver->id)->get();
            foreach($transits as $transit){
                $driver_transits[] = $transit;
            }
            

        }

       return $driver_transits;
   }

    public static function select_index($id=false){
         $transits = Transit::query();
        if($id){
            $transits = $transits->where('shipping_company_id', $id);    
        }
        $transits = $transits->orderBy('id', 'desc');
        $transits = $transits->get();
        return $transits;
    }

 	public static function index($id=false){
		 $transits = Transit::query();
        if(request()->search){
            /*TODO: Date filter*/
             /*$transits = $transits->where('name', 'like', '%'.request()->search.'%')
                ->orWhere('email', 'like', '%'.request()->search.'%');*/
        }
        if($id){
            $transits = $transits->where('shipping_company_id', $id);    
        }
        $transits = $transits->orderBy('id', 'desc');

        $transits = $transits->paginate();
        return $transits;
	}

    public function shipping_company() {
		return $this->belongsTo(ShippingCompany::class, 'shipping_company_id');
	}

    public function driver() {
        return $this->belongsTo(Driver::class, 'driver_id');
    }

    public function vehicle() {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }
    public function checkpoints() {
        return $this->hasMany(Checkpoint::class, 'transit_id')->ordered();
    }

}
