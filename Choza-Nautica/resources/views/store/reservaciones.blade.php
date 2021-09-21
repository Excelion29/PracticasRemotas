@extends('layouts.nav')

@section('title', 'Orden' )

@section('content')
<div class="contenedor-u">
  
  <div class="contenedor-comida">
    <p class="titulo">Reservaciones</p>
    @foreach ($mesas as $mesa)
    <div class="outer">
      <a href="#id/.{{$mesa->id}}">
        <div class="inner" style="background: url({{asset('storage').'/'.$mesa->foto}})no-repeat center center/cover"></div>
        <div class="item">
          <div class="item-name">
            <h4>{{$mesa->nombre}}</h4>
            <p>{{$mesa->capacidad}}</p>
            <p>{{$mesa->precio}}</p>
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
