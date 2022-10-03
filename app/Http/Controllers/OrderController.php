<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\ShippingCompany;
use App\Checkpoint;
use App\LoadClass;
use App\BaseModel; //Para obter informações sobre os campos enumerados
use App\Form;
use App\User;
use Auth;
use Mail;

//Adição dessas 3 Facades
use Illuminate\Support\Facades\Validator; 
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Psr\Http\Message\ServerRequestInterface;
use MP;
use \App\Notifications\OrderOnNegativeCreated;

class OrderController extends Controller
{
    /*public function teste(){
        $order = Order::whereNotNull('checkpoint_id')->orderBy('created_at', 'desc')->first();
        $checkpoint = Checkpoint::find($order->checkpoint_id);
        //Notify shipping_company
        $users = User::find($checkpoint->transit->shipping_company->user_id);
        \Notification::send($users, new OrderOnNegativeCreated($order));
    }*/
    public function mark_as_paid(Order $order, $shipping_company_id=false)
    {
        //Check if user can hadle shipping company
        if(!request()->user()->hasRole('admin')){
            abort(401, __('messages.unauthorized'));
        }              
        if($shipping_company_id AND $order->paid){
            $order->withdrawal = date('Y-m-d H:i:s');
        }else{
            $order->paid = date('Y-m-d H:i:s');
        }
        $order->save();    
        return Redirect::back()->withMessage(__('messages.success'));    
    }

    public function create_payment(Order $order){
        $preferenceData = [
            'items' => [
                [
                    'title' => 'T-cargo - (Pedido: #'.$order->id.') - '.$order->description.' | From: '.$order->origin.' | To: '.$order->destination,
                    'description' => 'Descripcion de la carga '.$order->origin.' hasta '.$order->destination,
                    'quantity' => 1,
                    'currency_id' => 'ARS',
                    'unit_price' => $order->amount,
                ]
            ],
            'notification_url' => url('mp_notifications'),
            'external_reference' => $order->id,
        ];

        $preference = MP::create_preference($preferenceData);
        
        $order->payment_link = $preference['response']['init_point'];
        $order->save();

        header("Location:".$order->payment_link);
        exit;

    }

    public function complete(Order $order, $undo = false){

        //Check if user can hadle shipping company
        if(!request()->user()->hasRole('admin') AND $order->shipping_company->user_id != request()->user()->id){
            abort(401, __('messages.unauthorized'));
        }              

        foreach($order->packages as $package){
            if(!$package->load_date OR !$package->unload_date){
                return Redirect::back()->withMessage(__('order.incomplete'));    
            }
        }

        if($undo){
            if(!request()->user()->hasRole('admin')){
                abort(401, __('messages.unauthorized'));
            }                          
            $order->completed = null;    
        }else{
            $order->completed = date("Y-m-d H:i:s");    
        }
        
        $order->save();        
        
        return Redirect::back()->withMessage(__('messages.success'));    

    }

    public function unassign(Order $order)
    {
        //Check if user can hadle shipping company
        if(!request()->user()->hasRole('admin')){
            abort(401, __('messages.unauthorized'));
        }              

        if($order->paid==1){
            abort(401, __('messages.unauthorized'));
        }              

        //Must erase packages before unnasigment.
        foreach($order->packages as $package){
            $package->delete();
        }

        $order->shipping_company_id = null;
        $order->save();        
        
        return Redirect::back()->withMessage(__('messages.success'));    
        
    }


    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index_shipping_company(ShippingCompany $shipping_company)
    {
        //\DB::enableQueryLog();
        $orders = Order::where('shipping_company_id', $shipping_company->id);
        if(request()->order_by){
            $orders = $orders->orderBy(request()->order_by, request()->sort);
        }else{
            $orders = $orders->orderBy('id', 'desc');
        }
        if(request()->search){
             $orders = $orders->where('description', 'like', '%'.request()->search.'%')
                ->orWhere('origin', 'like', '%'.request()->search.'%')
                ->orWhere('destination', 'like', '%'.request()->search.'%');
        }        
        if(request()->amount){
            if (count(explode('-', request()->amount)) == 1) {
                $orders = $orders->where('amount', '>=', request()->amount);
            } else {
                $orders = $orders->whereBetween('amount', explode('-', request()->amount));
            }
        }
        $orders = $orders->paginate();
        //dd(\DB::getQueryLog());
        //dd($orders);

        return view('orders/index_shipping_company', array(
            'orders'=>$orders,
            'amount_range'=>Order::get_ranges(),
            'shipping_company'=>$shipping_company,
            'navbar'=>'shipping_company',
            'load_scripts'=>array('order_list.js'),
        ));
    }

    public function index_all(ShippingCompany $shipping_company)
    {
        //\DB::enableQueryLog();
        $orders = Order::whereNull('shipping_company_id');
        if(request()->order_by){
            $orders = $orders->orderBy(request()->order_by, request()->sort);
        }else{
            $orders = $orders->orderBy('id', 'desc');
        }
        if(request()->search){
             $orders = $orders->where('description', 'like', '%'.request()->search.'%')
                ->orWhere('origin', 'like', '%'.request()->search.'%')
                ->orWhere('destination', 'like', '%'.request()->search.'%');
        }     
        if(request()->amount){
            if (count(explode('-', request()->amount)) == 1) {
                $orders = $orders->where('amount', '>=', request()->amount);
            } else {
                $orders = $orders->whereBetween('amount', explode('-', request()->amount));
            }
        }
        $orders = $orders->paginate();
        //dd(\DB::getQueryLog());
        //dd($orders);

        return view('orders/index_all', array(
            'orders'=>$orders,
            'amount_range'=>Order::get_ranges(),
            'shipping_company'=>$shipping_company,
            'navbar'=>'shipping_company',
            'load_scripts'=>array('order_list.js'),
        ));
    }

    public function index()
    {
        //\DB::enableQueryLog();
        $orders = Order::whereNotNull('user_id');
        if(request()->order_by){
            $orders = $orders->orderBy(request()->order_by, request()->sort);
        }else{
            $orders = $orders->orderBy('id', 'desc');
        }
        if(request()->search){
             $orders = $orders->where('description', 'like', '%'.request()->search.'%')
                ->orWhere('origin', 'like', '%'.request()->search.'%')
                ->orWhere('destination', 'like', '%'.request()->search.'%');
        }        
        if(request()->amount){
            if (count(explode('-', request()->amount)) == 1) {
                $orders = $orders->where('amount', '>=', request()->amount);
            } else {
                $orders = $orders->whereBetween('amount', explode('-', request()->amount));
            }
        }    
        $orders = $orders->paginate();
        //dd(\DB::getQueryLog());
        //dd($orders);

        return view('orders/index', array(
            'orders'=>$orders,
            'amount_range'=>Order::get_ranges(),
            'navbar'=>'admin',
            'load_scripts'=>array('order_list.js'),
        ));
    }

    public function my()
    {
        $orders = Order::where('user_id', auth()->user()->id);
        if(request()->order_by){
            $orders = $orders->orderBy(request()->order_by, request()->sort);
        }else{
            $orders = $orders->orderBy('id', 'desc');
        }
        if(request()->id){
             $orders = $orders->where('id', '=', request()->id);
        }
        if(request()->search){
             $orders = $orders->where('description', 'like', '%'.request()->search.'%')
                ->orWhere('origin', 'like', '%'.request()->search.'%')
                ->orWhere('destination', 'like', '%'.request()->search.'%');
        }      
        if(request()->amount){
            if (count(explode('-', request()->amount)) == 1) {
                $orders = $orders->where('amount', '>=', request()->amount);
            } else {
                $orders = $orders->whereBetween('amount', explode('-', request()->amount));
            }
        }  
        $orders = $orders->paginate();
        return view('orders/my', array(
            'orders'=>$orders,
            'amount_range'=>Order::get_ranges(),
            'load_scripts'=>array('order_list.js'),
        ));
    }

    public function create(Checkpoint $checkpoint, Request $request)
    {
        if(!Auth::user()->tos_accepted){
           return Redirect::action('UserController@profile', ['redirect' => 'create_order'])->withMessage(__('order.complete_user_signup_alert'));
        }

        $types = Order::getPackageTypes();
        return view('orders.create', array(
            //'orderStatuses'=>$orderStatuses,
            'load_classes'=> LoadClass::all(),
            'packageTypes'=>$types->packageTypes,
            'loadTypes'=>$types->loadTypes,
            'checkpoint'=>$checkpoint,
            'origin_checkpoint_coords'=> $checkpoint->exists ? $checkpoint->master_point->latitude.','.$checkpoint->master_point->longitude : null,
            'load_scripts'=>array('order_form.js'),
        ));
    }


    public function store(Request $request)
    {
        /*
        print_r($_POST);
        echo "<a href='javascript:history.back(-1);'>Back</a>";
        exit;
        */
        $rules = array(
            'description' => 'required|string',
            /*'weight' => 'numeric',
            'width' => 'numeric',
            'height' => 'numeric',
            'length' => 'numeric',*/
            'package_type' => 'string',
            'load_type' => 'string',
            'origin' => 'required',
            'origin_coords' => 'required',
            'destination' => 'required',
            'destination_coords' => 'required',
            'amount' => 'required', 
            'origin_period_end'=>'nullable|date|after:origin_period_start',
            'destination_period_end'=>'nullable|date|after:destination_period_start',
            'destination_period_start'=>'nullable|date|after:origin_period_start',
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
           return Redirect::route('create_order', array('checkpoint'=>$request->checkpoint_id))->withErrors($validator)->withInput();
        } else {
            $order = new Order;
            $order->user_id = Auth::user()->id;
            $order->description = $request->description;
            $order->package_type = $request->package_type;
            $order->load_type    = $request->load_type;
            if(is_array(request()->load_classes)){
                $order->load_classes = implode('|', request()->load_classes).'|';    
            }else{
                $order->load_classes = request()->load_classes;    
            }
            $order->weight = $request->weight?$request->weight:null;
            $order->width = $request->width?$request->width:null;
            $order->height = $request->height?$request->height:null;
            $order->length = $request->length?$request->length:null;
            $order->insurance = $request->insurance ? 1 : 0 ;
            /* ORIGIN */
            $order->origin = $request->origin;
            $order->origin_coords = $request->origin_coords;
            $order->origin_master_point_id = $request->origin_master_point_id;
            $order->origin_period_start = $request->origin_period_start ? date('Y-m-d H:i', strtotime($request->origin_period_start)) : null ;
            $order->origin_period_end = $request->origin_period_end ? date('Y-m-d H:i', strtotime($request->origin_period_end)) : null ;
            $order->origin_period_night = $request->origin_period_night ? 1 : 0 ;
            $order->origin_notes = $request->origin_notes;
            /* DESTINATION */
            $order->destination = $request->destination;
            $order->destination_coords = $request->destination_coords;
            $order->destination_master_point_id = $request->destination_master_point_id;
            $order->destination_period_start = $request->destination_period_start ? date('Y-m-d H:i', strtotime($request->destination_period_start)) : null ;
            $order->destination_period_end = $request->destination_period_end ? date('Y-m-d H:i', strtotime($request->destination_period_end)) : null ;
            $order->destination_period_night = $request->destination_period_night ? 1 : 0 ;
            $order->destination_notes = $request->destination_notes;
            /* CONCLUSION */
            $order->amount = $request->amount;
            $order->user_notes = $request->user_notes;
            $order->checkpoint_id = $request->checkpoint_id?$request->checkpoint_id:null;
            //$order->status = 'pending_payment';
            /*Verifies if $request->store equals true - if, not, shows the confirmation screen*/
            if(!$request->store){
                return view('orders.confirm', array(
                    'order'=>$order->getAttributes(),
                    'load_classes'=> LoadClass::all(),
                    'load_scripts'=>array('confirm_order_form.js'),
                ));
            }else{
                $order->save();
                if($request->checkpoint_id){
                    
                    $checkpoint = Checkpoint::find($request->checkpoint_id);
                    //Notify shipping_company
                    $users = User::find($checkpoint->transit->shipping_company->user_id);
                    \Notification::send($users, new OrderOnNegativeCreated($order));

                }


            }
            return Redirect::to(url('orders/my'));
        }
    }

    public function show_shipping_company($id, ShippingCompany $shipping_company)
    {
        $order = Order::find($id);
        $order->load_classes = explode('|', trim($order->load_classes, '|'));        
        return view('orders.show_shipping_company', array(
            'title'=>$order->description, 
            'shipping_company'=>$shipping_company,
            'load_classes'=> LoadClass::all(),
            'order'=>$order
        ));
    }

    public function show($id)
    {
        $order = Order::find($id);
        $order->load_classes = explode('|', trim($order->load_classes, '|'));        
        return view('orders.show', array(
            'title'=>$order->description, 
            'load_classes'=> LoadClass::all(),
            'order'=>$order
        ));
    }

/*
    public function edit($id)
    {
        $order = Order::find($id);
        $orderStatuses = BaseModel::getEnumOptions('orders', 'status', 'order');
        $delegationOptions = ShippingCompany::getDelegationOptions();
      
        //Defines selected delegation option
        if($order->shipping_company_id){
            $order->delegation = $order->shipping_company_id;
        }elseif($order->published){
            $order->delegation = 'p';
        }elseif(!$order->published){
            $order->delegation = '0';
        }
      
        return view('orders.update', array('order'=>$order, 'orderStatuses'=>$orderStatuses,  'delegationOptions'=>$delegationOptions));
    }
*/
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }



}
