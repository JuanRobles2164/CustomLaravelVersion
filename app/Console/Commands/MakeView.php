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
     * @var string
     */
    protected $signature = 'command:MakeView {view_name}, {s*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $file_content = MakeViewHelper::BasicViewContent('Layout', $args['sections']);
        if(FileHelper::CreateFile($args['view_name'].'.blade.php', $file_content)){
            echo 'Vista creada satisfactoriamente';
            return 0;
        }
        echo 'El archivo se ha actualizado';
        return 0;
    }
}
