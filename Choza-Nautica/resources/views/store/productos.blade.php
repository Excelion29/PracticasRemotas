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
            <p>{{substr($producto->descripcion,0,80)}}......</p>
          </div>
          <div class="item-price">
              <div></div>
              <div></div>
              <div></div>
          </div>
          <div><a href="{{route('store_a_product',$producto)}}">
            <i class="fa fa-shopping-cart"></i></a></div>
        </div>
      </a>
    </div>

    <div class="modal">
     {!! Form::open(['route'=>['order.store',$producto],'method'=>'POST']) !!}
        <div class="quantity-cart-box d-flex align-items-center mt-20">

          <div class="item-name">
            <h4>{{$producto->nombre}}</h4>
            <p>{{$producto->descripcion}}</p>
            <div class="item-price">
              <div>{{$producto->precio}}</div>
          </div>
          </div>
          <div class="cantidad">
            <input type="hidden" name="id_producto" value="{{$producto->id}}">
            
            <div class="quantity">
              <input type="number" name="cantidad" min="1" step="1" value="1" max="{{$producto->cantidad}}">
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