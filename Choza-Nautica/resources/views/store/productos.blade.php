@extends('layouts.nav')

@section('title', 'Orden' )

@section('content')
<div class="contenedor-u">
  
  <div class="contenedor-comida">
    <p class="titulo">CATEGORIAS</p>
    @foreach ($productos as $producto)
    <div class="outer">
      <a href="#">
        <div class="inner" style="background: url({{asset('storage').'/'.$producto->foto}})no-repeat center center/cover"></div>
        <div class="item">
          <div class="item-name">
            <h4>{{$producto->nombre}}</h4>
            <p>{{$producto->descripcion}}</p>
          </div>
          <div class="item-price">
              <div></div>
              <div></div>
              <div></div>
              <div></div>
          </div>
        </div>
        </a>
    </div>
    @endforeach
  </div>
</div>

@endsection
