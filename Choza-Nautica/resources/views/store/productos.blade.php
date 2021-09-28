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