<?php use App\Models\Categoria; 
    use Carbon\Carbon;
    use App\Models\Productos;
    use App\Models\Stock;
    use App\Models\Colores;
    use App\Models\Tallas;
?>

@extends('layouts.admin')
@section('content')
<div id='paginaJS' style="display: none">{{$pagina[0]}}</div>
    <div id="avisoStock">
        <p>· Desde aquí podrás crear y modificar el <b>stock</b></p><br>
        <p>· Recuerda que si no existe el producto, debes crearlo en el apartado <b>Productos</b> del menú de navegación</p>
        @if (session('status'))
            <p id="status">{{session('status')}}</p>
        @endif
    </div>
    <div id="stockGeneral">
        <div id="mostrarEditarProducto" style="display:block;">
            <div class="editProdGen">
                <?php $mitad = count($categorias)/2; $i=0; ?>
                @foreach ($categorias as $categoria)
                    <button id="catProBTN" class="catProBTN">{{$categoria->categoria}}</button>
                    <?php $i++; ?>
                    @if ($i>$mitad-4)
                        <br>
                        <?php $i=0; ?>
                    @endif
                @endforeach
                <button id="catProBTN" class="catProBTN">No catalogados</button><br>
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
                                    <button onclick="mostrarStock('{{$prod->id}}');up('{{$prod->nombre}}')" id="prodCatAbierta">{{$prod->nombre}}</button>
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
                                <button onclick="mostrarStock('{{$prod->id}}');up('{{$prod->nombre}}')" id="prodCatAbierta">{{$prod->nombre}}</button>
                            @endforeach
                        @else
                            <p style="color:red;">No hay productos sin clasificar</p>
                        @endif
                    </div>
                </div>
                <div id="stockProductoSeleccionado">
                    @foreach ($productos as $producto)
                        @if (count(Stock::stockProducto($producto->id))>0)
                            @foreach (Stock::stockProducto($producto->id) as $stock)
                                <table>
                                    <tr class="titleStock" id="{{$producto->id}}">
                                        @if ($stock->categoria=='Moda')
                                            <td>{{$stock->sexo}}</td>
                                            <td>{{$stock->talla}}</td>
                                        @endif
                                        <td>{{Colores::colorStock($stock->id_color)}}</td>
                                        <td>{{$stock->precio}}€</td>
                                        <td><button class="editarStock" onclick='editarStock({{$stock->id}})'>Editar</button></td>
                                        
                                    </tr>
                                </table>
                                <form class="editarStockFormulario" method='POST' action='{{route('actualizarStock', $stock)}}' enctype='multipart/form-data'>
                                    @csrf
                                    @method('PATCH')
                                    <table>
                                        <tr style="display: none"><td><input type="text" value="{{$stock->id}}" name="id" readonly></td></tr>
                                        <tr>
                                            <td><label>Talla</label></td>
                                            <td><select name="talla">
                                                    @foreach (Tallas::tallas() as $talla)
                                                        <option value="{{$talla->id}}" {{ ($stock->id_talla)==$talla->id ? "selected='true'" : '' }}>{{$talla->talla}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td><input class="mdBTNsubmit" type="submit" value="Guardar"></td>
                                        </tr>
                                        <tr>
                                            <td><label>Color</label></td>
                                            <td><select name="color">
                                                    @foreach (Colores::colores() as $color)
                                                        <option value="{{$color->id}}" {{ ($stock->id_color)==$color->id ? "selected='true'" : '' }}>{{$color->color}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label>Sexo</label></td>
                                            <td>
                                                <select name="sexo">
                                                    <option value="" {{ ($stock->sexo)=='' ? "selected='true'" : '' }}>Unisex</option>
                                                    <option value="M" {{ ($stock->sexo)=='M' ? "selected='true'" : '' }}>Masculino</option>
                                                    <option value="F" {{ ($stock->sexo)=='F' ? "selected='true'" : '' }}>Femenino</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr><td><label>Precio</label></td><td><input name="precio" type="number" step="0.01" value="{{$stock->precio}}"></td></tr>
                                        <tr><td><label>Stock actual</label></td><td><input name="stock" type="number" value="{{$stock->stock}}"></td></tr>
                                        <tr><td><label>Stock vendido</label></td><td><input name="ventas" type="number" value="{{$stock->ventas}}" readonly></td></tr>
                                        <tr><td><label>Añadir Fotografías</label></td><td><input class="adjuntarFoto" type='file' name='foto1'></td></tr>
                                        <tr><td></td><td><input class="adjuntarFoto" type='file' name='foto2'></td></tr>
                                        <tr><td></td><td><input class="adjuntarFoto" type='file' name='foto3'></td></tr>
                                        <tr><td></td><td><input class="adjuntarFoto" type='file' name='foto4'></td></tr>
                                        <tr><td></td><td><input class="adjuntarFoto" type='file' name='foto5'></td></tr>
                                    </table>
                                    <div style="display: flex;margin-top:30px;">
                                        @for ($i = 1; $i < 6; $i++)
                                            <?php $foto = 'foto'.$i ?>
                                            @if ($stock->$foto != '')
                                                <div style="margin:5px;">
                                                    <p>{{$stock->$foto}}</p>
                                                    <img style="width:150px;" src="/want/public/fotos/{{$stock->id}}/{{$stock->$foto}}" alt="{{$producto->nombre}}">
                                                </div>
                                            @endif
                                        @endfor

                                    </div>
                                </form>
                            @endforeach
                        @else
                            <p class="titleStock" id="{{$producto->id}}" style="color: red">No existe stock del producto</p>
                        @endif
                    @endforeach
                    <table>
                        <tr class="titleStock" id="nuevoStock">
                            <td style="padding-left: 60px">Nuevo stock</td>
                            <td><button onclick="mostrarFormularioNuevoStock()" class="editarStock">Añadir</button></td>
                        </tr>
                    </table>

                    <form id="crearStockFormulario" method='POST' action='{{route('nuevoStock')}}' enctype='multipart/form-data'>
                        @csrf
                        <table>
                            <tr style="display: none"><td><input type="text" name="id" readonly></td></tr>
                            <tr>
                                <td><label>Talla</label></td>
                                <td><select name="talla">
                                        @foreach (Tallas::tallas() as $talla)
                                            <option value="{{$talla->id}}">{{$talla->talla}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input class="mdBTNsubmit" type="submit" value="Guardar"></td>
                            </tr>
                            <tr>
                                <td><label>Color</label></td>
                                <td><select name="color">
                                        @foreach (Colores::colores() as $color)
                                            <option value="{{$color->id}}">{{$color->color}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Sexo</label></td>
                                <td>
                                    <select name="sexo">
                                        <option value="">Unisex</option>
                                        <option value="M">Masculino</option>
                                        <option value="F">Femenino</option>
                                    </select>
                                </td>
                            </tr>
                            <tr><td><label>Precio</label></td><td><input name="precio" type="number" step="0.01" value="0.01"></td></tr>
                            <tr><td><label>Stock actual</label></td><td><input name="stock" type="number"></td></tr>
                            <tr><td><label>Stock vendido</label></td><td><input name="ventas" type="number" value="0" readonly></td></tr>
                            <tr><td><label>Añadir Fotografías</label></td><td><input class="adjuntarFoto" type='file' name='foto1' required></td></tr>
                            <tr><td></td><td><input class="adjuntarFoto" type='file' name='foto2'></td></tr>
                            <tr><td></td><td><input class="adjuntarFoto" type='file' name='foto3'></td></tr>
                            <tr><td></td><td><input class="adjuntarFoto" type='file' name='foto4'></td></tr>
                            <tr><td></td><td><input class="adjuntarFoto" type='file' name='foto5'></td></tr>
                        </table>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection