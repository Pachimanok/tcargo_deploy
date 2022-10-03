<?php
namespace App\Http\Controllers;

use App\Driver;
use App\Transit;
use App\ShippingCompany;
use App\LoadClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class DriverController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function transits(){
        

        $transits = Transit::driver_transits(request()->user()->email);
        
        return view('transits.driver_index', array(
            'load_classes'=> LoadClass::all(),
            'transits'=>$transits,
            'navbar'=>'driver',
        ));        


    }

    public function create(ShippingCompany $shipping_company)
    {
        if(!request()->user()->hasRole('admin') AND $shipping_company->user_id != request()->user()->id){
            abort(401, __('messages.unauthorized'));
        }              
        return view('drivers.create', array(
            'shipping_company'=> $shipping_company,
            'load_classes'=> LoadClass::all(),
            'navbar'=>'shipping_company',
            'load_scripts'=>array('countries.js'),
        ));
    }

    public function store(Request $request, $driver_id = "")
    {
        if(!$driver_id){
            $shipping_company = ShippingCompany::find(request()->shipping_company_id);
        }else{
            $driver = Driver::find($driver_id);
            $shipping_company = $driver->shipping_company;
        }
        if(!request()->user()->hasRole('admin') AND $shipping_company->user_id != request()->user()->id){
            abort(401, __('messages.unauthorized'));
        }                
        $rules = array(
            'name' => 'required',
            'email' => 'required|email',
            'phone_number_area_code' => 'required',
            'phone_number' => 'required',
            'birth_date' => 'required',
            'fiscal_id_number' => 'required',
            'professional_id_number' => 'required',
            
            'city_id' => 'required|integer|min:1',
            'address_street' => 'required',
            'address_number' => 'required',
            'zip_code' => 'required',

            //'trailer_insurance_expiration_date' => 'required',
            //'trailer_technical_review_expiration_date' => 'required',
        );
        $validator = $this->validate(request(), $rules);
        if (!empty($driver_id)) {
            $driver = Driver::find($driver_id);        
            $message = 'messages.updated';
        } else {
            $driver = new Driver;        
            $message = 'messages.created';
            $driver->shipping_company_id = $shipping_company->id;
        }
        $driver->name = $request->name;
        $driver->email = $request->email;
        $driver->phone_number_area_code = $request->phone_number_area_code;
        $driver->phone_number = $request->phone_number;
        $driver->birth_date = $request->birth_date;
        $driver->fiscal_id_number = $request->fiscal_id_number;
        $driver->professional_id_number = $request->professional_id_number;

        $driver->city_id = $request->city_id;
        $driver->address_street = $request->address_street;
        $driver->address_number = $request->address_number;
        $driver->address_complement = $request->address_complement;
        $driver->address_area = $request->address_area;
        $driver->zip_code = $request->zip_code;                                        
        
        $driver->driver_load_classes = request()->load_classes?'|'.implode('|', request()->load_classes).'|':'';

        //UPLOADS
        if($request->file('license_image_path')){
            $license_image_path = $request->file('license_image_path')->store('public/drivers');
            $driver->license_image_path = str_replace('public/', '', $license_image_path);
        }
        if($request->file('medical_license_image_path')){
            $medical_license_image_path = $request->file('medical_license_image_path')->store('public/drivers');
            $driver->medical_license_image_path = str_replace('public/', '', $medical_license_image_path);
        }
        if($request->file('special_license_image_path')){
            $special_license_image_path = $request->file('special_license_image_path')->store('public/drivers');
            $driver->special_license_image_path = str_replace('public/', '', $special_license_image_path);
        }
        if($request->file('health_license_image_path')){
            $health_license_image_path = $request->file('health_license_image_path')->store('public/drivers');
            $driver->health_license_image_path = str_replace('public/', '', $health_license_image_path);
        }


        $driver->save();
        //Redirects and show message
        return Redirect::to(url('drivers/index/'.$driver->shipping_company->id))->with('message', __($message));
    }


    public function update(Driver $driver)
    {
        if(!request()->user()->hasRole('admin') AND $driver->shipping_company->user_id != request()->user()->id){
            abort(401, __('messages.unauthorized'));
        }        
        //Set load_classes
        $driver->driver_load_classes = explode('|', trim($driver->driver_load_classes, '|'));
        return view('drivers.update', array(
            'load_classes'=> LoadClass::all(),
            'driver'=>$driver,
            'shipping_company'=>$driver->shipping_company,
            'navbar'=>'shipping_company',
            'load_scripts'=>array('countries.js'),
        ));
    }

    public function restore($id)
    {
        $driver = Driver::withTrashed()->find($id);
        if(!request()->user()->hasRole('admin') AND $driver->shipping_company->user_id != request()->user()->id){
            abort(401, __('messages.unauthorized'));
        }
        Driver::withTrashed()->where('id', $id)->restore();
        return Redirect::to(url("drivers/index/".$driver->shipping_company->id))->with('message', __('messages.restored'));
    }

    public function trash(ShippingCompany $shipping_company) 
    {
        if(!request()->user()->hasRole('admin') AND $shipping_company->user_id != request()->user()->id){
            abort(401, __('messages.unauthorized'));
        }        
        $drivers = Driver::onlyTrashed();       
        $drivers = $drivers->where('shipping_company_id', $shipping_company->id)->get();
        return view('drivers.trash', array(
            'shipping_company'=>$shipping_company,
            'drivers'=>$drivers,
            'navbar'=>'shipping_company'
        ));
    }
    public function delete(Driver $driver)
    {
        if(!request()->user()->hasRole('admin') AND $driver->shipping_company->user_id != request()->user()->id){
            abort(401, __('messages.unauthorized'));
        }        
        $driver->delete();
        return Redirect::to(url("drivers/index/".$driver->shipping_company->id))->with('message', __('messages.deleted'));
    }

    public function show(Driver $driver)
    {
        if(!request()->user()->hasRole('admin') AND $driver->shipping_company->user_id != request()->user()->id){
            abort(401, __('messages.unauthorized'));
        }
        //Set load_classes
        $driver->driver_load_classes = explode('|', trim($driver->driver_load_classes, '|'));        
        return view('drivers.show', array(
            'load_classes'=> LoadClass::all(),
            'title'=>$driver->shipping_company->company_name,
            'driver'=>$driver
        ));
    }

    public function index(ShippingCompany $shipping_company)
    {
        if(!request()->user()->hasRole('admin') AND $shipping_company->user_id != request()->user()->id){
            abort(401, __('messages.unauthorized'));
        }
        $drivers = Driver::index($shipping_company->id);
        return view('drivers.index', array(
            'shipping_company'=>$shipping_company,
            'load_classes'=> LoadClass::all(),
            'drivers'=>$drivers,
            'navbar'=>'shipping_company',
        ));
    }    
}
