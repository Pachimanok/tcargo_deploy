<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingCompany extends Model
{
    /*
    static function getDelegationOptions(){

		$default_options = array(
    		'0'=>__('order.hidden'),
    		'p'=>__('order.published'),
    	);

		$shipping_companies = ShippingCompany::all();
		$select_shipping_companies = array();

		foreach($shipping_companies as $shipping_company) {
		    $select_shipping_companies[$shipping_company->id] = $shipping_company->company_name;
		}    	


		return array(
			__('order.undelegate')=>$default_options,
			__('order.delegate')=>$select_shipping_companies
		);

    }
    */

    public function city(){
        return $this->belongsTo(City::class, 'city_id');
    }

    public function user(){
    	return $this->belongsTo(User::class, 'user_id');
    }
    public function drivers() {
        return $this->hasMany(Driver::class, 'shipping_company_id');
    }
    public function vehicles() {
        return $this->hasMany(Vehicle::class, 'shipping_company_id');
    }

    public static function index(){
        $shipping_companies = ShippingCompany::query();
        if(request()->search){
             $shipping_companies = $shipping_companies->where('company_name', 'like', '%'.request()->search.'%')
                ->orWhere('social_name', 'like', '%'.request()->search.'%');
        }
        if(request()->blocked!=''){
            $shipping_companies = $shipping_companies->where('blocked', request()->blocked);
        }                
        if(request()->order_by){
            $shipping_companies = $shipping_companies->orderBy(request()->order_by, request()->sort);
        }else{
            $shipping_companies = $shipping_companies->orderBy('id', 'desc');
        }
        $shipping_companies = $shipping_companies->paginate();
        return $shipping_companies;
    }

}
