@extends('layouts.nav')
@section('title', 'Orden' )

@section('content')
<div class="contenedor-u">

  <div class="contenedor-comida">
    <p class="titulo">COMBOS</p>
    @foreach ($combos as $combo)
    <div class="outer">
      <a href="#id/.{{$combo->id}}">
        <div class="inner" style="background: url({{asset('storage').'/'.$combo->foto}})no-repeat center center/cover"></div>
        <div class="item">
          <div class="item-name">
            <h4>{{$combo->nombre}}</h4>
            <p>{{substr($combo->descripcion,0,80)}}......</p>
          </div>
          <div class="item-price">
              <div></div>
              <div></div>
              <div></div>
          </div>
          <div><a href="{{route('store_a_combo',$combo)}}">
            <i class="fa fa-shopping-cart"></i></a></div>
        </div>
      </a>
    </div>

    <div class="">
      {!! Form::open(['route'=>['order.store_combo',$combo],'method'=>'POST']) !!}
         <div class="quantity-cart-box d-flex align-items-center mt-20">
 
           <div class="item-name">
             <h4>{{$combo->nombre}}</h4>
             <p>{{$combo->descripcion}}</p>
             <div class="item-price">
               <div>{{$combo->precio}}</div>
           </div>
           </div>
           <div class="cantidad">
             <input type="hidden" name="id_combo" value="{{$combo->id}}">
             
             <div class="quantity">
               <input type="number" name="cantidad" min="1" step="1" value="1" max="{{$combo->cantidad}}">
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
  @include('store.productos_destacados')
  </div>
@endsection