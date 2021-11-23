@extends('layouts.nav')
@section('title', 'Orden' )

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.css">
<link rel="stylesheet" href="{{asset('bootstrap_star_rating/css/star-rating.css')}}">
<link rel="stylesheet" href="{{asset('bootstrap_star_rating/themes/krajee-fa/theme.css')}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{asset('bootstrap_star_rating/js/star-rating.js')}}"></script>
<script src="{{asset('bootstrap_star_rating/themes/krajee-fa/theme.js')}}"></script>
<div class="header" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.8), transparent), url(https://img.bekiacocina.com/articulos/portada/85000/85623.jpg) no-repeat center center; min-height: 60vh; background-attachment: fixed; ">
      <div class="center">
        <h1 class="alex-brush"></h1>
        <h2>Los mejores </h2>
        <span id="asterisk">*</span>
        <p>Productos para ti</p>
      </div>
    </div> 

    
    <div class="wrap">
      <form action="{{route('search_products')}}" id="form_search_products" method="GET" >
      <input type="text" name="search_products" id="search_product" placeholder="Buscar Platos" class="search-text">
      <input type="submit" class="search-imput">
      </form>
    </div>
    <p class="titulo">PLATOS</p>
    </div>
    <style>
        .row{
            margin-left: 0px;
        }
        .product-card .card .price {
            font-size: 1.45rem;
        }
        .navbar{
            position: fixed;
        }
        .rating-md .caption {
            font-size: 32%;
        }
        </style>
@include('store.categorias_list')
@include('store.productos_destacados')
<div class="row">
    @foreach ($productos as $key=>$producto)
        <div class="col l4 m8 s12 offset-m2">
            <div class="product-card">
                <div class="card ">
                    <div class="card-image">                        
                        @if($producto->has_promociones())
                        <a class="btn-floating btn-large price waves-effect waves-light " style="background-color: #e04b4b">{{$producto->getTotalDiscountAttribute()}}%</a>
                        @else
                        @endisset
                        <img src="{{asset('storage').'/'.$producto->foto2}}" alt="product-img" style="height: 360px;">
                        <span class="card-title"><span><p>{{$producto->nombre}}</p></span></span>
                    </div>
                    <ul class="card-action-buttons">
                        <li><a id="buy" href="{{route('store_a_product',$producto)}}" class="btn-floating waves-effect waves-light blue"><i class="material-icons buy">add_shopping_cart</i></a>

                        </li>
                    </ul>
                    <div class="card-content">
                        <div class="row">
                            <div class="col s12">
                                @if($producto->has_promociones())
                                <h4><span>S/.{{$producto->getDiscountAttribute()}}</span>  <span style="text-decoration: line-through;">S/.{{$producto->precio}}</span></h4>
                                @else
                                <h4><span>S/.{{$producto->precio}}</span></h4>
                                @endisset
                                <p>
                                    <strong>Descripcion:</strong> <br />
                                    {{substr($producto->descripcion,0,80)}}...
                                </p>
                            </div>                        
                        </div>
                        <div class="row">
                            <div style="width: 95%; margin: auto;">
                                <div class="chip"><a href="{{url('/products/'.$producto->categorias->id)}}">{{$producto->categoria}}</a></div>
                                <div class="chip cta"><a href="#">Mas detalles</a></div> 
                                @isset(auth()->user()->id_rol)
                                    <div class="chip cta"><a href="{{url('/products_calificar/'.$producto->id)}}">Calificaciones</a></div>
                                @endisset                 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-container">
            <div class="modals1 modal-close">
                <p class="close">X</p>
                <div class="modal-img">
                
                    <div class="CSSgal">
                        <!-- Don't wrap targets in parent -->
                        <s id="s1"></s> 
                        <s id="s2"></s>
                        <s id="s3"></s>
                    
        
                        <div class="slider">
                            <div style="background: url({{asset('storage').'/'.$producto->foto}})no-repeat center center/cover" >
                            </div>
                            <div style="background: url({{asset('storage').'/'.$producto->foto2}})no-repeat center center/cover" >
                                <h2>Foto 2</h2>
                            </div>
                            <div style="background: url({{asset('storage').'/'.$producto->foto3}})no-repeat center center/cover" >
                                <h2>Foto 3</h2>
                            </div>
                    
                        </div>
        
                        <div class="prevNext">
                            <div><a href="#s3"></a><a href="#s2"></a></div>
                            <div><a href="#s1"></a><a href="#s3"></a></div>
                            <div><a href="#s2"></a><a href="#s4"></a></div>
                            <div><a href="#s3"></a><a href="#s1"></a></div>
                        </div>
        
                        <div class="bullets">
                            <a href="#s1"></a>
                            <a href="#s2"></a>
                            <a href="#s3"></a>
                        </div>
        
                    </div>
                
                </div>
                <div class="modal-text">
                    <div class="modal-text-container">
                        <div class="Titulo">
                            <h2>{{$producto->nombre}} 
                            </h2>
                            @include('store.ratings',['producto'=>$producto])
                        </div>1
                        <div class="Precio">     
                            @if($producto->has_promociones())                           
                                <h4><span>S/.{{$producto->getDiscountAttribute()}}</span> <span style="text-decoration: line-through;">S/.{{$producto->precio}}</span></h4>   
                            @else 
                                <h4><span>S/.{{$producto->precio}}</span></h4> 
                            @endif
                        </div>
                        <div class="descripcion">
                            <p>{{($producto->descripcion)}}</p>
                        </div>                              
                        <div style="margin-top: -90px;" class="cantidad">
                            {!! Form::open(['route'=>['order.store',$producto],'method'=>'POST']) !!}
                                <input type="hidden" name="id_producto" value="{{$producto->id}}">    
                                <div class="quantity">
                                    <input type="number" name="cantidad" min="1" step="1" value="1" max="{{$producto->cantidad}}">
                                </div>       
                                <button class="ag-carrito"> <span>Agregar al carrito </span></button>
                            {!! Form::close() !!}  
                            <button class="ca-ahora"> <span> Comprar ahora </span></button>
                        </div> 
                    </div>
                </div>
            </div>             
        </div>
    @endforeach    
</div>
<style>
.pagination > li > a
{
    background-color: white;
    color: purple;
}

.pagination > li > a:focus,
.pagination > li > a:hover,
.pagination > li > span:focus,
.pagination > li > span:hover
{
    color: purple;
    background-color: #eee;
    border-color: #ddd;
}

.pagination > .active > a
{
    color: white;
    background-color: purple;
    border: solid 1px purple;
}

.pagination > .active > a:hover
{
    background-color: purple;
    border: solid 1px purple;
}
</style>
<script src="{{asset('js/modal.js')}}"></script>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="{{asset('js/typeahead.bundle.min.js')}}"></script>
<script>
    var productos = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        prefetch:"{{route('productos.json')}}"
    });
    $('#search_product').typeahead({
        hint: true,
          highlight: true,
          minLength: 1
        },
        {
            name:'productos',
            source:productos
        }).on('typehead:selected',function(event,selection){
            $('#form_search_products').submit();
        });
</script>
{!! $productos->links() !!}
@endsection