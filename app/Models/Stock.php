<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = ['id_producto','id_talla','id_color','sexo','precio','stock','ventas','foto1','foto2','foto3','foto4','foto5'];

    use HasFactory;
    protected $table = 'stock';

    static function stockProducto($id){
        return Stock::where('id_producto', '=', $id)->orderBy('precio')->get();
    }

    static function actualizarStock($id){
        $stock = Stock::find($id);
        $estructura = "fotos/".$id;
        for ($e=1; $e < 6; $e++) {
            if (is_uploaded_file($_FILES['foto'.$e]['tmp_name'])){
                if (!is_dir($estructura)){
                    mkdir($estructura, 0777, true);
                }
                move_uploaded_file($_FILES["foto".$e]['tmp_name'], $estructura."/".$_FILES["foto".$e]['name']);
                $stock->update([
                    'foto'.$e => $_FILES["foto".$e]['name'],
                ]);
            }
        }

        $stock->update([
            'id_talla' => request('talla'),
            'id_color' => request('color'),
            'sexo' => request('sexo'),
            'precio' => request('precio'),
            'stock' => request('stock'),
        ]);
        
    }

    static function createStock($id){
        $producto = Productos::find($id);
        for ($e=1; $e < 6; $e++) { 
            if ($e==1) {
                if (is_uploaded_file($_FILES['foto1']['tmp_name'])){
                    Stock::create([
                        'id_producto' => $id,
                        'id_talla' => request('talla'),
                        'id_color' => request('color'),
                        'sexo' => request('sexo'),
                        'precio' => request('precio'),
                        'stock' => request('stock'),
                        'ventas' => 0,
                        'foto1' => $_FILES["foto1"]['name']
                    ]);
                }
            }
            if (is_uploaded_file($_FILES['foto'.$e]['tmp_name'])){
                $stocks = Stock::orderBy('id','desc')->get();
                $stock_id = $stocks[0]->id;
                $estructura = "fotos/".$stock_id;
                if (!is_dir($estructura)){
                    mkdir($estructura, 0777, true);
                }
                move_uploaded_file($_FILES["foto1"]['tmp_name'], $estructura."/".$_FILES["foto".$e]['name']);
                $stock = Stock::find($stock_id);
                $stock->update([
                    'foto'.$e => $_FILES["foto".$e]['name'],
                ]);
                move_uploaded_file($_FILES["foto".$e]['tmp_name'], $estructura."/".$_FILES["foto".$e]['name']);
            
            }
            
        }
    }

    static function busqueda($ids_productos){
        return Stock::whereIn('id_producto',$ids_productos)->paginate(40);
    }
    
}
