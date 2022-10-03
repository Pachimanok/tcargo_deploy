<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	static function get_ranges(){
		$step = 5000;
		$ranges = array();
		$ranges[''] = __('nav.all');
		$ranges['0-'.$step] = __('order.amount_to').' '.$step;
		for ($i=1; $i < 10; $i++) {
			$min = $i*$step + 1;
			$max = ($i+1)*$step;
			$key = $min.'-'.$max;
			$label = __('order.amount_from').' '.$min.' '.__('order.amount_to').' '.$max;
			$ranges[$key] = $label;
		}
		$ranges[$max+1] = __('order.amount_from').' '.$max;
		return $ranges;
	}
	static function admin_total(){
		
		$user_total = DB::table('orders')->
			select(
				DB::raw('sum(amount) as total_amount'), 
				DB::raw('sum(weight) as total_weight'),
				DB::raw('count(*) as total_orders'),
				DB::raw('sum(amount) as total_distance')
			)->
			whereNotNull('paid')->
			get();		

		$orders = Order::limit(10)->get();
	
		$return_object = new \stdClass;
		$return_object->orders = $orders;
		$return_object->totals = $user_total->first();
		return $return_object;
	}


	static function shipping_company_total($shipping_company_id=false){
		
		$user_total = DB::table('orders')->
			select(
				DB::raw('sum(amount) as total_amount'), 
				DB::raw('sum(weight) as total_weight'),
				DB::raw('count(*) as total_orders'),
				DB::raw('sum(amount) as total_distance')
			)->
			where('shipping_company_id', $shipping_company_id)->
			whereNotNull('paid')->
			get();		

		$orders = Order::where('shipping_company_id', $shipping_company_id)->limit(10)->get();
	
		$return_object = new \stdClass;
		$return_object->orders = $orders;
		$return_object->totals = $user_total->first();
		return $return_object;
	}

	static function user_total($user_id=false){
		
		$user_total = DB::table('orders')->
			select(
				DB::raw('sum(amount) as total_amount'), 
				DB::raw('sum(weight) as total_weight'),
				DB::raw('count(*) as total_orders'),
				DB::raw('sum(amount) as total_distance')
			)->
			where('user_id', $user_id)->
			whereNotNull('paid')->
			get();		

		$orders = Order::where('user_id', $user_id)->limit(10)->get();
	
		$return_object = new \stdClass;
		$return_object->orders = $orders;
		$return_object->totals = $user_total->first();
		return $return_object;
	}

	static function paid($shipping_company_id){
		$orders = DB::table('orders')->
			where('shipping_company_id', $shipping_company_id)->
			whereNotNull('paid')->
			get();
		$orders_collection = array();
		foreach($orders as $order){
			//Create an element ready for collection build
			$orders_collection[] = (object) array(
				'date'=>$order->paid,
				'amount'=>$order->amount,
				'description'=>$order->id.' - '.$order->description
			);
		}
		return $orders_collection;
	}
	static function getPackageTypes(){
		$allTypes = array(
	        "box"=>array("grains", "minerals", "refrigerated", "industrials", "liquids", "others"),
	        "pallet"=>array("grains", "minerals", "refrigerated", "industrials", "liquids", "others"),
	        "container"=>array("grains", "minerals", "refrigerated", "industrials", "liquids", "others"),
	        "machinery"=>array("grains", "minerals", "refrigerated", "industrials", "liquids", "others"),
	        "bulk"=>array("grains", "minerals", "refrigerated", "others"),
	        "general"=>array("grains", "minerals", "refrigerated", "industrials", "liquids", "others")
	    );

	    foreach($allTypes as $packageType=>$value){
	    	
	    	$packageTypes[$packageType] = __('order.'.$packageType);

	    }

	    foreach($allTypes as $packageType=>$load_types){
	    	
	    	
	    	$types = array();
	    	foreach($load_types as $load_type){
	    		
	    		$type = new \stdClass;
	    		$type->value = $load_type;
	    		$type->text = __('order.'.$load_type);
	    		
	    		$types[] = $type;
	    		
	    	}

	    	$loadTypes[$packageType] = $types;

	    }

	    $types = new \stdClass;

		$types->packageTypes = $packageTypes;

		$types->loadTypes = $loadTypes;

	    return $types;
	}

	public function user() {
		return $this->belongsTo(User::class, 'user_id');
	}
	public function packages() {
		return $this->hasMany(Package::class, 'order_id');
	}
	public function checkpoint() {
		return $this->belongsTo(Checkpoint::class, 'checkpoint_id');
	}
	public function shipping_company() {
		return $this->belongsTo(ShippingCompany::class, 'shipping_company_id');
	}
	public function origin_master_point() {
		return $this->belongsTo(MasterPoint::class, 'origin_master_point_id');
	}
	public function destination_master_point() {
		return $this->belongsTo(MasterPoint::class, 'destination_master_point_id');
	}

}
