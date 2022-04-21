<?php
    namespace App\Http\Controllers;
?>
@extends('layouts.app')

@section('content')
<div class="generalProducto">
    <div class="galeriaProducto">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="">
            
            <div class="carousel-inner" style="padding-bottom: 50px">
                <div class="carousel-item active">
                    <img class="d-block easyzoom easyzoom--overlay is-ready" style="width: 400px;margin-left:30%;margin-right:30%;" src="fotos/{{$stock->id}}/{{$stock->foto1}}" alt="{{$producto->nombre}}">
                </div>
                @for ($i = 2; $i < 6; $i++)
                    <?php $foto = 'foto'.$i.'' ?>
                    @if ($stock->$foto != '')
                        <div class="carousel-item">
                            <img class="d-block" style="width: 400px;margin-left:30%;margin-right:30%;" src="fotos/{{$stock->id}}/{{$stock->$foto}}" alt="{{$producto->nombre}}">
                        </div>
                    @endif
                @endfor
            </div>
            <ol class="carousel-indicators miniaturasGaleriaProducto">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active" style="width: 100px;"><img class="d-block" style="width: 100px;" src="fotos/{{$stock->id}}/{{$stock->foto1}}" alt="{{$producto->nombre}}"></li>
                @for ($i = 2; $i < 6; $i++)
                <?php $foto = 'foto'.$i.'' ?>
                    @if ($stock->$foto != '')
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{$i-1}}" style="width: 100px;"><img class="d-block" style="width: 100px;" src="fotos/{{$stock->id}}/{{$stock->$foto}}" alt="{{$producto->nombre}}"></li>
                    @endif
                @endfor
            </ol>
          </div>
    </div>
    <div class="infoProducto">
        <h3>{{$producto->nombre}}</h3>
        <p style="color: #5baa9a">{{$producto->marca}}</p>
        <p class="precioInfoProducto">{{$stock->precio}}€</p>
        <p style="color: black;width:80%;text-align:justify;">{{$producto->descripcion}}</p>
        <p style="color:#5baa9a;">Color: {{home_controller::devolverColor($stock->id_color)->color}}</p>
        <form action="{{route('añadirCesta', $stock)}}">
            <select name="cantidad" id="cantidad">
                @for ($i = 0; $i < 20; $i++)
                    <option value="{{$i+1}}">{{$i+1}}</option>
                @endfor
            </select>
            <button type="submit">Añadir al carrito</button>
        </form>
    </div>
</div>
<div id="topVentas" style="background-color: #5baa9a;margin-bottom:50px;">
    <h3>También te puede interesar</h3>
    <div id="carouselExampleIndicators2" class="carousel slide" data-ride="">
        <div class="carousel-inner">
            <?php $extra=0?>
            @for ($e = 0; $e < 3; $e++)
                <div class="carousel-item {{$e==0 ? 'active' : ''}}">
                    <div class="carouselTop" style="height: 250px">
                        @for ($i = $extra; $i < $extra+5; $i++)
                        <?php $producto = home_controller::devolverProducto($stocks[$i]->id_producto) ?>
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
@endsection