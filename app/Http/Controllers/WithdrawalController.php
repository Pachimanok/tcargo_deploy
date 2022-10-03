<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Withdrawal;
use App\Log;
use App\ShippingCompany;
use App\LoadClass;
use App\BaseModel; //Para obter informações sobre os campos enumerados
use App\Form;
use Mail;

//Adição dessas 3 Facades
use Illuminate\Support\Facades\Validator; 
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Psr\Http\Message\ServerRequestInterface;
use MP;

class WithdrawalController extends Controller
{

    public function store(Request $request, $withdrawal_id = "")
    {
        if(!request()->user()->hasRole('admin')){
            abort(401, __('messages.unauthorized'));
        }

        if(!$withdrawal_id){
            $shipping_company = ShippingCompany::find(request()->shipping_company_id);
        }else{
            $withdrawal = Vehicle::find($withdrawal_id);
            $shipping_company = $withdrawal->shipping_company;
        }
        if(!request()->user()->hasRole('admin') AND $shipping_company->user_id != request()->user()->id){
            abort(401, __('messages.unauthorized'));
        }                
        $rules = array(
            'amount' => 'required',
            'description' => 'required',
            'date' => 'required',
        );
        $validator = $this->validate(request(), $rules);
        if (!empty($withdrawal_id)) {
            $withdrawal = Vehicle::find($withdrawal_id);        
            $message = 'messages.updated';
        } else {
            $withdrawal = new Withdrawal;        
            $message = 'messages.created';
            $withdrawal->shipping_company_id = $shipping_company->id;
        }
        if($request->withdrawal_type==2){
            $withdrawal->amount = $request->amount;
        }else{
            $withdrawal->amount = $request->amount*-1;
        }
        
        $withdrawal->description = $request->description;
        $withdrawal->date = date('Y-m-d H:i', strtotime($request->date));
        $withdrawal->save();
        //Redirects and show message
        return Redirect::to(url('withdrawals/index/'.$withdrawal->shipping_company->id))->with('message', __($message));
    }

    public function create(ShippingCompany $shipping_company)
    {
        if(!request()->user()->hasRole('admin')){
            abort(401, __('messages.unauthorized'));
        }

        if(!request()->user()->hasRole('admin') AND $shipping_company->user_id != request()->user()->id){
            abort(401, __('messages.unauthorized'));
        }              
        return view('withdrawals.create', array(
            'shipping_company'=> $shipping_company,
            'navbar'=>'shipping_company',
            'load_scripts'=>array('withdrawal_form.js')
        ));
    }

    public function balance(ShippingCompany $shipping_company){
        if(!request()->user()->hasRole('admin') AND $shipping_company->user_id != request()->user()->id){
            abort(401, __('messages.unauthorized'));
        }
        //Create a collection of records
        $paid_orders = Order::paid($shipping_company->id);
        $withdrawals = Withdrawal::fetch($shipping_company->id);
        $payments  = collect();

        foreach($paid_orders as $order){
            $payments->push($order);
        }
        foreach($withdrawals as $withdrawal){
            $payments->push($withdrawal);
        }        
        return view('withdrawals.index', array(
            'shipping_company'=>$shipping_company,
            'payments'=>$payments->sortBy('date'),
            'navbar'=>'shipping_company',
        ));        
    }

    public function __construct()
    {
        $this->middleware('auth');
    }


}
