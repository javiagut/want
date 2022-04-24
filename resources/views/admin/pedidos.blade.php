<?php
    namespace App\Http\Controllers;
?>

@extends('layouts.admin')
@section('content')
<div id='paginaJS' style="display: none">pedidos</div>
    <div class="pedidosGeneral">
        <h2>Pedidos Realizados</h2>
        @if (session('status'))
            <p id="status">{{session('status')}}</p>
        @endif
        <form method='POST' action="{{route('actualizarPedidos',$pedidos[0])}}" id="formPedidos">
            @csrf
            @method('PATCH')
            <table class="tablaPedidos">
                <tr>
                    <td>ID</td>
                    <td>Cliente</td>
                    <td>Creación</td>
                    <td>Última Modificación</td>
                    <td>Total</td>
                    <td>Estado</td>
                    <td><button type="submit"><img style="border-radius:50%;" src="{{asset('img/iconos/guardar.png')}}" alt="Guardar"></button></td>
                </tr>
                <?php $i=0 ?>
                @foreach ($pedidos as $pedido)
                <tr class="pedidoAdmin">
                    <td>{{$pedido->id}}</td>
                    <td>{{$pedido->id_cliente}}</td>
                    <?php 
                                $timestamp = strtotime($pedido->created_at); 
                                $fecha = date("d/m/Y", $timestamp).' a las'.date(" G:i", $timestamp);
                            ?>
                    <td>{{$fecha}}</td>
                    <?php
                                $timestamp = strtotime($pedido->created_at); 
                                $fecha = date("d/m/Y", $timestamp).' a las'.date(" G:i", $timestamp);
                            ?>
                    <td>{{$fecha}}</td>
                    <td>{{$pedido->total}}€</td>
                    <td><select name="estado{{$i}}" style="margin-top: 0;">
                        <option value="{{$pedido->id}}Realizado"  {{ 'Realizado'==$pedido->estado ? "selected='true'" : '' }}>Realizado</option>
                        <option value="{{$pedido->id}}Preparando"  {{ 'Preparando'==$pedido->estado ? "selected='true'" : '' }}>Preparando</option>
                        <option value="{{$pedido->id}}Preparado"  {{ 'Preparado'==$pedido->estado ? "selected='true'" : '' }}>Preparado</option>
                        <option value="{{$pedido->id}}Enviado"  {{ 'Enviado'==$pedido->estado ? "selected='true'" : '' }}>Enviado</option>
                        <option value="{{$pedido->id}}Llegando"  {{ 'Llegando'==$pedido->estado ? "selected='true'" : '' }}>Llegando</option>
                        <option value="{{$pedido->id}}Entregado"  {{ 'Entregado'==$pedido->estado ? "selected='true'" : '' }}>Entregado</option>
                        </select></td>
                    <td>
                        <img ondblclick="mostrarDetalle({{$pedido->id}})" style="width:25px;cursor:pointer;" src="{{asset('img/iconos/editar.png')}}" alt="Ver">
                    </td>
                </tr>
                <tr class="detallePedido" id="{{$pedido->id}}" style="display: none;">
                    <td colspan="7">
                        <div class="infoPedido">
                            @foreach (home_controller::devolverDetalle($pedido->id) as $detalle)
                            <?php $stock = home_controller::devolverStock($detalle->id_stock);
                                $producto = home_controller::devolverProducto($stock->id_producto);
                            ?>
                                <div class="cajaStock">
                                    <div class="cajafotoCesta">
                                        <a href="{{route('producto',$stock->id)}}"><img class="fotoCesta" src="{{asset('fotos/'.$stock->id.'/'.$stock->foto1)}}" alt="Foto Producto"></a>
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
                        </div>
                    </td>
                </tr>
                <?php $i++ ?>
                @endforeach
            </table>
            
        </form>
    <div class="paginacion">
        {{$pedidos->links() }}
    </div>
    </div>
@endsection