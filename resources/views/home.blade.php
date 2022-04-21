<?php 
    namespace App\Http\Controllers;
    use App\Models\Categoria; 
    use App\Models\Productos; 
?>
@extends('layouts.app')
@section('content')

    <div id="diapo">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="diapo" src="img/envio_gratuiro.jpg" alt="Envio gratuito">
                </div>
                <div class="carousel-item">
                    <a href="{{route('categoria','rebajas')}}"><img class="diapo" src="img/rebajas.jpg" alt="Rebajas en miles de artículos"></a>
                </div>
                <div class="carousel-item">
                    <a href="{{route('categoria','Joyería')}}"><img class="diapo" src="img/marcas.jpg" alt="Las mejores marcas del mercado al mejor precio"></a>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div id="topVentas">
        <div class="bg"></div>
        <div class="bg bg2"></div>
        <div class="bg bg3"></div>
        <h3><img style="width: 30px" src="img/iconos/fuego.png" alt="top"> Descubre los productos más vendidos <img style="width: 30px" src="img/iconos/fuego.png" alt="top"></h3>
        <div id="carouselExampleIndicators2" class="carousel slide" data-ride="">
            <div class="carousel-inner">
                <?php $extra=0?>
                @for ($e = 0; $e < 3; $e++)
                    <div class="carousel-item {{$e==0 ? 'active' : ''}}">
                        <div class="carouselTop" style="height: 250px">
                            @for ($i = $extra; $i < $extra+5; $i++)
                                <?php $producto = home_controller::devolverProducto($stocks[$i]->id_producto);
                                ?>
                                <div class="cuadroProducto">
                                    <p style="height: 30px">
                                        <span class="marcaProductoCuadro">{{$producto->marca}}</span>
                                        <span class="precioProductoCuadro">{{$stocks[$i]->precio}}€</span>
                                    </p>
                                    <a href="{{route('producto',$stocks[$i])}}"><img src="fotos/{{$stocks[$i]->id}}/{{$stocks[$i]->foto1}}" alt="foto1"></a><br>
                                    <a href="{{route('producto',$stocks[$i])}}"><span style="margin-bottom: 0" class="tituloProductoCuadro">{{$producto->nombre}}</span></a>
                                </div>
                            @endfor
                        </div>
                    </div>
                    <?php $extra+=5?>
                @endfor
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only" style="background-color: red">Next</span>
            </a>
        </div>
    </div>

    <a href="{{route('categoria','Consolas y Videojuegos')}}"><div class="gaming">
        <p style="color: white">descubre nuestra</p>
        <h3>ZONA GAMING</h3>
        <p style="color: white">de consolas y videojuegos</p>
        <div class="cube" style="margin-left: 70%;margin-top:-40px"></div>
        <div class="cube" style="margin-left: 40%;margin-top:-40px"></div>
        <div class="cube" style="margin-left: 90%;margin-top:-10px"></div>
        <div class="cube" style="margin-left: 30%;margin-top:60px"></div>
        <div class="cube" style="margin-left: 80%;margin-top:-80px"></div>
        <div class="cube" style="margin-left: 10%;margin-top:50px"></div>
        <div class="cube" style="margin-left: 20%;margin-top:-80px"></div>
        <div class="cube" style="margin-left: 68%;margin-top:30px"></div>
    </div></a>

@endsection


@section('envio')
    <div class="envio">
        <p>ENVÍO GRATIS</p> &nbsp;&nbsp;&nbsp;&nbsp
        <img src="img/paquetería.png" alt="envío gratis"> &nbsp;&nbsp;&nbsp;&nbsp
        <p style="color: white">a partir de 29€</p> &nbsp;&nbsp;&nbsp;&nbsp
        <a href="">No te lo pierdas ></a>
    </div>
@endsection
