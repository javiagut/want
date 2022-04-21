<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colores extends Model
{
    use HasFactory;

    static function colorStock($id_color){
        $color = Colores::where('id', '=', $id_color)->get();
        return $color[0]->color;
    }

    static function colores(){
        return Colores::orderBy('id')->get();
    }
}
