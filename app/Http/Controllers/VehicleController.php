<?php
namespace App\Http\Controllers;

use App\Vehicle;
use App\ShippingCompany;
use App\LoadClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class VehicleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(ShippingCompany $shipping_company)
    {
        if(!request()->user()->hasRole('admin') AND $shipping_company->user_id != request()->user()->id){
            abort(401, __('messages.unauthorized'));
        }              
        return view('vehicles.create', array(
            'shipping_company'=> $shipping_company,
            'load_classes'=> LoadClass::all(),
            'vehicle_types'=> Vehicle::fetch_vehicle_types(),
            'trailer_types'=> Vehicle::fetch_trailer_types(),
            'navbar'=>'shipping_company'
        ));
    }

    public function store(Request $request, $vehicle_id = "")
    {
        if(!$vehicle_id){
            $shipping_company = ShippingCompany::find(request()->shipping_company_id);
        }else{
            $vehicle = Vehicle::find($vehicle_id);
            $shipping_company = $vehicle->shipping_company;
        }
        if(!request()->user()->hasRole('admin') AND $shipping_company->user_id != request()->user()->id){
            abort(401, __('messages.unauthorized'));
        }                
        $rules = array(
            'brand' => 'required',
            'model' => 'required',
            'type' => 'required',
            'plate' => 'required',
            'registration_expiration_date' => 'required',
            'insurance_expiration_date' => 'required',
            'technical_review_expiration_date' => 'required',
            //'trailer_insurance_expiration_date' => 'required',
            //'trailer_technical_review_expiration_date' => 'required',
        );
        $validator = $this->validate(request(), $rules);
        if (!empty($vehicle_id)) {
            $vehicle = Vehicle::find($vehicle_id);        
            $message = 'messages.updated';
        } else {
            $vehicle = new Vehicle;        
            $message = 'messages.created';
            $vehicle->shipping_company_id = $shipping_company->id;
        }
        $vehicle->brand = $request->brand;
        $vehicle->model = $request->model;
        $vehicle->type = $request->type;
        $vehicle->plate = $request->plate;
        $vehicle->vehicle_load_classes = request()->load_classes?'|'.implode('|', request()->load_classes).'|':'';
        $vehicle->satellite_tracking = $request->satellite_tracking?1:0;

        //UPLOAD
        if($request->file('plate_slip_image_path')){
            $plate_slip_image_path = $request->file('plate_slip_image_path')->store('public/vehicles');
            $vehicle->plate_slip_image_path = str_replace('public/', '', $plate_slip_image_path);
        }                        

        //UPLOAD - REGISTRATION
        if($request->file('registration_image_path')){
            $registration_image_path = $request->file('registration_image_path')->store('public/vehicles');
            $vehicle->registration_image_path = str_replace('public/', '', $registration_image_path);
        }                        
        $vehicle->registration_expiration_date = $request->registration_expiration_date;

        //UPLOAD - INSURANCE
        if($request->file('insurance_image_path')){
            $insurance_image_path = $request->file('insurance_image_path')->store('public/vehicles');
            $vehicle->insurance_image_path = str_replace('public/', '', $insurance_image_path);
        }                
        $vehicle->insurance_expiration_date = $request->insurance_expiration_date;

        //UPLOAD - TECHNICAL REVIEW
        if($request->file('technical_review_image_path')){
            $technical_review_image_path = $request->file('technical_review_image_path')->store('public/vehicles');
            $vehicle->technical_review_image_path = str_replace('public/', '', $technical_review_image_path);
        }                
        $vehicle->technical_review_expiration_date = $request->technical_review_expiration_date;

        /* TRAILER */
        $vehicle->trailer_type = $request->trailer_type;
        $vehicle->trailer_plate = $request->trailer_plate;

        //UPLOAD - TRAILER PLATE SLIP
        if($request->file('trailer_plate_slip_image_path')){
            $trailer_plate_slip_image_path = $request->file('trailer_plate_slip_image_path')->store('public/vehicles');
            $vehicle->trailer_plate_slip_image_path = str_replace('public/', '', $trailer_plate_slip_image_path);
        }        

        //UPLOAD - TRAILER INSURANCE
        if($request->file('trailer_insurance_image_path')){
            $trailer_insurance_image_path = $request->file('trailer_insurance_image_path')->store('public/vehicles');
            $vehicle->trailer_insurance_image_path = str_replace('public/', '', $trailer_insurance_image_path);            
        }
        $vehicle->trailer_insurance_expiration_date = $request->trailer_insurance_expiration_date;

        //UPLOAD - TRAILER TECHNICAL REVIEW
        if($request->file('trailer_technical_review_image_path')){
            $trailer_technical_review_image_path = $request->file('trailer_technical_review_image_path')->store('public/vehicles');
            $vehicle->trailer_technical_review_image_path = str_replace('public/', '', $trailer_technical_review_image_path);            
        }        
        $vehicle->trailer_technical_review_expiration_date = $request->trailer_technical_review_expiration_date;

        $vehicle->save();
        //Redirects and show message
        return Redirect::to(url('vehicles/index/'.$vehicle->shipping_company->id))->with('message', __($message));
    }


    public function update(Vehicle $vehicle)
    {
        if(!request()->user()->hasRole('admin') AND $vehicle->shipping_company->user_id != request()->user()->id){
            abort(401, __('messages.unauthorized'));
        }        
        //Set load_classes
        $vehicle->vehicle_load_classes = explode('|', trim($vehicle->vehicle_load_classes, '|'));
        return view('vehicles.update', array(
            'load_classes'=> LoadClass::all(),
            'vehicle_types'=> Vehicle::fetch_vehicle_types(),
            'trailer_types'=> Vehicle::fetch_trailer_types(),
            'vehicle'=>$vehicle,
            'shipping_company'=>$vehicle->shipping_company,
            'navbar'=>'shipping_company'
        ));
    }

    public function restore($id)
    {
        $vehicle = Vehicle::withTrashed()->find($id);
        if(!request()->user()->hasRole('admin') AND $vehicle->shipping_company->user_id != request()->user()->id){
            abort(401, __('messages.unauthorized'));
        }
        Vehicle::withTrashed()->where('id', $id)->restore();
        return Redirect::to(url("vehicles/index/".$vehicle->shipping_company->id))->with('message', __('messages.restored'));
    }

    public function trash(ShippingCompany $shipping_company) 
    {
        if(!request()->user()->hasRole('admin') AND $shipping_company->user_id != request()->user()->id){
            abort(401, __('messages.unauthorized'));
        }        
        $vehicles = Vehicle::onlyTrashed();       
        $vehicles = $vehicles->where('shipping_company_id', $shipping_company->id)->get();
        return view('vehicles.trash', array(
            'shipping_company'=>$shipping_company,
            'vehicle_types'=> Vehicle::fetch_vehicle_types(),
            'trailer_types'=> Vehicle::fetch_trailer_types(),
            'vehicles'=>$vehicles,
            'navbar'=>'shipping_company'
        ));
    }
    public function delete(Vehicle $vehicle)
    {
        if(!request()->user()->hasRole('admin') AND $vehicle->shipping_company->user_id != request()->user()->id){
            abort(401, __('messages.unauthorized'));
        }        
        $vehicle->delete();
        return Redirect::to(url("vehicles/index/".$vehicle->shipping_company->id))->with('message', __('messages.deleted'));
    }

    public function show(Vehicle $vehicle)
    {
        if(!request()->user()->hasRole('admin') AND $vehicle->shipping_company->user_id != request()->user()->id){
            abort(401, __('messages.unauthorized'));
        }
        //Set load_classes
        $vehicle->vehicle_load_classes = explode('|', trim($vehicle->vehicle_load_classes, '|'));        
        return view('vehicles.show', array(
            'load_classes'=> LoadClass::all(),
            'vehicle_types'=> Vehicle::fetch_vehicle_types(),
            'trailer_types'=> Vehicle::fetch_trailer_types(),
            'title'=>$vehicle->shipping_company->company_name,
            'vehicle'=>$vehicle
        ));
    }

    public function index(ShippingCompany $shipping_company)
    {
        if(!request()->user()->hasRole('admin') AND $shipping_company->user_id != request()->user()->id){
            abort(401, __('messages.unauthorized'));
        }
        $vehicles = Vehicle::index($shipping_company->id);
        return view('vehicles.index', array(
            'shipping_company'=>$shipping_company,
            'vehicle_types'=> Vehicle::fetch_vehicle_types(),
            'trailer_types'=> Vehicle::fetch_trailer_types(),
            'load_classes'=> LoadClass::all(),
            'vehicles'=>$vehicles,
            'navbar'=>'shipping_company',
        ));
    }    
}
