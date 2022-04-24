<?php 
    namespace App\Http\Controllers;
    use Illuminate\Support\Facades\Auth;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- START SIDEBAR-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- END SIDEBAR-->
    
    <script src="{{ asset('js/main.js') }}"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    -->
    

    <link href="{{ asset('main.css') }}" rel="stylesheet" type="text/css">
    <title>want. | Compra de calidad</title>
</head>
<body>
    @yield('envio')
    

    <aside class="sidebar">
        <div class="toggle">
            <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
                <span></span>
            </a>
        </div>


        <div class="side-inner" style="background-color:white;{{request()->routeIs('/') ? 'margin-top:-50px;' : ''}}">
            <!-- SI ESTÁ LOGEADO LE MOSTRAMOS SU INFORMACIÓN -->
            @auth
                <div class="profile">
                    <p style="margin-bottom: -2px;font-size: 1em;color: black;">{{Auth::user()->nombre}}</p>
                    <h3 class="name" style="margin-bottom: 5px;font-size: 1.4em;">{{Auth::user()->apellido1}} {{Auth::user()->apellido2}}</h3>
                    <span class="country" style="color: white;">{{Auth::user()->email}}</span>
                </div>
            @endauth
            <!-- END INFO LOGEADO-->

            <div class="nav-menu">
                <ul>
                    @auth
                        <li><a href="{{route('usuario')}}"><span class="icon-sign-out mr-3"></span>Editar información</a></li>
                        <li><a href="{{route('pedidos')}}"><span class="icon-sign-out mr-3"></span>Pedidos</a></li>
                        <li><a href="{{route('logoutAdmin')}}"><span class="icon-sign-out mr-3"></span>Cerrar sesión</a></li>
                    @endauth
                    @guest
                        <li><a href="{{route('login')}}"><span class="icon-location-arrow mr-3"></span>Iniciar Sesión</a></li>
                        <li><a href="{{route('register')}}"><span class="icon-location-arrow mr-3"></span>Registrarse</a></li>
                    @endguest
                </ul>

                <!-- MOSTRAMOS LAS CATEGORÍAS PADRE -->
                <h4 style="margin-left: 20px;margin-top:20px;margin-bottom:20px;"><strong>Productos </strong><span style="font-size: 0.6em">por categoría</span></h4>
                <ul>
                    <li><a href="{{route('categoria', 'rebajas')}}"><span class="icon-pie-chart mr-3"></span>Rebajas</a></li>
                    @foreach (home_controller::findCategoriaSinPadre() as $categoria)
                        <li><a href="{{route('categoria', $categoria->categoria)}}"><span class="icon-pie-chart mr-3"></span>{{$categoria->categoria}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        
    </aside>

    <header style="border-bottom: 1px solid #5baa9a">
        <div class="header_title"><span><a href="{{ route('/') }}"><b>want.</b></a></span></div>
        
        @guest
            <a href="{{ route('login') }}">
                <img  class="header_usuario" src="img/persona.jpg" alt="Usuario">
            </a>
        @endguest

        <div class="btn-group header_carro_compra">
            <button type="button" style=" background-color: white;border:none;box-shadow: none;" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img  style="width: 30px" src="img/carro_compra.png" alt="Cesta">
                @if (home_controller::existeCesta() != null)
                    @if (home_controller::informarProductosCesta() != null)
                        <span class="cantidadCesta">
                            {{home_controller::informarProductosCesta()}}
                        </span>
                    @endif
                @endif
            </button>
            <div class="dropdown-menu dropdown-menu-right cajaCesta">
                @if (home_controller::existeCesta() != null)
                    <?php $pedido = home_controller::existeCesta() ?>
                    @foreach (home_controller::devolverDetalle($pedido[0]->id) as $detalle)
                    <?php   $pedido = home_controller::existeCesta() ;
                            $stock = home_controller::devolverStock($detalle->id_stock);
                            $producto = home_controller::devolverProducto($stock->id_producto);
                    ?>
                        <div class="cajaStock">
                            <div class="cajafotoCesta">
                                <a href="{{route('producto',$stock->id)}}"><img class="fotoCesta" src="fotos/{{$detalle->id_stock}}/{{$stock->foto1}}" alt="Foto Producto"></a>
                            </div>
                            <div class="stockCesta">
                                <a href="{{route('producto',$stock->id)}}"><p class="tituloStockCesta">{{$producto->nombre}}</p></a>
                                <p class="cantidadStockCesta">Cantidad: {{$detalle->cantidad}}
                                <span class="precioStockCesta">{{$stock->precio}} €</span></p>
                                <form method='POST' action="{{route('eliminarStockCesta', $detalle->id)}}">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="eliminarStockCesta"><small>Eliminar</small></button>
                                </form>
                                <form method='POST' action="{{route('sumarStockCesta', $detalle->id)}}">
                                    @csrf @method('PATCH')
                                    <button type="submit" class="eliminarStockCesta">+</button>
                                </form>
                                <form method='POST' action="{{route('restarStockCesta', $detalle->id)}}">
                                    @csrf @method('PATCH')
                                    <button type="submit" class="eliminarStockCesta">—</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                    <div class="totalCestaDiv">
                        <span style="color: black;float:left;margin-top:6px;">Total : </span>
                        <span class="totalCesta">{{$pedido[0]->total}} €</span>
                    </div>
                    <form method='POST' action="{{route('eliminarCesta', $pedido[0])}}">
                        @csrf @method('DELETE')
                        <button type="submit" class="eliminarStockCesta"><small>Vaciar</small></button>
                    </form>
                    <a href="{{route('finalizarPedido',$pedido[0])}}" class="finalizarPedido">Finalizar Pedido</a>
                @else
                    <p style="padding:10px;color:black;text-align:center;width:220px;margin-top:1em;">Su cesta está vacía</p>
                @endif
            </div>
        </div>
        <div class="buscadorProductos">
            <form method='GET' action="{{route('buscarProductos')}}">
                @csrf
                <input type="text" name="texto" id="texto">
                <button type='submit'><img src="https://cdn-icons-png.flaticon.com/512/64/64673.png" alt="Buscar"></button>
            </form>
        </div>
        @if (session('status'))
            <p id="status">{{session('status')}}</p>
        @endif
        
        <div class="header_menu">
            <div class="ul">
                <a href="{{route('categoria', home_controller::findCategoryByName('Hogar y Jardín'))}}">Hogar y Jardín</a>
                <a href="{{route('categoria', home_controller::findCategoryByName('Libros'))}}">Libros</a>
                <a href="{{route('categoria', home_controller::findCategoryByName('Joyería'))}}">Joyería</a>
                <a href="{{route('categoria', home_controller::findCategoryByName('Deportes'))}}">Deportes</a>
                <a href="{{route('categoria', home_controller::findCategoryByName('Moda'))}}">Moda</a>
                <a href="{{route('categoria', home_controller::findCategoryByName('Electrónica'))}}">Electrónica</a>
                <a href="{{route('categoria', home_controller::findCategoryByName('Música'))}}">Música</a>
            </div>
        </div>
    </header>

    @yield('content')
    
    <footer>
        <div class="info">
            <a href="{{ route('/') }}"><span class="footer_title"><b>want.</b></span></a>
            <br><br><span>Barcelona, Spain</span><br><br>
            <span>C/Aribau 24-26, 08003</span><br>
        </div>
        <?php $categorias = home_controller::categorias();
            $div = count($categorias)/2;
            $i=1;
            $e=1;
        ?>
        <div class="categoriasFooter">
            @foreach ($categorias as $categoria)
            <?php $e++ ?>
                @if ($i > $div && $e<count($categorias))
                    </div>
                    <div class="categoriasFooter">
                    <?php $i=0; ?>
                @endif
                <span><a href="{{route('categoria', $categoria->categoria)}}">{{$categoria->categoria}}</a></span><br>
                <?php $i++ ?>
            @endforeach
        </div>
        @auth
            <div class="categoriasFooter">
                @if (home_controller::esAdmin() == true)
                    <a href="{{route('admin')}}"><span class="icon-location-arrow mr-3"></span>Gestión de la Tienda</a>
                @endif
                <h3 style="margin: 10px;color:#5baa9a;padding-left: 0;">Gestionar cuenta</h3>
                <a href="{{route('usuario')}}"><span class="icon-sign-out mr-3"></span>Editar información</a>
                <a href="{{route('pedidos')}}"><span class="icon-sign-out mr-3"></span>Pedidos</a>
                <a href="{{route('logoutAdmin')}}"><span class="icon-sign-out mr-3"></span>Cerrar sesión</a>
            </div>
        @endauth
        @guest
            <div class="categoriasFooter">
                <h3 style="margin-left: 10px;color:#5baa9a;">Acceso a su cuenta</h3>
                <a href="{{route('login')}}"><span class="icon-location-arrow mr-3"></span>Iniciar Sesión</a>
                <a href="{{route('register')}}"><span class="icon-location-arrow mr-3"></span>Registrarse</a>
            </div>
        @endguest
    </footer>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>
</html>