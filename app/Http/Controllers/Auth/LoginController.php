<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Categoria;
use App\Models\Productos;
use App\Models\Pedido;
use App\Models\Detalle;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    static function login(){
        if(request('email')!=null) {
            $sessionAntigua = Session::getId();
            Auth::attempt(['email' =>request('email'),'password' =>request('password')]);
        }
        
        if(Auth::user()){
            /*          Pendiente UNIFICAR EL PEDIDO COMO GUEST Y EL PEDIDO PENDIENTE        */

            if(count(Pedido::where('id_cliente','=', Auth::id())->where('estado','=','Pendiente')->get())>0 && count(Pedido::where('id_cliente','=', null)->where('sesion','=', $sessionAntigua)->where('estado','=','Pendiente')->get())>0 ){
                $pedidoAUTH = Pedido::where('id_cliente','=', Auth::id())->where('estado','=','Pendiente')->get();
                $pedidoGUEST = Pedido::where('id_cliente','=', null)->where('sesion','=', $sessionAntigua)->where('estado','=','Pendiente')->get();

                $pedidoAUTH[0]->update([
                    'sesion' => Session::getId(),
                ]);

                Detalle::where('id_pedido','=',$pedidoGUEST[0]->id)->update([
                    'id_pedido' => $pedidoAUTH[0]->id
                ]);

                $pedidoGUEST[0]->delete();

                Pedido::totalCesta($pedidoAUTH[0]->id);
            
            }
            else if(count(Pedido::where('sesion','=',$sessionAntigua)->where('id_cliente','=',null)->get())>0){
                $antiguo = Pedido::where('sesion','=',$sessionAntigua)->where('id_cliente','=',null);
                $antiguo->update([
                    'id_cliente' => Auth::id(),
                    'sesion' => Session::getId()
                ]);
            }
            
            /*          Pendiente UNIFICAR EL PEDIDO COMO GUEST Y EL PEDIDO PENDIENTE        */

            

            $user = Auth::user();
            if ($user->rol=='admin') return redirect('admin');
            else return redirect('/');
        }
        else return view('Auth/login')->with('status','Correo electrónico o contraseña incorrectos');
    }
}
