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
    public static function MoveFile($actual_location, $new_location){
        return rename($actual_location, $new_location);
    }

    /**
     * @param string $path Cadena que representa la ruta de la carpeta. Ej: '/App/Htpp/Controllers/Controllers_Subcarpeta'
     * @param int $access_level Numero que representa el nivel de acceso que va(n) a tener la(s) carpeta(s). Ej: 777, 567, 755
     * @return bool Indica si la creación fué exitosa o no.
     */
    public static function CreateDirectories(string $path, int $access_level = 0755){
        return mkdir($path, $access_level);
    }
}