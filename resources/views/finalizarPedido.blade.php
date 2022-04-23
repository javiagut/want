<?php 
    namespace App\Http\Controllers;
?>
@extends('layouts.app')
@section('content')
<div class="pedidosGeneral" style="display: flex;justify-content:center;">

    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>
        <div class="pedidos">
            <h3 class="tituloPedidosRealizados">Cesta</h3>
            @if (session('sinStock'))
                <p id="status">{{session('sinStock')}}</p>
            @endif
            @if (home_controller::existeCesta())
            <?php $pedido = home_controller::existeCesta() ?>
                <div id="pedido">
                    <div class="tituloPedido">
                        <?php 
                            $timestamp = strtotime($pedido[0]->created_at); 
                            $fecha = date("d", $timestamp).' de '.date("F", $timestamp).' de '.date("Y", $timestamp);
                        ?>
                        <span>Fecha: {{$fecha}}</span>
                        <span style="float: right;margin-right:30px;">Estado: {{$pedido[0]->estado}}</span>
                    </div>
                    <div class="infoPedido">
                        @foreach (home_controller::devolverDetalle($pedido[0]->id) as $detalle)
                            <?php $stock = home_controller::devolverStock($detalle->id_stock);
                                $producto = home_controller::devolverProducto($stock->id_producto)
                            ?>
    
                            <div class="cajaStock">
                                <div class="cajafotoCesta">
                                    <a href="{{route('producto',$stock->id)}}"><img class="fotoCesta" src="fotos/{{$stock->id}}/{{$stock->foto1}}" alt="Foto Producto"></a>
                                </div>
                                <div class="stockCesta" style="width: 100%;">
                                    <a href="{{route('producto',$stock->id)}}"><p class="tituloStockCesta">{{$producto->nombre}}</p></a>
                                    <p class="cantidadStockCesta">Cantidad: {{$detalle->cantidad}}
                                    <span class="precioStockCesta">{{$stock->precio}} €</span></p>
                                    <form method='POST' action="{{route('eliminarStockCesta', $detalle)}}">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="eliminarStockCesta"><small>Eliminar</small></button>
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
                        <a href="{{route('realizarPedido',$pedido[0])}}" class="finalizarPedido">Realizar Pedido</a>
                    
                    </div>
                </div>
            @else
            <div class="cajaStock" style="background-color: white;border-radius:10px;">
                <div class="stockCesta" style="text-align: center;width:100%;">
                    <p style="padding:10px;color:black;margin-top:1em;">Su cesta está vacía</p>
                </div>
            </div>
                <div class="totalCestaDiv" style="background-color: white;border-radius:10px;">
                    <span style="color: black;float:left;margin-top:6px;">Total : </span>
                    <span class="totalCesta">0 €</span>
                </div>
            @endif
        </div>
</div>

@endsection