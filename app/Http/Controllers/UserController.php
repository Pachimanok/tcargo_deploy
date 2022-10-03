<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\BaseModel; //Para obter informações sobre os campos enumerados
use App\Form;
use Auth;
use Mail;

//Adição dessas 3 Facades
use Illuminate\Support\Facades\Validator; 
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Psr\Http\Message\ServerRequestInterface;
use \App\Notifications\UserCreated;

class UserController extends Controller
{
    /*public function teste(){
        $new_user = User::orderBy('created_at', 'desc')->first();
        $users = User::where('user_type_reference', 'admin')->get();
        \Notification::send($users, new UserCreated($users, $new_user));
    }*/
    public function show(User $user)
    {
        request()->user()->authorizeRoles('admin');
        return view('users.show', array(
            'user'=>$user,
            'navbar'=>'admin'
        ));
    }

    public function status(User $user, $status)
    {
        request()->user()->authorizeRoles('admin');
        $user->blocked = $status=='blocked'?1:0;
        $user->save();
        return Redirect::to(url()->previous())->with('message', __('user.user_'.$status));
    }

    public function update(User $user)
    {
        request()->user()->authorizeRoles('admin');
        return view('users.update', array(
            'user'=>$user,
            'navbar'=>'admin'
        ));
    }
    public function index()
    {
        request()->user()->authorizeRoles('admin');
        $users = User::index();
        return view('users.index', array(
            'users'=>$users,
            'navbar'=>'admin'
        ));
    }

    public function store(Request $request, $user_id)
    {
        $rules = array(
            'name' => 'required',
            'email' => 'required|email',
            'city_id' => 'required|integer|min:1',
            'address_street' => 'required',
            'address_number' => 'required',
            'zip_code' => 'required',
        );
        if($request->self_profile){  
            $rules['phone_number_area_code'] = 'required';
            $rules['phone_number'] = 'required';
            $rules['tos_accepted'] = 'required';
        }
        $validator = $this->validate(request(), $rules);
        $user = User::find($user_id);        
        $user->update(request()->all());
        //Redirects and show message
        $redirect = $request->redirect ? route($request->redirect) : url()->previous();
        $message = __($request->redirect=='create_order'?'order.signup_completed_place_first_order':'messages.success');
        return Redirect::to($redirect)->with('message', $message);
    }

    public function profile($redirect='dashboard')
    {
        $user = Auth::user();
        return view('users.profile', array(
            'user'=>$user,
            'redirect'=>$redirect,
            'load_scripts'=>array('countries.js'),
        ));
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

}