<?php

namespace App;

use App\ShippingCompany;
use Auth;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone_number', 'phone_number_area_code', 'social_name', 'ssid', 'city_id', 'address_street', 'address_number', 'address_complement', 'address_area', 'zip_code', 'tos_accepted',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function index(){
        $users = User::query();
        if(request()->search){
             $users = $users->where('email', 'like', '%'.request()->search.'%')
                ->orWhere('name', 'like', '%'.request()->search.'%');
        }
        if(request()->blocked!=''){
            $users = $users->where('blocked', request()->blocked);
        }                
        if(request()->order_by){
            $users = $users->orderBy(request()->order_by, request()->sort);
        }else{
            $users = $users->orderBy('id', 'desc');
        }
        $users = $users->paginate();
        return $users;
    }

    public function authorizeRoles($roles)
    {
        //If blocked, user does nothing that requires specific auth.
        if($this->blocked){
            abort(401, __('messages.unauthorized'));
        }
        if (is_array($roles)) {
            return $this->hasAnyRole($roles) || 
               abort(401, __('messages.unauthorized'));
        }
        return $this->hasRole($roles) || 
            abort(401, __('messages.unauthorized'));
    }

    public function hasRole($role)
    {
        if(Auth::user()->user_type_reference=='admin' OR Auth::user()->user_type_reference==$role){
            return true;
        }
      
    }

    public function hasAnyRole($roles)
    {
      if(Auth::user()->user_type_reference=='admin' OR in_array(Auth::user()->user_type_reference, $roles)){
            return true;
      }
    }


    public function getTypeAttribute(){
        return Auth::user()->user_type_reference;
    }

    /*Returns fisrt user's shipping_company */
    public function getUserShippingCompanyAttribute()
    {

        $user_shipping_companies = $this->getUserShippingCompaniesAttribute();
        if(isset($user_shipping_companies[0])){
          return $user_shipping_companies[0];  
        }
        
    }

    /*Returns all logged user's shipping_companies */
    public function getUserShippingCompaniesAttribute()
    {

        $user_shipping_companies = ShippingCompany::where('user_id', Auth::user()->id)
               ->orderBy('company_name', 'desc')
               ->get();

        return $user_shipping_companies;
    }

}
