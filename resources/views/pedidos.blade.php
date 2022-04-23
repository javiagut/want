<?php 
    namespace App\Http\Controllers;
?>
@extends('layouts.app')
@section('content')
<div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>
    <div class="pedidosGeneral">
        <div class="pedidos">
            <h3 class="tituloPedidosRealizados">Pedidos realizados</h3>
            @if ($pedidos != null)
                @foreach ($pedidos as $pedido)
                    <div id="pedido">
                        <div class="tituloPedido">
                            <?php 
                                $timestamp = strtotime($pedido->created_at); 
                                $fecha = date("d", $timestamp).' de '.date("F", $timestamp).' de '.date("Y", $timestamp).' a las'.date(" G:i", $timestamp);
                            ?>
                        <span>Fecha: {{$fecha}}</span>
                        <span style="float: right;margin-right:30px;">Estado: {{$pedido->estado}}</span>
                        </div>
                        <div class="infoPedido">
                            @foreach (home_controller::devolverDetalle($pedido->id) as $detalle)
                            <?php $stock = home_controller::devolverStock($detalle->id_stock);
                                $producto = home_controller::devolverProducto($stock->id_producto);
                            ?>
                                <div class="cajaStock">
                                    <div class="cajafotoCesta">
                                        <a href="{{route('producto',$stock->id)}}"><img class="fotoCesta" src="fotos/{{$stock->id}}/{{$stock->foto1}}" alt="Foto Producto"></a>
                                    </div>
                                    <div class="stockCesta" style="width: 100%;">
                                        <a href="{{route('producto',$stock->id)}}"><p class="tituloStockCesta">{{$producto->nombre}}</p></a>
                                        <p class="cantidadStockCesta">Cantidad: {{$detalle->cantidad}}
                                        <span class="precioStockCesta">{{$stock->precio}} €</span></p>
                                    </div>
                                </div>
                            @endforeach
                            <div class="totalCestaDiv">
                                <span style="color: black;float:left;margin-top:6px;">Total : </span>
                                <span class="totalCesta">{{$pedido->total}} €</span>
                            </div>
                            <?php 
                                $timestamp2 = strtotime($pedido->updated_at); 
                                $fecha2 = date("d", $timestamp2).' de '.date("F", $timestamp2).' de '.date("Y", $timestamp2).' a las'.date(" G:i", $timestamp2);
                            ?>
                            <p style="color: rgb(104, 104, 104);margin-left:10px;">Última actualización: {{$fecha2}}</p>
                        </div>
                    </div>
                @endforeach
                <div class="paginacion">
                    {{$pedidos->links() }}
                </div>
            @else
            <p>NO SE HA REALIZADO NINGÚN PEDIDO</p>
            @endif
        </div>
        <div class="cestaPedidos">
            <h3 class="tituloPedidosRealizados">Cesta</h3>
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
                                <div class="stockCesta">
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
                        <a href="{{route('finalizarPedido',$pedido[0])}}" class="finalizarPedido">Finalizar Pedido</a>
                    
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
@section('envio')
    <div class="envio">
        <p>ENVÍO GRATIS</p> &nbsp;&nbsp;&nbsp;&nbsp
        <img src="img/paquetería.png" alt="envío gratis"> &nbsp;&nbsp;&nbsp;&nbsp
        <p style="color: white">a partir de 29€</p> &nbsp;&nbsp;&nbsp;&nbsp
        <a href="">No te lo pierdas ></a>
    </div>
@endsection