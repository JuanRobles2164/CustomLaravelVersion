<?php
namespace App\Console\Commands\Helpers;
class MakeViewHelper{

    /**
     * @param string Cadena que representa la plantilla maestra a utilizar. Ej: Master_Layout
     * @param array Array que representa las secciones de las que comprenderá la vista. Ej: content,custom_scripts
     * @return string Cadena que representa el contenido del archivo a generar
     */
    public static function BasicViewContent($parent_layout, array $section){
        $content = "@extends('$parent_layout')\n";
        foreach($section as $name){
            $content = $content . "
@section('$name')

@endsection

            ";
        }
        return $content;
    }
}