<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Pedido extends Model
{
    protected $fillable = ['id','id_cliente','estado','sesion','total'];

    use HasFactory;

    static function pedidoPendiente(){
        return Pedido::where('id_cliente','=', Auth::id())->where('estado','=','Pendiente')->get();
    }
    static function pedidoPendienteGUEST(){
        return Pedido::where('sesion','=', Session::getId())->where('id_cliente','=',null)->where('estado','=','Pendiente')->get();
    }

    static function crearPedido($stock){
        Pedido::create([
            'estado' => 'Pendiente',
            'id_cliente' => Auth::id(),
            'sesion' => Session::getId()
        ]);
        $pedidos = Pedido::where('id_cliente','=', Auth::id())->where('estado','=','Pendiente')->get();
        
        Detalle::create([
            'id_pedido' => $pedidos[0]->id,
            'id_stock' => $stock,
            'cantidad' => request('cantidad')
        ]);
        $stockRest = Stock::find($stock);
        $stockRest->update([
            'stock' => $stockRest->stock-request('cantidad')
        ]);
        Pedido::totalCesta($pedidos[0]->id);
    }

    static function añadirStock($stock){
        $pedidos = Pedido::where('id_cliente','=', Auth::id())->where('estado','=','Pendiente')->get();
        
        if(count(Detalle::where('id_pedido','=',$pedidos[0]->id)->where('id_stock','=',$stock)->get()) >0 ){
            $detalle = Detalle::where('id_pedido','=',$pedidos[0]->id)->where('id_stock','=',$stock)->get();
            $detalle[0]->update([
                'cantidad' => ($stock[0]->cantidad)+request('cantidad')
            ]);
        }
        else{
            Detalle::create([
                'id_pedido' => $pedidos[0]->id,
                'id_stock' => $stock,
                'cantidad' => request('cantidad')
            ]);
        }
        $stockRest = Stock::find($stock);
        $stockRest->update([
            'stock' => $stockRest->stock-request('cantidad')
        ]);
        Pedido::totalCesta($pedidos[0]->id);
    }


    static function crearPedidoGUEST($stock){
        Pedido::create([
            'estado' => 'Pendiente',
            'sesion' => Session::getId()
        ]);
        $pedidos = Pedido::where('sesion','=', Session::getId())->where('id_cliente','=',null)->where('estado','=','Pendiente')->get();
        
        Detalle::create([
            'id_pedido' => $pedidos[0]->id,
            'id_stock' => $stock,
            'cantidad' => request('cantidad')
        ]);
        $stockRest = Stock::find($stock);
        $stockRest->update([
            'stock' => $stockRest->stock-request('cantidad')
        ]);
        Pedido::totalCesta($pedidos[0]->id);
    }
    static function añadirStockGUEST($stock){
        $pedidos = Pedido::where('id_cliente','=', null)->where('sesion','=', Session::getId())->where('estado','=','Pendiente')->get();
        
        if(count(Detalle::where('id_pedido','=',$pedidos[0]->id)->where('id_stock','=',$stock)->get()) >0 ){
            $detalle = Detalle::where('id_pedido','=',$pedidos[0]->id)->where('id_stock','=',$stock)->get();
            $detalle[0]->update([
                'cantidad' => ($detalle[0]->cantidad)+request('cantidad')
            ]);
        }
        else{
            Detalle::create([
                'id_pedido' => $pedidos[0]->id,
                'id_stock' => $stock,
                'cantidad' => request('cantidad')
            ]);
        }
        $stockRest = Stock::find($stock);
        $stockRest->update([
            'stock' => $stockRest->stock-request('cantidad')
        ]);
        Pedido::totalCesta($pedidos[0]->id);
    }

    static function existeCesta(){
        if(Auth::user()){
            if(count(Pedido::where('id_cliente','=', Auth::id())->where('estado','=','Pendiente')->get())>0){
                return Pedido::where('id_cliente','=', Auth::id())->where('estado','=','Pendiente')->get();
            }
            else{
                return null;
            }
        }
        else if(count(Pedido::where('sesion','=', Session::getId())->where('estado','=','Pendiente')->where('id_cliente','=',null)->get())>0){
            return Pedido::where('sesion','=', Session::getId())->where('estado','=','Pendiente')->where('id_cliente','=',null)->get();
        }
        else return null;
    }
    
    static function totalCesta($id){
        $stocks = Detalle::where('id_pedido','=',$id)->get();
        $total = 0;
        for ($i=0; $i < count($stocks) ; $i++) {
            $total += (Stock::find($stocks[$i]->id_stock)->precio)*($stocks[$i]->cantidad);
        }
        $pedido = Pedido::find($id);
        $pedido->update([
            'total' => $total
        ]);
        Pedido::where('total','=',0)->delete();
    }

    static function historialPedidos(){
        if(count(Pedido::where('id_cliente','=', Auth::id())->where('estado','!=','Pendiente')->get())>0){
                return Pedido::where('id_cliente','=', Auth::id())->where('estado','!=','Pendiente')->orderBy('created_at','DESC')->get();
        }
        else return null;
    }
    
    static function pedidosAdmin(){
        return Pedido::where('estado' ,'!=', 'Pendiente')->orderBy('updated_at','DESC')->paginate(20);
    }

}