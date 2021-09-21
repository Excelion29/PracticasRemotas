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

<div class="contenedor-u">
  
  <div class="contenedor-comida">
    <p class="titulo">CATEGORIAS</p>
    @foreach ($categorias as $categoria)
    <div class="outer">
      <a href="{{url('/products/'.$categoria->id)}}">
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
        </a>
    </div>
    @endforeach
  </div>
</div>

@endsection
