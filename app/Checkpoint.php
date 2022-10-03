<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Checkpoint extends Model
{

    public static function index_negative(){
        $checkpoints = Checkpoint::query();
        $checkpoints = $checkpoints->where('negative', '1');
        $checkpoints = $checkpoints->where('arrival_date', null);
        $checkpoints = $checkpoints->orderBy('transit_id', 'asc');
        $checkpoints = $checkpoints->paginate();
        //dd($checkpoints);
        return $checkpoints;
    }

 	public static function index(){
		 $checkpoints = Checkpoint::query();
        $checkpoints = $checkpoints->orderBy('sort', 'asc');
        return $checkpoints;
	}
    public function loads() {
        return $this->hasMany(Package::class, 'origin_checkpoint_id');
    }
    public function unloads() {
        return $this->hasMany(Package::class, 'destination_checkpoint_id');
    }

    public function transit() {
        return $this->belongsTo(Transit::class, 'transit_id');
    }
    public function master_point() {
        return $this->belongsTo(MasterPoint::class, 'master_point_id');
    }

    public function scopeOrdered($query){
       return $query->orderBy('sort', 'asc');
    }    
    
}
