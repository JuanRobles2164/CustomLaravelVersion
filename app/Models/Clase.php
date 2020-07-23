<?php

namespace App\Models;

use App\MasterModel;

class Clase extends MasterModel
{
    /**
     * TABLE: 
     * Nombre de la tabla en la BD
     */
    protected $table = 'clase';
    private function set_data_type(string $type){
        return parent::DATA_TYPES[$type];
    }
    public function __construct()
    {
        $attrs = [
            'obligatorio' => $this->set_data_type('string'),
            'opcional' => $this->set_data_type('string'),
            'texto_largo' => $this->set_data_type('longtext'),
            'fecha_date' => $this->set_data_type('date'),
            
            
        ];
        $this->SetCrudableAttributes($attrs);
    }
    /**
     * METODOS
     */


    /**
     * RELACIONES
    */
    

}
