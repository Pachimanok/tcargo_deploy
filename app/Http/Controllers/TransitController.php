<?php
namespace App\Http\Controllers;
use App\MasterPoint;
use App\Checkpoint;
use App\Order;
use App\Transit;
use App\Vehicle;
use App\Driver;
use App\ShippingCompany;
use App\LoadClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class TransitController extends Controller
{
    /*SEEDER GENERATOR*/
    /*
    public function seeder(){
        $checkpoints = Checkpoint::all();
        //dd($checkpoints);
        
        echo '<pre>';
        foreach($checkpoints as $checkpoint){
            echo "
        DB::table('checkpoints')->insert([
            'transit_id' => '".$checkpoint->transit_id."',
            'master_point_id' => '".$checkpoint->master_point_id."',
            'sort' => '".$checkpoint->sort."',
            'arrival_date' => null,
            'arrival_ip' => '".$checkpoint->arrival_ip."',
            'information' => '".$checkpoint->information."',                    
            'created_at' => \$now->toDateTimeString(),
            'updated_at' => \$now->toDateTimeString(),
        ]);
            ";
        }
        echo '</pre>';
        exit; 
    }
    */

    public function index_negative(){
        $negative_checkpoints = Checkpoint::index_negative();

        return view('transits.index_negatives', array(
            'negative_checkpoints'=>$negative_checkpoints,
            'load_classes'=> LoadClass::all(),
        ));
    }

    public function negative(Checkpoint $checkpoint, $undo=false)
    {

        if(!request()->user()->hasRole('admin') AND $checkpoint->transit->shipping_company->user_id != request()->user()->id){
            abort(401, __('messages.unauthorized'));
        }        

        if($undo){
            $checkpoint->negative = '0';
            $checkpoint->negative_start = null;
            $checkpoint->negative_start = null;
        }else{
            $checkpoint->negative = '1';
            $checkpoint->negative_start = request()->negative_start ? date('Y-m-d H:i', strtotime(request()->negative_start)) : null;
            $checkpoint->negative_end = request()->negative_end ? date('Y-m-d H:i', strtotime(request()->negative_end)) : null;
        }
        $checkpoint->save();
        
        return back()->withInput()->withMessage(__('messages.success'));
        
    }

    public function check(Checkpoint $checkpoint, $undo=false)
    {

        if(!request()->user()->hasRole('admin') AND $checkpoint->transit->shipping_company->user_id != request()->user()->id){
            abort(401, __('messages.unauthorized'));
        }        


        if($undo){
            //Check if theres no load or unload done in the checkpoint
            $completed_tasks = false;
            foreach($checkpoint->loads as $load){
                if($load->load_date){
                    $completed_tasks = true;
                    break;
                }
            }
            foreach($checkpoint->unloads as $unload){
                if($unload->unload_date){
                    $completed_tasks = true;
                    break;
                }
            }            
            if($completed_tasks){
                return back()->withInput()->withMessage(__('transit.completed_tasks_found'));    
            }                               

            $checkpoint->arrival_date = null;
            $checkpoint->arrival_ip = null;
        }else{

            //Check if previous checkpoints are all reached.
            $missing_reaches = false;
            foreach($checkpoint->transit->checkpoints as $test_checkpoint){
                if(($test_checkpoint->id != $checkpoint->id) AND !$test_checkpoint->arrival_date){
                    $missing_reaches = true;
                }elseif($test_checkpoint->id == $checkpoint->id){
                    break;
                }
            }
            if($missing_reaches){
                return back()->withInput()->withMessage(__('transit.previous_checkpoints_not_reached'));    
            }                   

            $checkpoint->arrival_date = date("Y-m-d H:i:s");
            $checkpoint->arrival_ip = $_SERVER['REMOTE_ADDR'];
        }
        $checkpoint->save();
        
        return back()->withInput()->withMessage(__('messages.success'));
        
    }

    public function manage(Transit $transit, $driver=false)
    {
        if(!request()->user()->hasRole('admin') AND $transit->shipping_company->user_id != request()->user()->id){
            abort(401, __('messages.unauthorized'));
        }
        return view('packages.manage', array(
            'title'=>$transit->shipping_company->company_name,
            'transit'=>$transit,
            'navbar'=>$driver?'driver':'shipping_company',
            'shipping_company'=>$transit->shipping_company,
            'load_scripts'=>array('transit_manage.js')
        ));

    }

    public function select(Order $order, ShippingCompany $shipping_company)
    {
        if(!request()->user()->hasRole('admin') AND $shipping_company->user_id != request()->user()->id){
            abort(401, __('messages.unauthorized'));
        }
        $order->load_classes = explode('|', trim($order->load_classes, '|'));        
        $transits = Transit::select_index($shipping_company->id);
        return view('transits.selector', array(
            'order'=>$order,
            'load_classes'=> LoadClass::all(),
            'shipping_company'=>$shipping_company,
            'transits'=>$transits,
            'navbar'=>'shipping_company',
            'load_scripts'=>array('order_list.js'),
        ));
    }    

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkpoints_sort(Transit $transit)
    {

        if(!request()->user()->hasRole('admin') AND $transit->shipping_company->user_id != request()->user()->id){
            abort(401, __('messages.unauthorized'));
        }        

        #Testing section before commiting
        $i = 0;
        $unloads_found = array();
        
        foreach(request()->checkpoints as $checkpoint_id){
            $i++;
            $checkpoint = Checkpoint::find($checkpoint_id);
            //Reached checkpoints cant be moved
            if($checkpoint->sort != $i AND $checkpoint->arrival_date){
                echo __('transit.checkpoint_already_reached');
                exit;
            }
            //Deliveries must be after pickups - for any load found, unload must no be present.
            foreach($checkpoint->unloads as $unload){
                //Maps unloads into array
                $unloads_found[] = $unload->id;
            }
            foreach($checkpoint->loads as $load){
                //Check if package is not 'wrongly' unloaded
                if(in_array($load->id, $unloads_found)){
                    echo __('transit.loads_must_precede_unloads');
                    exit;                                
                }
            }            

        }        


        //Commiting section
        $i = 0;      
        foreach(request()->checkpoints as $checkpoint_id){
            $i++;
            $checkpoint = Checkpoint::find($checkpoint_id);
            $checkpoint->sort = $i;
            $checkpoint->save();
        }
        return 1;
    }

    public function checkpoint_remove($checkpoint_id)
    {
        $checkpoint = Checkpoint::find($checkpoint_id);

        if(count($checkpoint->transit->checkpoints)<2){
            return __('transit.cant_remove_checkpoint');
        }

        if(!request()->user()->hasRole('admin') AND $checkpoint->transit->shipping_company->user_id != request()->user()->id){
            abort(401, __('messages.unauthorized'));
        }              
        $checkpoint->delete();
        return 1;
    }

    public function checkpoint_add(Transit $transit, $master_point_id)
    {
        if(!request()->user()->hasRole('admin') AND $transit->shipping_company->user_id != request()->user()->id){
            abort(401, __('messages.unauthorized'));
        }              
        $checkpoint = new Checkpoint;
        $checkpoint->transit_id = $transit->id;
        $checkpoint->master_point_id = $master_point_id;
        $checkpoint->sort = count($transit->checkpoints)+1;
        $checkpoint->save();
        return 1;
    }

    public function checkpoints(Transit $transit){
        $checkpoints = $transit->checkpoints;
        //$checkpoints = array();
        foreach($checkpoints as $checkpoint){
            $checkpoint->master_point = $checkpoint->master_point;
            //$checkpoints[] = $checkpoint;
        }
        return $checkpoints;
    }

    public function create(ShippingCompany $shipping_company, Order $order)
    {
        if(!request()->user()->hasRole('admin') AND $shipping_company->user_id != request()->user()->id){
            abort(401, __('messages.unauthorized'));
        }              
        $order->load_classes = explode('|', trim($order->load_classes, '|'));
        return view('transits.create', array(
            'drivers'=> Driver::where('shipping_company_id', $shipping_company->id)->pluck('name', 'id'),
            'vehicles'=> Vehicle::where('shipping_company_id', $shipping_company->id)->pluck('model', 'id'),
            'shipping_company'=> $shipping_company,
            'order' => $order,
            'load_classes'=> LoadClass::all(),
            'master_points'=> MasterPoint::all(),
            'navbar'=>'shipping_company',
            'load_scripts'=>array('transit_form.js', 'Sortable.min.js', 'order_list.js'),
        ));
    }

    public function store(Request $request, $transit_id = "")
    {
        $create = false;
        if(!$transit_id){
            $shipping_company = ShippingCompany::find(request()->shipping_company_id);
        }else{
            $transit = Transit::find($transit_id);
            $shipping_company = $transit->shipping_company;
        }
        if(!request()->user()->hasRole('admin') AND $shipping_company->user_id != request()->user()->id){
            abort(401, __('messages.unauthorized'));
        } 

        //Validate number of master points
        if(count($request->transit_master_points)<2){
            return back()->withInput()->withMessage(__('transits.less_than_two_masterpoints'));
        }

        $rules = array(
            'driver_id' => 'required',
            'vehicle_id' => 'required',
        );
        $validator = $this->validate(request(), $rules);
        if (!empty($transit_id)) {
            $transit = Transit::find($transit_id);        
            $message = 'messages.updated';
        } else {
            $transit = new Transit;        
            $create = true;
            $message = 'messages.created';
            $transit->shipping_company_id = $shipping_company->id;

        }

        $transit->driver_id = $request->driver_id;
        $transit->vehicle_id = $request->vehicle_id;

        $transit->save();

        //Inserting Checkpoints
        if($create){
            $data_set = []; $i = 0;
            foreach($request->transit_master_points as $master_point){
                $i++;
                $data_set[] = [
                    'transit_id'=>$transit->id,
                    'master_point_id'=>$master_point,
                    'negative'=>request()->all_negatives ? 1 : 0,
                    'sort'=>$i,
                    'created_at'=>date('Y-m-d H:i:s'),
                    'updated_at'=>date('Y-m-d H:i:s'),
                ];
            }            
            Checkpoint::insert($data_set);
        }

        //Redirects and show message

        if($request->redirect_to){
            return Redirect::to(request()->redirect_to)->with('message', __($message));
        }else{
            return Redirect::to(url('transits/index/'.$transit->shipping_company->id))->with('message', __($message));
        }
        
    }


    public function update(Transit $transit)
    {
        if(!request()->user()->hasRole('admin') AND $transit->shipping_company->user_id != request()->user()->id){
            abort(401, __('messages.unauthorized'));
        }        
        $shipping_company = $transit->shipping_company;
        return view('transits.update', array(
            'drivers'=> Driver::where('shipping_company_id', $shipping_company->id)->pluck('name', 'id'),
            'vehicles'=> Vehicle::where('shipping_company_id', $shipping_company->id)->pluck('model', 'id'),            
            'transit'=>$transit,
            'master_points'=> MasterPoint::all(),
            'shipping_company'=>$transit->shipping_company,
            'navbar'=>'shipping_company',
            'load_scripts'=>array('transit_form.js', 'transit_update_form.js', 'Sortable.min.js'),
        ));
    }

    public function restore($id)
    {
        $transit = Transit::withTrashed()->find($id);
        if(!request()->user()->hasRole('admin') AND $transit->shipping_company->user_id != request()->user()->id){
            abort(401, __('messages.unauthorized'));
        }
        Transit::withTrashed()->where('id', $id)->restore();
        return Redirect::to(url("transits/index/".$transit->shipping_company->id))->with('message', __('messages.restored'));
    }

    public function trash(ShippingCompany $shipping_company) 
    {
        if(!request()->user()->hasRole('admin') AND $shipping_company->user_id != request()->user()->id){
            abort(401, __('messages.unauthorized'));
        }        
        $transits = Transit::onlyTrashed();       
        $transits = $transits->where('shipping_company_id', $shipping_company->id)->get();
        return view('transits.trash', array(
            'shipping_company'=>$shipping_company,
            'transits'=>$transits,
            'navbar'=>'shipping_company'
        ));
    }
    public function delete(Transit $transit)
    {
        if(!request()->user()->hasRole('admin') AND $transit->shipping_company->user_id != request()->user()->id){
            abort(401, __('messages.unauthorized'));
        }        
        $transit->delete();
        return Redirect::to(url("transits/index/".$transit->shipping_company->id))->with('message', __('messages.deleted'));
    }

    public function show(Transit $transit, $driver=false)
    {
        if(!request()->user()->hasRole('admin') AND $transit->shipping_company->user_id != request()->user()->id){
            abort(401, __('messages.unauthorized'));
        }

        return view($driver?'transits.show_driver':'transits.show', array(
            'title'=>$transit->shipping_company->company_name,
            'transit'=>$transit
        ));
    }

    public function index(ShippingCompany $shipping_company)
    {
        if(!request()->user()->hasRole('admin') AND $shipping_company->user_id != request()->user()->id){
            abort(401, __('messages.unauthorized'));
        }
        $transits = Transit::index($shipping_company->id);
        return view('transits.index', array(
            'shipping_company'=>$shipping_company,
            'load_classes'=> LoadClass::all(),
            'transits'=>$transits,
            'navbar'=>'shipping_company',
        ));
    }    

    public function index_admin()
    {
        if(!request()->user()->hasRole('admin')){
            abort(401, __('messages.unauthorized'));
        }
        $transits = Transit::index();
        return view('transits.index_admin', array(
            'transits'=>$transits,
            'navbar'=>'admin',
        ));
    }        
}
