<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

//Landing page
Route::get('/', function () {
    return view('welcome');
});
/*Route::get('/teste', 'ShippingCompanyController@teste');
Route::get('/teste/user', 'UserController@teste');
Route::get('/teste/order', 'PackageController@teste');*/
Auth::routes();

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});
Route::get('/countries/get_countries', 'CountryController@get_countries');
Route::get('/countries/get_states/{country_id}', 'CountryController@get_states');
Route::get('/countries/get_cities/{state_id}', 'CountryController@get_cities');
Route::get('/countries/get_city/{city_id}', 'CountryController@get_city');


//Users
Route::post('/users/store/{id}', 'UserController@store');
Route::get('/users/my_profile/{redirect?}', 'UserController@profile')->name('my_profile');
Route::get('/users', 'UserController@index');
Route::get('/users/update/{user}', 'UserController@update');
Route::get('/users/show/{user}', 'UserController@show');
Route::get('/users/status/{user}/{status}', 'UserController@status');

//Load Classes
Route::prefix('load_classes')->group(function () {
    Route::get('/', 'LoadClassController@index');
    Route::get('/create', 'LoadClassController@create');
    Route::get('/update/{load_class}', 'LoadClassController@update');    
    Route::get('/delete/{load_class}', 'LoadClassController@delete');
    Route::get('/restore/{id}', 'LoadClassController@restore');
    Route::get('/trash', 'LoadClassController@trash');
    Route::post('/store/{id?}', 'LoadClassController@store');
});

// Master Points
Route::prefix('master_points')->group(function () {
    Route::get('/', 'MasterPointsController@index');
    Route::get('/create', 'MasterPointsController@create');
    Route::get('/show/{master_point}', 'MasterPointsController@show');
    Route::get('/update/{master_point}', 'MasterPointsController@update');
    Route::get('/delete/{master_point}', 'MasterPointsController@delete');
    Route::get('/restore/{id}', 'MasterPointsController@restore');
    Route::get('/trash', 'MasterPointsController@trash');
    Route::post('/store/{id?}', 'MasterPointsController@store');
    Route::post('/find_closest', 'MasterPointsController@find_closest');    
});

//Shipping Company
Route::prefix('shipping_companies')->group(function () {
    Route::get('/', 'ShippingCompanyController@index');
    Route::get('/update/{shipping_company}', 'ShippingCompanyController@update');
    Route::get('/settings/{shipping_company}', 'ShippingCompanyController@settings');
    Route::get('/status/{shipping_company}/{status}', 'ShippingCompanyController@status');
    Route::get('/create', 'ShippingCompanyController@create')->name('create_shipping_company');
    Route::post('/store/{id?}', 'ShippingCompanyController@store');
});

//Files
Route::post('/images/delete', 'FileController@delete');
Route::get('/images/delete', 'FileController@delete'); //MUST DISABLE WHEN TEST IS OVER

// Vehicles
Route::prefix('vehicles')->group(function () {
    Route::get('/index/{shipping_company}', 'VehicleController@index');
    Route::get('/create/{shipping_company}', 'VehicleController@create');
    Route::get('/show/{vehicle}', 'VehicleController@show');
    Route::get('/update/{vehicle}', 'VehicleController@update');
    Route::get('/delete/{vehicle}', 'VehicleController@delete');
    Route::get('/restore/{vehicle}', 'VehicleController@restore');
    Route::get('/trash/{shipping_company}', 'VehicleController@trash');
    Route::post('/store/{id?}', 'VehicleController@store');
});

// Drivers
Route::prefix('drivers')->group(function () {
    Route::get('/index/{shipping_company}', 'DriverController@index');
    Route::get('/create/{shipping_company}', 'DriverController@create');
    Route::get('/show/{driver}', 'DriverController@show');
    Route::get('/update/{driver}', 'DriverController@update');
    Route::get('/delete/{driver}', 'DriverController@delete');
    Route::get('/restore/{driver}', 'DriverController@restore');
    Route::get('/trash/{shipping_company}', 'DriverController@trash');
    Route::post('/store/{id?}', 'DriverController@store');
    Route::get('/transits/', 'DriverController@transits');
});

//Orders
Route::get('/orders/my', 'OrderController@my');
Route::get('/orders/show/{id}', 'OrderController@show');
Route::get('/orders/show/{id}/{shipping_company}', 'OrderController@show_shipping_company'); //Order to be taken by Shipping Company
Route::post('/orders/store', 'OrderController@store');
Route::get('/orders/create/{checkpoint?}', 'OrderController@create')->name('create_order');
Route::get('/orders/index', 'OrderController@index');
Route::get('/orders/all/{shipping_company}', 'OrderController@index_all');
Route::get('/orders/shipping_company/{shipping_company}', 'OrderController@index_shipping_company');
Route::get('/orders/unassign/{order}', 'OrderController@unassign');
Route::get('/orders/complete/{order}/{undo?}', 'OrderController@complete');
Route::get('/orders/create_payment/{order}', 'OrderController@create_payment');
Route::get('/orders/mark_as_paid/{order}/{shipping_company?}', 'OrderController@mark_as_paid');

// Transits
Route::prefix('transits')->group(function () {
    Route::get('/index', 'TransitController@index_admin');    
    Route::get('/index/{shipping_company}', 'TransitController@index');
    Route::get('/create/{shipping_company}/{order?}', 'TransitController@create');
    Route::get('/show/{transit}/{driver?}', 'TransitController@show'); #Driver transits modifier
    Route::get('/update/{transit}', 'TransitController@update');
    Route::get('/delete/{transit}', 'TransitController@delete');
    Route::get('/restore/{transit}', 'TransitController@restore');
    Route::get('/trash/{shipping_company}', 'TransitController@trash');
    Route::post('/store/{id?}', 'TransitController@store');
    Route::get('/checkpoints/{transit}', 'TransitController@checkpoints'); //Fetches checkpoints in transit
    Route::get('/checkpoints/{transit}/add/{master_point_id}', 'TransitController@checkpoint_add'); //Adds a CP in the end of the transit
    Route::get('/checkpoints/{checkpoint}/remove', 'TransitController@checkpoint_remove');  //Adds a CP after some validations
    Route::get('/checkpoints/{transit}/sort', 'TransitController@checkpoints_sort');  //Sorts the CPs od transit after validation
    Route::get('/select/{order}/{shipping_company}', 'TransitController@select');
    Route::get('/manage/{transit}/{driver?}', 'TransitController@manage');  #Driver transits modifier
    Route::get('/check/{checkpoint}/{undo?}', 'TransitController@check');
    Route::match(['GET', 'POST'], '/negative/{checkpoint}/{undo?}', 'TransitController@negative');
    Route::get('/negatives', 'TransitController@index_negative');
});

//Packages
Route::get('/packages/index/{order}', 'PackageController@index');
Route::post('/packages/create/{order}/{transit}', 'PackageController@create');
Route::get('/packages/delete/{package}', 'PackageController@delete');
Route::get('/packages/load/{package}/{undo?}', 'PackageController@load');
Route::get('/packages/unload/{package}/{undo?}', 'PackageController@unload');

//Dashboards
Route::get('/dashboard/admin', 'DashboardController@dashboard_admin')->name('dashboard/admin'); //Admin
Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard'); //Client
Route::get('/home', 'DashboardController@dashboard')->name('home'); 
Route::get('/dashboard/shipping_company', 'DashboardController@dashboard_shipping_company')->name('dashboard/shipping_company'); //Shipping Company

//Marks notifications as read. No need for a controller. Just handle from here.
Route::post('notifications/mark_as_read/{notification_id}', function($notification_id){ 
    $notification = Auth::user()->notifications()->where('id',$notification_id)->first();
    $return = isset($notification->data['url'])?$notification->data['url']:1;
    if ($notification){ $notification->markAsRead(); return $return; }else{ return '0'; }
});

//Mercado Pago Notifications URL
Route::get('/mp_notifications', 'MercadoPagoController@mp_notifications'); //Client - TESTE ROUTE
Route::post('/mp_notifications', 'MercadoPagoController@mp_notifications'); //Client

Route::get('/withdrawals/index/{shipping_company}', 'WithdrawalController@balance');
Route::get('/withdrawals/create/{shipping_company}', 'WithdrawalController@create');
Route::post('/withdrawals/store', 'WithdrawalController@store');



//Seeeders
#Route::get('/checkpoints/seed', 'TransitController@seeder'); //Fetches checkpoints in transit
