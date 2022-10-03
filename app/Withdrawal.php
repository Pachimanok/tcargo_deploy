<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
	static function fetch($shipping_company_id){
		$withdrawals = DB::table('withdrawals')->
			where('shipping_company_id', $shipping_company_id)->
			get();
		$withdrawal_collection = array();
		foreach($withdrawals as $withdrawal){
			//Create an element ready for collection build
			$withdrawal_collection[] = (object) array(
				'date'=>$withdrawal->date,
				'amount'=>$withdrawal->amount,
				'description'=>$withdrawal->description,
			);
		}
		return $withdrawal_collection;
	}

	public function shipping_company() {
		return $this->belongsTo(ShippingCompany::class, 'shipping_company_id');
	}

}
