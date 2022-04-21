<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model{
    protected $fillable = ['id','categoria','id_cat_padre','estado'];

    use HasFactory;
    protected $table = 'categorias';

    static function categorias(){
        return Categoria::orderBy('id_cat_padre')->orderBy('categoria','asc')->get();
    }

    static function orderCategoriaMadre(){
        return Categoria::orderBy('id_cat_padre')->orderBy('categoria')->get();
    }
    static function findByPadre($id_padre){
        return Categoria::find($id_padre)->id;
    }
    static function findSinPadre(){
        return Categoria::where('id_cat_padre', '=', null)->orderBy('categoria')->where('estado','=','OK')->get();
    }

    static function findByName($nombre){
        $categoria = Categoria::where('categoria', '=', $nombre)->get();
        return $categoria[0]->categoria;
    }
    static function añadir(){
        return view('home');
    }
}
