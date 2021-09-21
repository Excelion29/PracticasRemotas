@extends('layouts.nav')
@section('title', 'Orden' )

@section('content')
<div class="contenedor-u">
  
  <div class="contenedor-comida">
    <p class="titulo">CATEGORIAS</p>
    @foreach ($productos as $producto)
    <div class="outer">
      <a href="#id/.{{$producto->id}}">
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
    <div class="modal">
     {!! Form::open(['route'=>'order.store','method'=>'POST']) !!}
        <div class="quantity-cart-box d-flex align-items-center mt-20">
 
          <div class="cantidad">
            <input type="hidden" name="id_producto" value="{{$producto->id}}">
            <div class="pro-cant"><input type="text" name="cantidad" value="1">
            </div>
          </div>

          <div class="action_link">
            <button class="buy_btn" type="submit">add to cart<i class="fa fa-shopping-cart"></i></button>
          </div>
        </div>
     {!! Form::close() !!}
    </div>
    @endforeach
  </div>
</div>

@endsection
