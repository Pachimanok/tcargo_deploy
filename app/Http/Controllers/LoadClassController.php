<?php
namespace App\Http\Controllers;

use App\LoadClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class LoadClassController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        request()->user()->authorizeRoles('admin');
        return view('load_classes.create', array(
            'navbar'=>'admin'
        ));
    }

    public function update(LoadClass $load_class)
    {
        request()->user()->authorizeRoles('admin');
        return view('load_classes.update', array(
            'load_class'=>$load_class,
            'navbar'=>'admin'
        ));
    }

    public function index()
    {
        request()->user()->authorizeRoles('admin');
        $load_classes = LoadClass::index();
        return view('load_classes.index', array(
            'load_classes'=>$load_classes,
            'navbar'=>'admin'
        ));
    }

    public function store(Request $request, $load_id = "")
    {
        request()->user()->authorizeRoles('admin');
        $rules = array(
            'name' => 'required'
        );
        $validator = $this->validate(request(), $rules);
        if (!empty($load_id)) {
            $load_class = LoadClass::find($load_id);        
            $message = 'messages.updated';
        } else {
            $load_class = new LoadClass;        
            $message = 'messages.created';
        }
        $load_class->name = $request->name;
        $load_class->save();
        //Redirects and show message
        return Redirect::to('load_classes')->with('message', __($message));
    }

    public function delete(LoadClass $load_class)
    {
        request()->user()->authorizeRoles('admin');
        $load_class->delete();
        return Redirect::to(url("load_classes"))->with('message', __('messages.deleted'));
    }

    public function restore($id)
    {
        request()->user()->authorizeRoles('admin');
        LoadClass::withTrashed()
        ->where('id', $id)
        ->restore();
        return Redirect::to(url("load_classes"))->with('message', __('messages.restored'));
    }

    public function trash() 
    {
        request()->user()->authorizeRoles('admin');
        $load_classes = LoadClass::onlyTrashed();       
        $load_classes = $load_classes->get();
        return view('load_classes.trash', array(
            'load_classes'=>$load_classes,
            'navbar'=>'admin'
        ));
    }
}
