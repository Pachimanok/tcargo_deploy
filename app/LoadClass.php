<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoadClass extends Model
{
	public static function index(){
		 $load_classes = LoadClass::query();
        if(request()->search){
             $load_classes = $load_classes->where('name', 'like', '%'.request()->search.'%');
        }
        if(request()->order_by){
            $load_classes = $load_classes->orderBy(request()->order_by, request()->sort);
        }
        $load_classes = $load_classes->paginate();
        return $load_classes;
	}
    use SoftDeletes;
    protected $dates = ['deleted_at'];

}
