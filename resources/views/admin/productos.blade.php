<?php use App\Models\Categoria; 
    use Carbon\Carbon;
    use App\Models\Productos;
?>
@extends('layouts.admin')
@section('content')
    <div id='paginaJS' style="display: none">{{$pagina[0]}}</div>   
    <div class="container_menu_productos">
        <div class="buttons_pro">
            <button class="añadirPro" type="button">Añadir Producto</button>
            <button type="button">Modificar/Eliminar Productos</button>
        </div>
    </div>
    <div id="avisoProductos">
        <p>· Desde aquí podrás crear, modificar y eliminar los <b>productos</b> del sitio web</p><br>
        <p>· Si ya existe el producto, debes registrar la entrada de stock en la página de <b>stock</b> que encontrarás en el menú de navegación</p>
        @if (session('status'))
            <p id="status">{{session('status')}}</p>
        @endif
    </div>
    <div id="mostrarAñadirProducto">
        <h3>Nuevo Producto</h3>
        <form method="POST" action="{{route('nuevoProducto')}}" id="añadirProductoFormulario" >
            @csrf
            <table>
                <tr>
                    <td><label>Nombre</label></td>
                    <td><input type="text" value="" name="nombre" maxlength="50"></td>
                </tr>
                <tr>
                    <td><label>Categoría</label></td>
                    <td><select name="categoria">
                            @foreach ($categorias as $categoria)
                                <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Marca</td>
                    <td><input type="text" name="marca" maxlength="50"></td>
                </tr>
                <tr>
                    <td>Descripción</td>
                    <td><textarea rows="6" cols="50" name="descripcion" form="añadirProductoFormulario" maxlength="500"></textarea></td>
                </tr>
                <tr>
                    <td><label>Estado</label></td>
                    <td><select name="estado">
                            <option value="OK">OK</option>
                            <option value="NOK">NOK</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Producto Rebajado</label></td>
                    <td><input type="checkbox" class="activarRebaja" value="" name=""></td>
                </tr>
                <tr class="rebajaActivada">
                    <td><label>Rebaja en %</label></td>
                    <td><input type="number" name="rebaja" max="100"></td>
                </tr>
                <tr class="rebajaActivada">
                    <td><label>Fecha Inicio</label></td>
                    <td><input type="date" name="rebaja_inicio"></td>
                </tr>
                <tr class="rebajaActivada">
                    <td><label>Fecha Fin</label></td>
                    <td><input type="date" name="rebaja_fin"></td>
                </tr>
            </table>
            <input class="añBTNsubmit" type="submit" value="Guardar">
        </form>
    </div>
        <div id="mostrarEditarProducto">
            <div class="editProdGen">
                <?php $mitad = count($categorias)/2; $i=0; ?>
                @foreach ($categorias as $categoria)
                    <button id="catProBTN" class="catProBTN">{{$categoria->categoria}}</button>
                @endforeach
                <button id="catProBTN" class="catProBTN">No catalogados</button>
                <button id="catProBTN" class="catProBTN">Todos</button><br>
            </div>
            <div id="formularioProductoSeleccionado">
                <div id="productosCategoriaSeleccionada">
                    <form id="buscador">
                    <input onkeyup="filtrarProducto()" type="text" id="buscadorProductos" name="buscadorProductos" placeholder="Introduce el nombre del producto">
                    </form>
                    @foreach ($categorias as $categoria)
                        <div class="listaProductos" id="{{$categoria->categoria}}">
                            <h3>{{$categoria->categoria}}</h3>
                            @if (count(Productos::productos($categoria->id))>0)
                                @foreach (Productos::productos($categoria->id) as $prod)
                                    <button onclick="up('{{$prod->nombre}}');rellenarFormularioEditarProductos('{{$prod->id}}','{{$prod->nombre}}','{{$prod->id_categoria}}','{{$prod->rebaja}}','{{$prod->rebaja_inicio}}','{{$prod->rebaja_fin}}','{{$prod->estado}}',)" class="prodCatAbierta" id="prodCatAbierta">{{$prod->nombre}}</button>
                                @endforeach
                            @else
                                <p style="color:red;">No hay productos de la categoría {{$categoria->categoria}}</p>
                            @endif
                        </div>
                    @endforeach
                    <div class="listaProductos" id="No catalogados">
                        <h3>No catalogados</h3>
                        @if (count(Productos::productosCategoriaNull())>0)
                            @foreach (Productos::productosCategoriaNull() as $prod)
                                <button onclick="up('{{$prod->nombre}}');rellenarFormularioEditarProductos('{{$prod->id}}','{{$prod->nombre}}','{{$prod->id_categoria}}','{{$prod->rebaja}}','{{$prod->rebaja_inicio}}','{{$prod->rebaja_fin}}','{{$prod->estado}}',)" class="prodCatAbierta">{{$prod->nombre}}</button>
                            @endforeach
                        @else
                            <p style="color:red;">No hay productos sin clasificar</p>
                        @endif
                    </div>
                </div>
                <?php $producto = 'nada'; ?>
                <form id="editarProductoFormulario" method='POST' action='{{route('actualizarProducto', $producto)}}'>
                    @csrf
                    @method('PATCH')
                    <table>
                        <tr style="display: none"><td><input type="text" value="" name="id"></td></tr>
                        <tr>
                            <td><label>Nombre</label></td>
                            <td><input type="text" value="" name="nombre" maxlength="50"></td>
                        </tr>
                        <tr>
                            <td><label>Categoría</label></td>
                            <td><select name="categoria">
                                    @foreach ($categorias as $categoria)
                                        <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Estado</label></td>
                            <td><select name="estado">
                                    <option value="OK">OK</option>
                                    <option value="NOK">NOK</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Producto Rebajado</label></td>
                            <td><input type="checkbox" class="activarRebaja" value="" name="check" ></td>
                        </tr>
                        <tr class="rebajaActivada">
                            <td><label>Rebaja en %</label></td>
                            <td><input type="number" name="rebaja" max="100"></td>
                        </tr>
                        <tr class="rebajaActivada">
                            <td><label>Fecha Inicio</label></td>
                            <td><input type="date" name="rebaja_inicio"></td>
                        </tr>
                        <tr class="rebajaActivada">
                            <td><label>Fecha Fin</label></td>
                            <td><input type="date" name="rebaja_fin"></td>
                        </tr>
                    </table>
                    <input class="mdBTNsubmit" type="submit" value="Guardar">
                </form>
            </div>
            <form id="eliminarProducto" method='POST' action='{{route('eliminarProducto', $producto)}}'>
                @csrf @method('DELETE')

                <input style="display: none" type="text" value="" name="id">
                <input class="elBTNsubmit" type="submit" value="Eliminar">

            </form>
        </div>
    </div>
@endsection