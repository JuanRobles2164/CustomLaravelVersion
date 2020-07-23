<?php

namespace App\Console\Commands;

use App\Console\Commands\Helpers\FileHelper;
use App\Console\Commands\Helpers\MakeViewHelper;
use Exception;
use Illuminate\Console\Command;

class MakeView extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string $view_name Nombre de la vista
     * @var string $s* array con las sections
     */
    protected $signature = 'gea:make_view {view_name}, {s*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crea una vista en la ruta /resources/views/generated';

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
     * 
     *
     * @return int
     */
    public function handle()
    {
        $args = $this->arguments();
        $args['sections'] = null;
        //Intenta obtener las secciones de la vista, si no hay nada, pondrá "content" por defecto
        try{
            $args['sections'] = preg_split("/[\s,]+/", $args['s'][0]);
        }catch(Exception $e){
            $args['sections'] = ['content'];
        }
        
        $formatted_name = $this->format_filename($args['view_name']);
        
        $file_content = MakeViewHelper::BasicViewContent('Layout', $args['sections']);
        if(FileHelper::CreateFile($formatted_name, $file_content)){
            echo 'Vista creada satisfactoriamente';
            if(FileHelper::MoveFile($formatted_name, 'resources/views/generated/'.$formatted_name)){
                echo 'COPIADO';
                return 0;
            }
            echo 'IMPOSIBLE COPIAR';
            return 0;
        }
        echo 'El archivo se ha actualizado';
        return 0;
    }

    /**
     * @param string $file_name Cadena que representa el nombre del archivo a generar. Ej: Audiencias
     * @return string El archivo formateado. Ej: Audiencias.blade.php
     */
    private function format_filename(string $file_name){
        return $file_name.'.blade.php';
    }
}
