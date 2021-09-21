@extends('layouts.nav')

@section('title', 'Orden' )

@section('content')

<div class="header" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.8), transparent), url(https://img.bekiacocina.com/articulos/portada/85000/85623.jpg) no-repeat center center; min-height: 60vh; background-attachment: fixed; ">
      <div class="center">
        <h1 class="alex-brush"></h1>
        <h2>Las mejores </h2>
        <span id="asterisk">*</span>
        <p>Categorias para ti</p>
      </div>
    </div> 

<div class="row">
<p class="titulo">Categoria</p>
@foreach ($productos as $producto)

  <div class="col l4 m8 s12 offset-m2">
    <div class="product-card">
        <div class="card ">
            <div class="card-image">
                <a href="#" class="btn-floating btn-large price waves-effect waves-light " style="background-color: #e04b4b">S/.{{$producto->precio}}</a>
                <img src="{{asset('storage').'/'.$producto->foto}}" alt="product-img" style="height: 400px;">
                <span class="card-title"><span>{{$producto->nombre}}</span></span>
            </div>
            <ul class="card-action-buttons">
                <li><a id="buy" class="btn-floating waves-effect waves-light blue"><i class="material-icons buy">add_shopping_cart</i></a>
                </li>
            </ul>
            <div class="card-content">
                <div class="row">
                    <div class="col s12">
                        <p>
                            <strong>Descripcion:</strong> <br />
                            {{substr($producto->descripcion,0,80)}}......
                        </p>
                    </div>
                    
                </div>
                <div class="row">
                        <div style="width: 95%; margin: auto;">
                            <div class="chip"><a href="#">{{$producto->categoria}}</a></div>
                            <div class="chip"><a href="#">Mas detalles</a></div>
                        </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  @endforeach
</div>

@endsection
