<?php

namespace App\Console\Commands\Helpers;

class MakeCRUDViewHelper{
    private function isInteger($row){
        return strpos($row->Type, 'bigint');
    }
    private function isString($row){
        return strpos($row->Type, 'varchar');
    }
    private function isLongText($row){
        return strpos($row->Type, 'longtext');
    }
    private function isDate($row){
        return strpos($row->Type, 'date');
    }
    private function isTimeStamp($row){
        return strpos($row->Type, 'timestamp');
    }
    private function isBool($row){
        return strpos($row->Type, 'tinyint');
    }
    private function isFloat($row){
        return strpos($row->Type, 'float');
    }
    private function isDouble($row){
        return strpos($row->Type, 'double');
    }
    private function isNullable($row){
        if($row->Null == 'YES'){
            return "/>\n";
        }else{
            return "/>\n";
        }
    }
    private function filter_datatype($ma){
        $concat_string = '';
        if($this->isInteger($ma) !== FALSE){
            $concat_string = "<x-basic_input attr_name='$ma->Field' input_type='number' input_name='$ma->Field'";
        }else if($this->isString($ma) !== FALSE){
            $concat_string = "<x-basic_input attr_name='$ma->Field' input_type='text' input_name='$ma->Field'";
        }else if($this->isDate($ma) !== FALSE){
            $concat_string = "<x-basic_input attr_name='$ma->Field' input_type='date' input_name='$ma->Field'";
        }else if($this->isTimeStamp($ma) !== FALSE){
            $concat_string = "<x-basic_input attr_name='$ma->Field' input_type='datetime-local' input_name='$ma->Field' step_calculus='0.01'";
        }else if($this->isBool($ma) !== FALSE){
            $concat_string = "<x-basic_input attr_name='$ma->Field' input_type='checkbox' input_name='$ma->Field'";
        }else if($this->isFloat($ma) !== FALSE){
            $concat_string = "<x-basic_input attr_name='$ma->Field' input_type='number' input_name='$ma->Field' step_calculus='0.01'";
        }else if($this->isDouble($ma) !== FALSE){
            $concat_string = "<x-basic_input attr_name='$ma->Field' input_type='number' input_name='$ma->Field' step_calculus='0.01'";
        }
        if($this->isLongText($ma) !== FALSE){
            //$concat_string = "<textarea name='$ma->Field' class='form-control'></textarea><br>\n";
        }else{
            $concat_string = $concat_string.$this->isNullable($ma);
        }
        return $concat_string;
    }
    private function filter_datatype_fks($fk){
        return "<x-form_select_list attr_name='$fk->Field'/><br>\n";
    }
    private function prepare_model_attributes(array $model_attributes, array $foreign_keys) : string {
        $return_string = "<x-form_post> \n";

        foreach($model_attributes as $ma){
            if($ma->Field != 'created_at' || $ma->Field != 'updated_at'){
                $return_string = $return_string.$this->filter_datatype($ma);
            }
        }
        $fks_components = '';
        foreach($foreign_keys as $array)
            foreach($array as $fk)
                $fks_components = $fks_components.$this->filter_datatype_fks($fk);
        
        $return_string = $return_string . $fks_components;

        $return_string = $return_string . "</x-form_post>";
        return $return_string;
    }
    public static function PrepareStringCrudModel(array $model_attributes, array $foreign_keys = [], string $model_name) : string
    {
        $entity = new MakeCRUDViewHelper;
        $file_content = 
        "
        @extends('Layout')

        @section('content') \n
        ";
        $file_content = $file_content.$entity->prepare_model_attributes($model_attributes, $foreign_keys);
        $file_content .= 
        "
        @endsection \n
        ";
        return $file_content;
    }
}
