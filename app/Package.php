<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
 	public static function index($order_id=null){
		 $packages = Package::query();
        if(request()->order_by){
            $packages = $packages->orderBy(request()->order_by, request()->sort);
        }
        if($order_id){
            $packages = $packages->where('order_id', $order_id);
        }        
        $packages = $packages->paginate();
        return $packages;
	}

    public function order() {
		return $this->belongsTo(Order::class, 'order_id');
	}

    public function transit() {
        return $this->belongsTo(Transit::class, 'transit_id');
    }

    public function origin_checkpoint() {
        return $this->belongsTo(Checkpoint::class, 'origin_checkpoint_id');
    }
    public function destination_checkpoint() {
        return $this->belongsTo(Checkpoint::class, 'destination_checkpoint_id');
    }    

}