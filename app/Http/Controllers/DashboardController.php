<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\ShippingCompany;

use Auth;

use App\Notifications\InvoicePaid;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard_admin()
    {
        request()->user()->authorizeRoles('admin');

        $period = Order::admin_total();
        return view('dashboard.home_admin', array(
            'navbar'=>'admin',
            'period'=>$period,            
        ));
    }

    public function dashboard_shipping_company()
    {
        $shipping_company = Auth::user()->user_shipping_company;
        request()->user()->authorizeRoles('standard');
        $period = Order::shipping_company_total($shipping_company->id);
        return view('dashboard.home_shipping_company', array(
            'navbar'=>'shipping_company',
            'shipping_company' => $shipping_company,
            'period'=>$period,            
        ));
    }

    public function dashboard()
    {
        
        $navbar = \Auth::user()->type=='driver'?'driver':false;
        $period = Order::user_total(Auth::user()->id);
        return view('dashboard.home_customer', array(
            'navbar'=>$navbar,
            'period'=>$period,
        ));
    }

}