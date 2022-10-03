<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MasterPoint;
use Illuminate\Support\Facades\Redirect;

class MasterPointsController extends Controller
{
    public function find_closest(){
        //Sets the point as an array
        $point = array('latitude'=>request()->latitude, 'longitude'=>request()->longitude);
        $closest_master_point = MasterPoint::fetch_closest_master_point($point);
        return $closest_master_point;
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(MasterPoint $master_point)
    {
        request()->user()->authorizeRoles('admin');
        return view('master_points.show', array(
            'title'=>$master_point->name,
            'master_point'=>$master_point
        ));
    }
    public function index()
    {
        request()->user()->authorizeRoles('admin');
        $master_points = MasterPoint::index();

        /*SEEDER GENERATOR*/
        /*
        echo '<pre>';
        foreach($master_points as $master_point){
            echo "
                DB::table('master_points')->insert([
                    'name' => '".$master_point->name."',
                    'address' => '".$master_point->address."',
                    'description' => '".$master_point->description."',
                    'latitude' => '".$master_point->latitude."',
                    'longitude' => '".$master_point->longitude."',
                    'created_at' => \$now->toDateTimeString(),
                    'updated_at' => \$now->toDateTimeString(),
                ]);
            ";
        }
        echo '</pre>';
        exit; */
        return view('master_points.index', array(
            'master_points'=>$master_points,
            'navbar'=>'admin'
        ));
    }

    public function create()
    {
        request()->user()->authorizeRoles('admin');
        return view('master_points.create', array(
            'navbar'=>'admin',
            'load_scripts'=>array('master_point_form.js')
        ));
    }

    public function store(Request $request, $master_point_id = "")
    {
        request()->user()->authorizeRoles('admin');
        $rules = array(
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
            //'latitude' => 'required',
            //'longitude' => 'required',
        );
        $validator = $this->validate(request(), $rules);
        if (!empty($master_point_id)) {
            $master_point = MasterPoint::find($master_point_id);        
            $message = 'messages.updated';
        } else {
            $master_point = new MasterPoint;        
            $message = 'messages.created';
        }
        $master_point->name = $request->name;
        $master_point->description = $request->description;
        $master_point->address = $request->address;
        $master_point->latitude = $request->latitude;
        $master_point->longitude = $request->longitude;
        $master_point->save();
        //Redirects and show message
        return Redirect::to('/master_points')->with('message', __($message));
    }

    public function update(MasterPoint $master_point)
    {
        request()->user()->authorizeRoles('admin');
        return view('master_points.update', array(
            'master_point'=>$master_point,
            'navbar'=>'admin',
            'load_scripts'=>array('master_point_form.js')
        ));
    }

    public function delete(MasterPoint $master_point)
    {
        request()->user()->authorizeRoles('admin');
        $master_point->delete();
        return Redirect::to(url("master_points"))->with('message', __('messages.deleted'));
    }

    public function restore($id)
    {
        request()->user()->authorizeRoles('admin');
        MasterPoint::withTrashed()
        ->where('id', $id)
        ->restore();
        return Redirect::to(url("master_points"))->with('message', __('messages.restored'));
    }

    public function trash() 
    {
        request()->user()->authorizeRoles('admin');
        $master_points = MasterPoint::onlyTrashed();
        if(request()->search){
             $master_points= $master_points->where('name', 'like', '%'.request()->search.'%');
        }
        if(request()->order_by){
            $master_points= $master_points->orderBy(request()->order_by, request()->sort);
        }        
        $master_points= $master_points->paginate(4);
        return view('master_points.trash', array(
            'master_points'=>$master_points,
            'navbar'=>'admin'
        ));
    }
}
