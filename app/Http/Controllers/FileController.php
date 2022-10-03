<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use DB;


class FileController extends Controller
{
    public function delete() {

        $table = request()->table;
        $pk = request()->pk;
        $column = request()->column;
        $clean_fields = request()->clean_fields;        
        
        //MANUAL TEST (MUST ENABLE ROUTE)
        if(!request()->table){
            $table = 'vehicles';
            $pk = '1';
            $column = 'trailer_insurance_image_path';
            $clean_fields = 'trailer_insurance_expiration_date';            
        }

        //Define os updates dos campos relacionados
        $updates_array = array();
        $updates_array[$column] = '';
        if($clean_fields){
            foreach(explode(',', $clean_fields) as $clean_field){
                $updates_array[trim($clean_field)] = '';
            }            
        }

        //return "aborted $table $column $id $clean_fields";
        $record = DB::table($table)->where('id', $pk)->first();
        $filepath = $record->$column;
        if(Storage::disk('local')->exists('public/'.$filepath)){
            
            //DELETE FILE FROM FILESYSTEM
            if(Storage::delete('public/'.$filepath)){
                //DELETE RECORD IN DATABASE
                $record = DB::table($table)->where('id', $pk)->update($updates_array);    
            }else{
                return 'delete fail';
            }
        }else{
            return 'file not found';
        }
        return '1';
    }    


}
