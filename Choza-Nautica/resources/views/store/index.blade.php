@extends('layouts.nav')
@section('title', 'Orden' )

@section('content')
<div class="contenedor-u">
  
  <div class="contenedor-comida">
    <p class="titulo">CATEGORIAS</p>
    @foreach ($categorias as $categoria)
    <div class="outer">
        <div class="inner" style="background: url({{asset('storage').'/'.$categoria->foto}})no-repeat center center/cover"></div>
        <div class="item">
          <div class="item-name">
            <h4>{{$categoria->nombre}}</h4>
            <p>{{$categoria->descripcion}}</p>
          </div>
          <div class="item-price">
              <div></div>
              <div></div>
              <div></div>
              <div></div>
          </div>
        </div>
    </div>
    @endforeach
  </div>
</div>
@endsection
