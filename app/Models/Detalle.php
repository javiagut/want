<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    protected $fillable = ['id_pedido','id_stock','cantidad'];

    use HasFactory;

    static function devolverStock($pedido){
        return Detalle::where('id_pedido','=',$pedido)->get();
    }

    static function informarProductosCesta(){
        $pedido = Pedido::existeCesta();
        if (count(Detalle::where('id_pedido','=',$pedido[0]->id)->get())>0){
            return count(Detalle::where('id_pedido','=',$pedido[0]->id)->get());
        }
        else return 0;
    }
}
