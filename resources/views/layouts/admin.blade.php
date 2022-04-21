<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('admin.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('js/admin.js') }}"></script>
    <title>want. | Compra de calidad</title>
</head>
    <body>
        <header>
            <div class="header_title">
                <span><a href="{{ route('admin') }}"><b>want.</b><span>admin<span></a></span>
                @auth
                <a class="logoutAdmin" href="{{ route('logoutAdmin') }}">LOGOUT</a>
                @endauth
            </div>
        </header>
        <div class="general_admin">
            @Auth

            <div class="menu_admin">
                <ul>
                    <a href="{{ route('adminProductos') }}"><li class="{{request()->routeIs('adminProductos') ? 'menuColor' : (request()->routeIs('admin') ? 'menuColor' : '')}}">Productos</li></a>
                    <a href="{{ route('adminStock') }}"><li class="{{request()->routeIs('adminStock') ? 'menuColor' : ''}}">Stock</li></a>
                    <a href="{{ route('adminCategorias') }}"><li class="{{request()->routeIs('adminCategorias') ? 'menuColor' : ''}}">Categorías</li></a>
                    <a href="{{ route('adminPedidos') }}"><li class="{{request()->routeIs('adminPedidos') ? 'menuColor' : ''}}">Pedidos</li></a>
                </ul>
            </div>
            @endauth
            
    @yield('content')

    <footer>
        <div class="info">
            <a href="{{ route('admin') }}"><span class="footer_title"><b>want.</b></span></a>
            <br><br><span>Barcelona, Spain</span><br><br>
            <span>C/Aribau 24-26, 08003</span><br>
        </div>
    </footer>
</body>
</html>