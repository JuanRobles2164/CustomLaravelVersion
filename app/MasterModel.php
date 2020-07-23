<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterModel extends Model
{
    /**
     * De acuerdo al data_type especificado por el desarrollador en el model
     * Este adoptará un componente diferente u otro
     */
    protected const DATA_TYPES = [
        ///Datos primitivos
        'int' => 'number',
        'string' => 'text',
        'longtext' => 'textarea',
        'bool' => 'checkbox',
        'bool_incluyent' => 'checkbox',
        'bool_excluyent' => 'radio',
        'float' => [
            'data_type' => 'number',
            'step' => '0.1'
        ],
        'double' => [
            'data_type' => 'number',
            'step' => '0.001'
        ],

        ///Fechas y tiempo
        'date' => 'date',
        'timestamp' => 'datetime-local',

        ///Archivos y binarios
        'blob' => 'file',
        'file' => 'file',

        ///Llaves foráneas
        'fk' => 'select',

    ];
    private $crudable_attributes = [];
    public function GetCrudableAttributes(){
        return $this->crudable_attributes;
    }
    public function SetCrudableAttributes(array $crudable_attributes){
        $this->crudable_attributes = $crudable_attributes;
    }
    public function get_table_attr(){
        return get_object_vars($this)['table'];
    }
    public function GetAllDataTypes(){
        return $this->DATA_TYPES;
    }
}
