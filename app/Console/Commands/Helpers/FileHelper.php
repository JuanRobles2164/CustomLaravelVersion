<?php

namespace App\Console\Commands\Helpers;

class FileHelper{
    /**
     * @param string $file_name Cadena que representa el nombre del archivo a crear (Ya debe venir con su respectiva extensión) ej: modelo.php
     * @param string $content Cadena que representa el contenido del archivo. Ej: <?php class Clase{ }
     * @return bool El exito de la operación
     */
    public static function CreateFile($file_name, $content){
        $fh = fopen($file_name, 'w');
        if(!is_resource($fh)){
            return false;
        }
        fwrite($fh, sprintf($content));
        fclose($fh);
        return true;
    }
}