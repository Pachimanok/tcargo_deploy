<?php
namespace App\Http\Controllers;

use App\Order;
use App\Transit;
use App\Package;
use App\Checkpoint;
use App\User;
use App\ShippingCompany;
use App\LoadClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use \App\Notifications\OrderAssigned;

class PackageController extends Controller
{
    /*public function teste(){
        //Notify shipping_company
        $order = Order::first();
        $users = User::where('id', $order->user_id)->get(); //$order->user_id
        \Notification::send($users, new OrderAssigned($order));
    }*/
    public function unload(Package $package, $undo=false)
    {

        if(!request()->user()->hasRole('admin') AND $package->transit->shipping_company->user_id != request()->user()->id){
            abort(401, __('messages.unauthorized'));
        }               

        if($undo){
            $package->unload_date = null;
        }else{
            //Check if parent checkpoints is reached.
            if(!$package->destination_checkpoint->arrival_date){
                return back()->withInput()->withMessage(__('package.checkpoint_not_reached'));    
            }
            //Check if package is loaded
            if(!$package->load_date){
                return back()->withInput()->withMessage(__('package.package_not_loaded'));    
            }

            $package->unload_date = date("Y-m-d H:i:s");
        }
        $package->save();
        
        return back()->withInput()->withMessage(__('messages.success'));
        
    }

    public function load(Package $package, $undo=false)
    {

        if(!request()->user()->hasRole('admin') AND $package->transit->shipping_company->user_id != request()->user()->id){
            abort(401, __('messages.unauthorized'));
        }        


        if($undo){
            $package->load_date = null;
        }else{
            //Check if parent checkpoints is reached.
            if(!$package->origin_checkpoint->arrival_date){
                return back()->withInput()->withMessage(__('package.checkpoint_not_reached'));    
            }            
            $package->load_date = date("Y-m-d H:i:s");
        }
        $package->save();
        
        return back()->withInput()->withMessage(__('messages.success'));
        
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Order $order, Transit $transit)
    {

        //If order is orphan, just assign it to the shipping company here.
        if(!$order->shipping_company_id){
            $order->shipping_company_id = $transit->shipping_company_id;
            $order->save();
            $order = Order::find($order->id);
            $users = User::where('id', $order->user_id)->get();
            \Notification::send($users, new OrderAssigned($order));
        }

        //Verification
        if(!request()->user()->hasRole('admin') AND $order->shipping_company->user_id != request()->user()->id){
            abort(401, __('messages.unauthorized'));
        }          

        //Checks if order required classes are present in driver and in vehicle
        $classes_clear = true;
        $order_load_classes = array_filter(explode("|", $order->load_classes));
        $driver_load_classes = array_filter(explode("|", $transit->driver->driver_load_classes));
        $vehicle_load_classes = array_filter(explode("|", $transit->vehicle->vehicle_load_classes));
        foreach($order_load_classes as $required_class){
            if(!in_array($required_class, $driver_load_classes) OR !in_array($required_class, $vehicle_load_classes)){
                $classes_clear = false;
            }
        }
        if(!$classes_clear){
            return Redirect::back()->with('message', __('package.classes_must_match'));
        }        

        
        //Checks if it has destination and origin
        if(!request()->origin_checkpoint_id OR !request()->destination_checkpoint_id){
            return Redirect::back()->with('message', __('package.must_select_checkpoints'));
        }        

        //Checks if destination is after origin
        $origin = Checkpoint::find(request()->origin_checkpoint_id);
        $destination = Checkpoint::find(request()->destination_checkpoint_id);
        if($origin->sort >= $destination->sort){
            return Redirect::back()->with('message', __('package.unavailable_transit_sequence'));
        }        

        $package = new Package;     
        $package->order_id = $order->id;
        $package->transit_id = $transit->id;
        $package->origin_checkpoint_id = request()->origin_checkpoint_id;
        $package->destination_checkpoint_id = request()->destination_checkpoint_id;
        $package->information = request()->information;
        $package->save();
        return Redirect::to(url('packages/index/'.$order->id))->with('message', __('messages.success'));

    }

    public function delete(Package $package)
    {
        if(!request()->user()->hasRole('admin') AND $package->order->shipping_company->user_id != request()->user()->id){
            abort(401, __('messages.unauthorized'));
        }        

        if($package->load_date OR $package->unload_date){
            return Redirect::back()->with('message', __('package.package_is_picked_or_delivered'));
        }        

        $id = $package->order->id;
        $package->delete();
        return Redirect::to(url("packages/index/".$id))->with('message', __('messages.deleted'));
    }


    public function index(Order $order)
    {
        if(!request()->user()->hasRole('admin') AND $order->shipping_company->user_id != request()->user()->id){
            abort(401, __('messages.unauthorized'));
        }
        $order->load_classes = explode('|', trim($order->load_classes, '|'));        
        $packages = Package::index($order->id);
        return view('packages.index', array(
            'shipping_company'=>$order->shipping_company,
            'load_classes'=> LoadClass::all(),
            'order'=>$order,
            'packages'=>$packages,
            'navbar'=>'shipping_company',
            'load_scripts'=>array('order_list.js'),
        ));
    }    
}
