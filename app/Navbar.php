<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Navbar extends Model{
    //Defines the area that the user is into.
    //If theres a declared var called $area all we have to do is to apply that.
    public static function fetch($area=false, $shipping_company_id=false){
		$navbar_items = array();
		switch ($area) {
			case 'admin':
				$navbar_items[] = self::make('dashboard/admin?', '', 'fa fa-star');
				$navbar_items[] = self::make('dashboard/admin', 'nav.dashboard');
				$navbar_items[] = self::make('orders/index', 'order.index');
				$navbar_items[] = self::make('transits/index', 'transit.index');
				#$navbar_items[] = self::make('opportunities', 'opportunity.index');
				#$navbar_items[] = self::make('clients', 'client.index');
				#$navbar_items[] = self::make('transits', 'transit.index');
				#$navbar_items[] = self::make('transactions', 'transaction.index');		
				$navbar_items[] = self::make('shipping_companies', 'shipping_company.index');

				$navbar_items[] = self::make('users', 'user.index');
				#$navbar_items[] = self::make('master_points', 'master_point.index');
				#$navbar_items[] = self::make('load_types', 'load_type.index');		
				break;
			
			case 'shipping_company':
				$navbar_items[] = self::make('dashboard/shipping_company?', '', 'flaticon-truck');
				$navbar_items[] = self::make('dashboard/shipping_company', 'nav.dashboard');
				$shipping_company = ShippingCompany::find($shipping_company_id);
				$navbar_items[] = self::make('shipping_companies/settings/'.$shipping_company_id, $shipping_company->company_name);
				$navbar_items[] = self::make('drivers/index/'.$shipping_company_id, 'driver.index');
				$navbar_items[] = self::make('vehicles/index/'.$shipping_company_id, 'vehicle.index');
				$navbar_items[] = self::make('transits/index/'.$shipping_company_id, 'transit.index');
				$navbar_items[] = self::make('orders/shipping_company/'.$shipping_company_id, 'order.index');
				$navbar_items[] = self::make('orders/all/'.$shipping_company_id, 'order.opportunities');
				$navbar_items[] = self::make('withdrawals/index/'.$shipping_company_id, 'withdrawal.index');
				
				break;

			case 'driver':
			$navbar_items[] = self::make('drivers/transits?', '', 'flaticon-car');
				$navbar_items[] = self::make('drivers/transits', 'transit.my_transits');
				break;					

			default:
				$navbar_items[] = self::make('dashboard', 'nav.dashboard');
				$navbar_items[] = self::make('orders/my', 'order.my_orders');
				$navbar_items[] = self::make('transits/negatives', 'transit.negative_loads_opportunities');
				$navbar_items[] = self::make('users/my_profile', 'user.my_profile');				
				//$navbar_items[] = \App\Navbar::make('orders/create', 'order.create');
				//$navbar_items[] = self::make('users/my_account/home', 'user.my_account');
				break;
		}
        return $navbar_items;
    }

    private static function make($path, $title, $icon=false){
    	$item = new \stdClass;
		$item->path = $path;
		$item->title = $title;
		$item->icon = $icon;

    	return $item;
    }

}
