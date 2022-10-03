<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
 	public static function index($shipping_company_id=null){
		 $drivers = Driver::query();
        if(request()->search){
             $drivers = $drivers->where('name', 'like', '%'.request()->search.'%')
                ->orWhere('phone_number', 'like', '%'.request()->search.'%')
                ->orWhere('fiscal_id_number', 'like', '%'.request()->search.'%')
                ->orWhere('professional_id_number', 'like', '%'.request()->search.'%')
                ->orWhere('email', 'like', '%'.request()->search.'%');
        }
        if(request()->order_by){
            $drivers = $drivers->orderBy(request()->order_by, request()->sort);
        }
        if($shipping_company_id){
            $drivers = $drivers->where('shipping_company_id', $shipping_company_id);
        }        
        $drivers = $drivers->paginate();
        return $drivers;
	}

    public function shipping_company() {
		return $this->belongsTo(ShippingCompany::class, 'shipping_company_id');
	}


}
