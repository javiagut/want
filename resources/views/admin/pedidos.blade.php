@extends('layouts.admin')
@section('content')
<div id='paginaJS' style="display: none">pedidos</div>
    <div class="pedidosGeneral">
        <h2>Pedidos Realizados</h2>
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
                    <td><button type="submit"><img src="https://cdn-icons-png.flaticon.com/512/69/69539.png" alt="Guardar"></button></td>
                </tr>
                <?php $i=0 ?>
                @foreach ($pedidos as $pedido)
                <tr>
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
                    <td>{{$pedido->total}}</td>
                    <td><select name="estado{{$i}}">
                        <option value="{{$pedido->id}}Realizado"  {{ 'Realizado'==$pedido->estado ? "selected='true'" : '' }}>Realizado</option>
                        <option value="{{$pedido->id}}Preparando"  {{ 'Preparando'==$pedido->estado ? "selected='true'" : '' }}>Preparando</option>
                        <option value="{{$pedido->id}}Preparado"  {{ 'Preparado'==$pedido->estado ? "selected='true'" : '' }}>Preparado</option>
                        <option value="{{$pedido->id}}Enviado"  {{ 'Enviado'==$pedido->estado ? "selected='true'" : '' }}>Enviado</option>
                        <option value="{{$pedido->id}}Llegando"  {{ 'Llegando'==$pedido->estado ? "selected='true'" : '' }}>Llegando</option>
                        <option value="{{$pedido->id}}Entregado"  {{ 'Entregado'==$pedido->estado ? "selected='true'" : '' }}>Entregado</option>
                        </select></td>
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