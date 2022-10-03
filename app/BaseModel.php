<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model {

    public static function getEnumOptions($table, $field, $translation_file){

        $type = DB::select(DB::raw('SHOW COLUMNS FROM '.$table.' WHERE Field = "'.$field.'"'))[0]->Type;

        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $values = array();
        foreach(explode(',', $matches[1]) as $value){
            $values[trim($value, "'")] = __($translation_file.'.'.trim($value, "'"));
        }
        return $values;
    }


}
