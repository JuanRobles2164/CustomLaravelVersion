<?php

namespace App\Console\Commands;

use App;
use App\Console\Commands\Helpers\FileHelper;
use App\Console\Commands\Helpers\MakeCRUDViewHelper;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class MakeCRUDView extends Command
{
    private $fks_model = [];
    private $models_namespace = "App\\Models\\";
    private $views_namespace = "resources/views/";
    private $data;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gea:static_create {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scaffolding para los models, requiere del nombre exacto del modelo';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->data = $this->arguments();
        $namespace = $this->get_formatted_namespace();
        $this->Main($namespace);
        return 0;
    }

    /**
     * Método que obtiene las columnas de un modelo según la base de datos
     * @param string $table_name Nombre de la tabla. Esta se obtiene del atributo $table dentro de cada modelo. Ej: Usuario
     * @return stdClass Cadena formateada en JSON que contiene los atributos para la clase
     */
    private function executeQuery(string $table_name){
        $SQL = "SHOW COLUMNS FROM $table_name";
        return json_decode(json_encode(DB::select($SQL)));
    }

    private function get_fk_table_attributes(string $column_name){
        $formato = '';
        for($i = 3; $i < strlen($column_name); $i++){
            $formato = $formato.$column_name[$i];
        }
        return $this->executeQuery($formato);
    }
    private function get_formatted_namespace(){
        return $this->models_namespace.$this->data['model'];
    }
    private function get_model(){
        return $this->data['model'];
    }

    // ------------ CORE --------------
     
    private function Main(string $model_name){
        $instance = $this->instance_model($model_name);
        $table_attributes = $this->set_attributes($instance);
        $model_attributes = $this->iterate_table_attributes($table_attributes);
        $result = $this->create_views($model_attributes, $model_name);

    }
    /**
     * @return mixed Instancia del modelo a ejecutar el CRUD
     */
    private function instance_model(string $model_name){
        return new $model_name;
    }
    /**
     * @return array Atributos de la tabla
     */
    private function set_attributes($instance){
        return $this->executeQuery($instance->get_table_attr());
    }
    
    /**
     * @param array Arreglo que representa las columnas de una tabla de la BD
     * @return array Arreglo con las columnas procesadas 
     */
    private function iterate_table_attributes(array $table_attributes){
        echo 'Filtrando columnas y FKs';
        $iterator = 0;
        foreach($table_attributes as $obj){
            foreach($obj as $value){
                /// Si encuentra una FK en el modelo
                /// consultará los datos de la tabla
                /// posteriormente, usará el id y el 
                /// nombre para el CRUD y lo desplegará como un dropdownlist
                if(strpos($value, 'id_') !== FALSE){
                    array_push($this->fks_model, $this->get_fk_table_attributes($value));
                    unset($table_attributes[$iterator]);
                }
            }
            $iterator++;
        }
        return $table_attributes;
    }
    private function create_directories(string $model_name, int $access_level = 0755){
        try{
            $directory_fullname = $this->views_namespace.$this->data['model'];
            return FileHelper::CreateDirectories($directory_fullname, $access_level);
        }catch(Exception $e){
            echo "Actualmente el directorio ya existe o no tiene permisos para crear más\n";
            return false;
        }
    }
    private function make_views($model_attributes, $foreign_keys, $model_name){
        $content = MakeCRUDViewHelper::PrepareStringCrudModel($model_attributes, $foreign_keys, $model_name);
        if(FileHelper::CreateFile($model_name.'Create.blade.php', $content)){
            echo "Vista creada correctamente\n";
            $final_file_name = $model_name.'Create.blade.php';
            if(FileHelper::MoveFile($final_file_name, $this->views_namespace.$model_name.'/'.$final_file_name)){
                echo "¡Vista movida a su respectiva carpeta!\n";
            }else{
                echo "No se pudo mover la vista\n";
            }
        }
        $this->views_namespace;
        return true;
    }
    private function create_views(array $model_attributes, string $model_name){
        if(!$this->create_directories($this->get_model())){
            echo "No se pudieron crear los directorios\n";
            return false;
        }
        echo "Directorios creados satisfactoriamente\n";
        if($this->make_views($model_attributes, $this->fks_model,$this->get_model())){
            
        }
        return true;
    }

}
