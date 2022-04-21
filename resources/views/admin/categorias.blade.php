<?php use App\Models\Categoria; ?>
@extends('layouts.admin')
@section('content')
<div id='paginaJS' style="display: none">{{$pagina[0]}}</div>
    <?php $categorias_madre = [];?>
    @foreach ($categorias as $categoria)
        @if ($categoria->id_cat_padre==0)
            <?php $categorias_madre[count($categorias_madre)]=$categoria; ?>
        @endif
    @endforeach
    <div class="container_form_categorias">
        <div id="esquema_categorias">
            <?php $column=0; ?>
            <div class="row_categorias">
                <section class='categoria admin_categoria_title'>
                    <label onclick="mostrarTodas()">CATEGORÍAS</label>
                </section>
            </div>
                @foreach ($categorias_madre as $madre)
                    <div class="row_categorias" id="{{$madre->id}}madre">
                        <section class='categoria'>
                            <button type="button" onclick="mostrarHijos({{$madre->id}})" class="categoria_abuelo">{{ $madre->categoria }}</button>
                        </section>

                    @foreach ($categorias as $posible_hijo)

                        @if ($posible_hijo->id_cat_padre==$madre->id)
                            <div class="row_categorias oculto cat" id="{{$madre->id}}">
                                <section class='categoria'>
                                    <button type="button" onclick="mostrarHijos({{$posible_hijo->id}})" class="categoria_hijo">{{ $posible_hijo->categoria }}</button>
                                </section>
                            </div>
                            
                            @foreach ($categorias as $posible_nieto)
        
                                @if ($posible_nieto->id_cat_padre==$posible_hijo->id)
                                    <div class="row_categorias oculto {{$madre->id}} cat" id="{{$posible_hijo->id}}">
                                        <section class='categoria'>
                                            <button type="button"  class="categoria_nieto">{{ $posible_nieto->categoria }}</a>
                                        </section>
                                    </div>
                                @endif
        
                            @endforeach

                        @endif

                    @endforeach

                    </div>
                @endforeach
        </div>

        <div class="formularios_categorias">
            <div class="buttons_cat">
                <div>
                    <button class="añadir" type="button">Añadir Categoria</button>
                    <button type="button">Modificar categoria</button>
                </div>
                @if (session('status'))
                    <p id="status">{{session('status')}}</p>
                @endif
            </div>
            <div id="form_nueva_categoria">
                <form method='POST' action='{{ route('nuevaCategoria') }}'>
                    @csrf
                    <div class='nueva_categoria'>
                        <section class='section_nueva_categoria'>
                            <label>Nombre</label>
                            <input type='text' name='categoria' maxlength='30' required><br>
                            <label>Categoria Madre</label>
                            <select name="madre">
                                <option value=""></option>
                                @foreach ($categorias as $categoria)
                                <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
                                @endforeach
                            </select>
                            <label>Estado</label>
                            <select name="estado">
                                <option value="OK">OK</option>
                                <option value="NOK">NOK</option>
                            </select>
                        </section>
                    </div>
                    <input class="nueva_Cat" type='submit' value='Guardar'>
                </form>
            </div>

            <div id="form_modificar_categoria">
                <table>
                    <tr>
                        <th></th>
                        <th>Categoría</th>
                        <th>Categoría Madre</th>
                        <th>Estado</th>
                    </tr>
                    
                    @foreach (Categoria::orderCategoriaMadre() as $categoria)
                        
                            <tr>
                                <td class="eliminarCategoria">
                                    <form action="{{ route('eliminarCategoria', $categoria) }}" method="POST" >
                                        @csrf @method('DELETE')
                                        <input class="eliminarCat" type="submit" value="Eliminar"><img class="basura_cat" src="https://img.icons8.com/ios-glyphs/30/000000/trash--v1.png">
                                    </form>
                                </td>
                                <form method='POST' action='{{ route('actualizarCategorias', $categoria) }}'>
                                    @csrf
                                    @method('PATCH')
                                <td><input class="nombreCategoriaTabla" type="text" value="{{$categoria->categoria}}" name="categoria"></td>
                                <td>
                                    @if(Categoria::find($categoria->id_cat_padre)!=null)
                                        <select name="madre">
                                            <option value=""></option>
                                            @foreach ($categorias as $categoria2)
                                                <option value="{{$categoria2->id}}" {{ (Categoria::findByPadre($categoria->id_cat_padre))==$categoria2->id ? "selected='true'" : '' }}>{{$categoria2->categoria}}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <select name="madre">
                                            <option value=""></option>
                                            @foreach ($categorias as $categoria)
                                                <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
                                            @endforeach
                                        </select>
                                    @endisset

                                </td>
                                <td>
                                    <select name="estado">
                                    <option value="OK">OK</option>
                                        @if ("NOK" != $categoria->estado)
                                            <option value="NOK">NOK</option>
                                        @else
                                            <option value="NOK" selected='true'>NOK</option>
                                        @endif
                                    </select>
                                </td>
                                <td>
                                    <input class="guardar_cat_edit" type="submit" value="Guardar">
                                </td>
                            </tr>
                        </form>
                    @endforeach
                </table>
            </div>
            <div id="avisoCategorias">
                <p>· Desde aquí podrás crear, modificar y eliminar las <b>categorías</b> del sitio web</p><br>
                <p>· Recuerda que una categoría solo puede tener padre y abuelo, <span style="color: red">no bisabuelo ni bisnieto<span></p><br>
                <p>· Para ver todas las categorias, haz click sobre el título '<b>CATEGORÍAS</b>'</p>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection