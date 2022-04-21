<?php
  namespace App\Http\Controllers;
?>
@extends('layouts.app')

@section('content')
    @if(@isset($hijos))
        <div class="contenedor_hijos">
            @if ($padre != '')
                <a href="{{route('categoria',$padre)}}"><p class="titulo_categoria" style="color: rgb(129, 129, 129);display:block;margin-left:10px;"><small>volver a</small><br><span style="color: #5baa9a">{{$padre}}</span></p></a>
            @endif
            @foreach ($hijos as $hijo)
            <div class="mostrar_hijo mostrar_hijo_unico">
                <a href="{{route('categoria',$hijo->categoria)}}">
                    <div class="mostrar_hijo">
                        <p class="titulo_categoria">{{$hijo->categoria}}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    @else 
        @if (isset($cat2))
        <div class="contenedor_hijos">
            @if ($padre != '')
                <a href="{{route('categoria',$padre)}}"><p class="titulo_categoria" style="color: rgb(129, 129, 129);display:block;margin-left:10px;"><small>volver a</small><br><span style="color: #5baa9a">{{$padre}}</span></p></a>
            @endif
            <div class="mostrar_hijo mostrar_hijo_unico">
                <p class="titulo_categoria">{{$cat2->categoria}}</p>
            </div>
        </div>
        @endif
    @endif
      <div class="generalProductos">
          <div class="asideFiltros">
                @isset($cat)
                  <span class="actSeEn">CATEGORÍA ACTUAL</span><br>
                    <p class="infoCategoriaActual">{{$cat[0]->categoria}}</p>
                @endisset
                @isset($cat2)
                  <span class="actSeEn">CATEGORÍA ACTUAL</span><br>
                    <p class="infoCategoriaActual">{{$cat2->categoria}}</p>
                @endisset
                @if (!isset($cat) && !isset($cat2))
                  <span class="actSeEn">BÚSQUEDA</span><br>
                  <p class="infoCategoriaActual">{{$busqueda}}</p>
                @endif
                <div id="accordion">
                    <div class="card">
                      <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                          <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Marca
                          </button>
                        </h5>
                      </div>
                  
                      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <p>Reebok <input type="checkbox" value="marca" style="margin-left:20px;"></p>
                            <p>Adidas <input type="checkbox" value="marca" style="margin-left:20px;"></p>
                            <p>Tarmak <input type="checkbox" value="marca" style="margin-left:20px;"></p>
                            <p>Babolat <input type="checkbox" value="marca" style="margin-left:20px;"></p>
                            <p>Wilson <input type="checkbox" value="marca" style="margin-left:20px;"></p>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Color
                          </button>
                        </h5>
                      </div>
                      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            @foreach (home_controller::devolverColores() as $color)
                            <p id="{{$color->color}}">{{$color->color}}<input type="checkbox" value="{{$color->id}}" style="margin-left:20px;"></p>
                            @endforeach
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Sexo
                          </button>
                        </h5>
                      </div>
                      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            <p>Hombre <input type="checkbox" value="sexo" style="margin-left:20px;"></p>
                            <p>Mujer <input type="checkbox" value="sexo" style="margin-left:20px;"></p>
                            <p>Unisex<input type="checkbox" value="sexo" style="margin-left:20px;"></p>
                        </div>
                      </div>
                    </div>
                  </div>
          </div>
          <div class="productosFiltrados">
            
              <div class="filaProductos">
                    @isset($stocks)
                        @for ($i = 1; $i <= count($stocks); $i++)
                        <?php $producto = home_controller::devolverProducto($stocks[$i-1]->id_producto)?>
                            <div class="cuadroProducto">
                                <span style="display: none" id="color">{{$stocks[$i-1]->id_color}}</span>
                                <p style="height: 30px">
                                    <span class="marcaProductoCuadro">{{$producto->marca}}</span>
                                    <span class="precioProductoCuadro">{{$stocks[$i-1]->precio}}€</span>
                                </p>
                                <a href="{{route('producto',$stocks[$i-1])}}"><img src="fotos/{{$stocks[$i-1]->id}}/{{$stocks[$i-1]->foto1}}" alt="foto1"></a><br>
                                <a href="{{route('producto',$stocks[$i-1])}}"><span style="margin-bottom: 0" class="tituloProductoCuadro">{{$producto->nombre}}</span></a>
                            </div>
                            @if ($i%5==0 && $i<count($stocks))
                                </div>
                                <div class="filaProductos">
                            @endif
                        @endfor
                    @endisset
                </div>
               <div class="paginacion">
                  {{$stocks->links() }}
                </div>
            </div>
        </div>
    
@endsection