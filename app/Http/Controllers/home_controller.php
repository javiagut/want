<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use App\Models\Productos;
use App\Models\Stock;
use App\Models\User;
use App\Models\Pedido;
use App\Models\Detalle;
use App\Models\Colores;
use Exception;
use PhpParser\Node\Expr\AssignOp\Concat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class home_controller extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function inicio(){
        $categorias = Categoria::orderBy('categoria')->where('estado','=','OK')->get();
        
        $stocks = Stock::where('stock','>','0')->orderBy('ventas')->get();
        
        return view('home',compact('categorias','stocks'));
    }

    public function rebajas(){
    }

    public function categoria($categoria){

        if($categoria == 'rebajas'){
            return redirect('/');
        }

        //EXTRAER EL STOCK DEPENDIENDO SI SON CATEGORIA O SUBCATEGORIA

        $cat = Categoria::where('categoria', '=', $categoria)->where('estado','=','OK')->get();

        if ($cat[0]->id_cat_padre!='') {
            $productos = Productos::where('id_categoria','=',$cat[0]->id)->where('estado','=','OK')->get();
            $ids = [];
            for ($i=0; $i < count($productos) ; $i++) { 
                $ids[$i] = $productos[$i]->id;
            }
            $stocks = Stock::whereIn('id_producto', $ids)->where('stock','>','0')->inRandomOrder()->paginate(40);
            
        }
        else{
            $subcategorias=Categoria::where('id_cat_padre','=',$cat[0]->id)->where('estado','=','OK')->get();
            
            $idsCat = [];
            for ($i=0; $i < count($subcategorias); $i++){
                $idsCat[$i] = $subcategorias[$i]->id;
            }
            $productos = Productos::where('estado','=','OK')->whereIn('id_categoria', $idsCat)->get();
            $ids = [];
            for ($i=0; $i < count($productos); $i++){
                $ids[$i] = $productos[$i]->id;
            }
            $stocks = Stock::whereIn('id_producto', $ids)->where('stock','>','0')->inRandomOrder()->paginate(40);
            
        }

        //DIFERENCIAR LA CATEGORIA 'REBAJAS' DEL RESTO

        if($categoria != 'rebajas'){
            if($cat[0]->id_cat_padre != null ) $padre = Categoria::find($cat[0]->id_cat_padre)->categoria;
            else $padre = '';
            $hijos = Categoria::where('id_cat_padre','=',$cat[0]->id)->where('estado','=','OK')->get();
            if(count($hijos)>1){
                return view('categoria',compact('cat','padre','stocks','hijos'));
            }
            else
                $cat2 = $cat[0];
                return view('categoria',compact('cat2','padre','stocks','ids'));
        }
    }

    public function usuario(){
        if(Auth::user()){
            return view('usuario');
        }
        else return redirect('/');
    }

    public function actualizarPerfil($cliente){
        if(Auth::user()){
            $cliente_id = Auth::user()->id;
            $cliente = User::find($cliente_id);
            $cliente->update([
                'nombre' => request('name'),
                'apellido1' => request('apellido1'),
                'apellido2' => request('apellido2'),
                'password' => Hash::make(request('password')),
                'contacto1' => request('contacto1'),
                'contacto2' => request('contacto2'),
                'nacimiento' => request('nacimiento')
            ]);
            return back()->with('status','Se ha actualizado correctamente el usuario');
        }
        else return redirect('/');
    }
    public function producto($producto){
        $stock = Stock::find($producto);
        $producto = Productos::find($stock->id_producto);
        $stocks = Stock::get();
        return view('producto',compact('producto','stock','stocks'));
    }

    public function añadirCesta($stock){
        if(Auth::user()){
            if(count(Pedido::pedidoPendiente())>0){
                Pedido::añadirStock($stock);
            }
            else{
                Pedido::crearPedido($stock,Auth::id(),'id_cliente');
            }
        }
        else{
            if(count(Pedido::pedidoPendienteGUEST())>0){
                Pedido::añadirStockGUEST($stock);
            }
            else{
                Pedido::crearPedidoGUEST($stock);
            }
        }
        return back();
    }
    public function eliminarStockCesta($id_detalle){
        $pedido = Pedido::find(Detalle::find($id_detalle)->id_pedido)->where('estado','=','Pendiente')->get();
        $id_pedido = $pedido[0]->id;
        $precio = Stock::find(Detalle::find($id_detalle)->id_stock)->precio;
        //AÑADIR UNIDADES AL STOCK
        $stockRest = Stock::find(Detalle::find($id_detalle)->id_stock);
        $stockRest->update([
            'stock' => $stockRest->stock+Detalle::find($id_detalle)->cantidad
        ]);
        //
        Detalle::find($id_detalle)->delete();
        if($pedido[0]->total == $precio){
            Pedido::find($id_pedido)->delete();
        }
        else Pedido::totalCesta($pedido[0]->id);
        return back();
    }

    public function eliminarCesta($pedido){
        $detalles = Detalle::where('id_pedido','=',$pedido)->get();
        for ($i=0; $i < count($detalles); $i++) { 
            //AÑADIR UNIDADES AL STOCK
            $stockRest = Stock::find($detalles[$i]->id_stock);
            $stockRest->update([
                'stock' => $stockRest->stock+$detalles[$i]->cantidad
            ]);
            //
        }
        Detalle::where('id_pedido','=',$pedido)->delete();
        Pedido::find($pedido)->delete();
        return back();
    }

    public function finalizarPedido($pedido){
        if (Auth::user()) {
            return view('finalizarPedido',compact('pedido'));
        }
        else return redirect('login')->with('status','Para tramitar un pedido deberás identificarte');
    }

    public function pedidos(){
        if (Auth::user()) {
            if(Pedido::historialPedidos()) $pedidos = Pedido::historialPedidos();
            else $pedidos = null;
            
            return view('pedidos',compact('pedidos'));
        }
        else return redirect('/');
    }

    public function buscarProductos(){
        if(request('texto')){
            $productos = Productos::busqueda(request('texto'));
            $ids_productos = [];

            for ($i=0; $i < count($productos); $i++) { 
                $ids_productos[$i] = $productos[$i]['id'];
            }

            $stocks = Stock::busqueda($ids_productos);
            //$stocks=null;
            $busqueda = request('texto');
            $cat = null;
            $padre = null;
            $hijos = null;
            return view('categoria',compact('cat','padre','stocks','hijos','productos','busqueda'));
        }
        else return redirect('/');
    }
    
    public function realizarPedido($pedido){
        if (Auth::user()){
            if($pedido != null){
                Pedido::find($pedido)->update([
                    'estado' => 'Realizado'
                ]);
            }
            if(Pedido::historialPedidos()) $pedidos = Pedido::historialPedidos();
            else $pedidos = null;
            
            return view('pedidos',compact('pedidos'));
        }
        else return redirect('/');
    }
    /*                      VARIABLES PARA LAS VISTAS                        */

    static function existeCesta(){
        return Pedido::existeCesta();
    }
    static function informarProductosCesta(){
        return Detalle::informarProductosCesta();
    }
    static function findCategoriaSinPadre(){
        return Categoria::findSinPadre();
    }
    static function devolverDetalle($id){
        return Detalle::devolverStock($id);
    }
    static function devolverStock($id){
        return Stock::find($id);
    }
    static function devolverProducto($id){
        return Productos::find($id);
    }
    static function findCategoryByName($nombre){
        return Categoria::findByName($nombre);
    }
    static function devolverColor($id_color){
        return Colores::find($id_color);
    }
    static function devolverColores(){
        return Colores::all();
    }
    static function categoriasCinco(){
        return Categoria::all()->take(7);
    }
    //
}
