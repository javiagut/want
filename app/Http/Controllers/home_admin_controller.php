<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use App\Models\Pedido;
use App\Models\Productos;
use App\Models\Stock;
use App\Models\User;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class home_admin_controller extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function inicio(){
        return view('admin/'.'home');
    }

    static function productos(){
        if(Auth::user()){
            $user = Auth::user();
            if ($user->rol=='admin') {
                $productos = Productos::orderBy('nombre')->get();
                $categorias = Categoria::orderBy('categoria')->get();
                $pagina = ['productos'];
                return view('admin.productos',compact('pagina','productos','categorias'));
            }
            else return redirect('/');
        }
        else return redirect('/');
    }
    
    public function nuevoProducto(){

            Productos::create([
                'nombre' => request('nombre'),
                'marca' => request('marca'),
                'descripcion' => request('descripcion'),
                'id_categoria' => request('categoria'),
                'rebaja' => request('rebaja'),
                'rebaja_inicio' => request('rebaja_inicio'),
                'rebaja_fin' => request('rebaja_fin'),
                'estado' => request('estado')
            ]);

        $productos = Productos::orderBy('nombre')->get();
        $categorias = Categoria::orderBy('categoria')->get();
        $pagina = ['productos'];
        return back()->with('status','Se ha añadido correctamente el producto '.request('nombre'));
    }

    public function actualizarProducto($producto){

        $prod = Productos::find(request('id'));
        $prod->update([
            'id_categoria' => request('categoria'),
            'nombre' => request('nombre'),
            'estado' => request('estado'),
            'rebaja' => request('rebaja'),
            'rebaja_inicio' => request('rebaja_inicio'),
            'rebaja_fin' => request('rebaja_fin'),
        ]);

        return back()->with('status','Se ha actualizado correctamente el producto '.request('nombre'));
    }
    public function eliminarProducto($producto){
        $prod = Productos::find(request('id'));
        $stocks = Stock::stockProducto(request('id'));
        foreach ($stocks as $key => $stock) {
            $stock->delete();
        }
        $prod->delete();

        return back()->with('status','Se ha eliminado correctamente el producto '.$prod->nombre);
    }

    public function stock(){
        if(Auth::user()){
            $user = Auth::user();
            if ($user->rol=='admin') {
                $productos = Productos::orderBy('nombre')->get();
                $stock = Stock::orderBy('id_producto')->get();
                $categorias = Categoria::orderBy('categoria')->get();
                $pagina = ['stock'];
                return view('admin/'.'stock',compact('productos','stock','categorias','pagina'));
            }
            else return redirect('/');
        }
        else return redirect('/');
        
    }

    public function actualizarStock($st){
        Stock::actualizarStock(request('id'));
        return back()->with('status','Se ha actualizado correctamente el stock ');
    }

    public function nuevoStock(){
        Stock::createStock(request('id'));
        return back()->with('status','Se ha añadido correctamente el stock ');
    }

    public function categorias(){
        if(Auth::user()){
            $user = Auth::user();
            if ($user->rol=='admin') {
                $categorias = Categoria::orderBy('categoria')->get();
                $pagina = ['categorias'];
                return view('admin/'.'categorias',compact('categorias','pagina'));
            }
            else return redirect('/');
        }
        else return redirect('/');
    }
    public function nuevaCategoria(){
        Categoria::create([
            'categoria' => request('categoria'),
            'id_cat_padre' => request('madre'),
            'estado' => request('estado')
        ]);
        return back()->with('status','Se ha creado correctamente la categoría '.request('categoria'));
    }
    public function actualizarCategorias($categoria){
        $cat = Categoria::find($categoria);
        $cat->update([
            'categoria' => request('categoria'),
            'id_cat_padre' => request('madre'),
            'estado' => request('estado'),
        ]);
        return back()->with('status','Se ha actualizado correctamente la categoría '.request('categoria'));
    }

    public function eliminarCategoria($categoria){
        $cat = Categoria::find($categoria);
        $subCat = Categoria::where('id_cat_padre', '=', $cat->id);
        $subCat->update([
            'id_cat_padre' => Null
        ]);
        $subCat = Productos::where('id_categoria', '=', $cat->id);
        $subCat->update([
            'id_categoria' => Null
        ]);
        $cat->delete();
        return back()->with('status','Se ha eliminado correctamente la categoría '.$cat->categoria);
    }

    public function pedidos(){
        $pedidos = Pedido::pedidosAdmin();
        return view('admin.pedidos',compact('pedidos'));
    }

    public function actualizarPedidos($pedidos){
        for ($i=0; $i < 20; $i++) { 
            if(request('estado').$i != null){
                $id = filter_var(request('estado'.$i),FILTER_SANITIZE_NUMBER_INT);
                $estado = str_replace($id,'',request('estado'.$i));
                Pedido::where('id','=',intval($id))->update([
                    'estado' => $estado
                ]);
            }
        }
        return back()->with('status','Se han actualizado correctamente los pedidos');
    }
    
}
