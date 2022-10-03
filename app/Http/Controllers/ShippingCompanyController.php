<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\ShippingCompany;
use App\User;
use Auth;
use \App\Notifications\ShippingCompanyCreated;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator; 
use Illuminate\Support\Facades\Input;

class ShippingCompanyController extends Controller
{
    /*public function teste(){
        $shipping_company = ShippingCompany::first();
        $users = User::where('user_type_reference', 'admin')->get();
        \Notification::send($users, new ShippingCompanyCreated($shipping_company, $users));
    }*/
    public function create(Request $request)
    {
        if(count(Auth::user()->user_shipping_companies)>0){
           return Redirect::route('dashboard')->withMessage(__('shipping_company.user_already_have_shipping_company'));
        }
        if(!Auth::user()->tos_accepted){
           return Redirect::action('UserController@profile', ['redirect' => 'create_shipping_company'])->withMessage(__('shipping_company.complete_user_signup_alert'));
        }
        return view('shipping_company.create', array(
            'load_scripts'=>array('countries.js'),
        ));
    }

    public function status(ShippingCompany $shipping_company, $status)
    {
        request()->user()->authorizeRoles('admin');
        $shipping_company->blocked = $status=='blocked'?1:0;
        $shipping_company->save();
        //$message = $status?$status:'unblocked';
        $message = __('messages.'.$status);
        //echo $message; 
        return Redirect::to(url()->previous())->with('message', $message);
    }

    public function store(Request $request, $shipping_company_id="")
    {
        $rules = array(
            'company_name' => 'required|string',
            'social_name' => 'required|string',
            'fiscal_id_number' => 'required|string',
            'phone_number_area_code' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'contact_name' => 'required|string',
            'city_id' => 'required|integer|min:1',
            'address_street' => 'required',
            'address_number' => 'required',
            'zip_code' => 'required',
        );
        if($request->admin_update AND request()->user()->hasRole('admin')){
            $rules['order_fee_percentage'] = 'required|integer|min:0';
        }
        $validator = $this->validate(request(), $rules);

        //Select the appropiate method
        if (!empty($shipping_company_id)) {
            $shipping_company = ShippingCompany::find($shipping_company_id); 
            $message = 'messages.updated';
        } else {
            $shipping_company = new ShippingCompany;
            $message = 'messages.created';
        }            
    
        //Permissions and block if not creating
        if(!request()->create){
            if($request->admin_update OR request()->user()->id != $shipping_company->user_id){
                request()->user()->authorizeRoles('admin');
            }elseif($shipping_company->blocked){
                abort(401, __('messages.unauthorized'));
            }                    
        }


        $shipping_company->user_id = Auth::user()->id;
        $shipping_company->company_name = $request->company_name;
        $shipping_company->social_name = $request->social_name;
        $shipping_company->fiscal_id_number = $request->fiscal_id_number;
        $shipping_company->city_id = $request->city_id;
        $shipping_company->address_street = $request->address_street;
        $shipping_company->address_number = $request->address_number;
        $shipping_company->address_complement = $request->address_complement;
        $shipping_company->address_area = $request->address_area;
        $shipping_company->zip_code = $request->zip_code;
        $shipping_company->phone_number_area_code = $request->phone_number_area_code;
        $shipping_company->phone_number = $request->phone_number;
        $shipping_company->email = $request->email;
        $shipping_company->contact_name = $request->contact_name;
        if($request->admin_update AND request()->user()->hasRole('admin')){
            $shipping_company->order_fee_percentage = $request->order_fee_percentage;
        }
        $shipping_company->save();

        //Sets the redirection 
        if($request->admin_update){
            $redirect = url('/shipping_companies');
        }else{
            //Notify admins when shipping company is created
            $users = User::where('user_type_reference', 'admin')->get();
            \Notification::send($users, new ShippingCompanyCreated($shipping_company));
            /* - -------------------------------- -*/

            $redirect = url('/dashboard/shipping_company');
        }
        return Redirect::to($redirect)->with('message', __($message));

    }
    public function settings(ShippingCompany $shipping_company)
    {
        if(request()->user()->id != $shipping_company->user_id || $shipping_company->blocked){
            abort(401, __('messages.unauthorized'));
        }
        return view('shipping_company.settings', array(
            'shipping_company'=>$shipping_company,
            'load_scripts'=>array('countries.js'),
            'navbar'=>'shipping_company',
        ));
    }
    public function update(ShippingCompany $shipping_company)
    {
        request()->user()->authorizeRoles('admin');    
        return view('shipping_company.update', array(
            'shipping_company'=>$shipping_company,
            'load_scripts'=>array('countries.js'),
            'navbar'=>'admin',
        ));
    }
    public function index()
    {
        request()->user()->authorizeRoles('admin');
        $shipping_companies = ShippingCompany::index();
        return view('shipping_company.index', array(
            'shipping_companies'=>$shipping_companies,
            'navbar'=>'admin'
        ));
    }

}
