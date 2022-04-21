<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model{
    protected $fillable = ['nombre','marca','descripcion','id_categoria','rebaja','rebaja_inicio','rebaja_fin','estado'];

    use HasFactory;

    static function productos($categoria){

        return Productos::where('id_categoria', '=', $categoria )->get();
    }

    static function productosCategoriaNull(){
        return Productos::where('id_categoria', '=', Null)->get();
    }

    static function busqueda($texto){
        $palabras = explode(" ", $texto);
        $coincidencias = [];
        for ($i=0; $i < count($palabras); $i++) {
            //EVITAMOS PALABRAS DE MENOS DE 4 LETRAS (ARTICULOS Y DEMÁS)
            if(strlen($palabras[$i])>3){
                //COINCIDENCIAS EN EL NOMBRE
                $productos = Productos::whereRaw('lower(NOMBRE) like (?)',["%{$palabras[$i]}%"])->get()->toArray();
                for ($e=0; $e < count($productos); $e++) { 
                      if(!in_array($productos[$e],$coincidencias)){
                        $coincidencias[count($coincidencias)] = $productos[$e];
                    }
                }
                //COINCIDENCIAS EN LA DESCRIPCIÓN
                $productos = Productos::whereRaw('lower(descripcion) like (?)',["%{$palabras[$i]}%"])->get()->toArray();
                for ($e=0; $e < count($productos); $e++) { 
                    if(!in_array($productos[$e],$coincidencias)){
                      $coincidencias[count($coincidencias)] = $productos[$e];
                  }
              }
            }
        }
        return $coincidencias;
    }
}