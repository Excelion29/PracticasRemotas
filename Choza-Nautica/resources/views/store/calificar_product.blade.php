
@extends('layouts.nav')
@section('title', 'Orden' )

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.css">
<link rel="stylesheet" href="{{asset('bootstrap_star_rating/css/star-rating.css')}}">
<link rel="stylesheet" href="{{asset('bootstrap_star_rating/themes/krajee-fa/theme.css')}}">
<link rel="stylesheet" href="{{asset('bootstrap_star_rating/themes/krajee-svg/theme.css')}}">
<link rel="stylesheet" href="{{asset('bootstrap_star_rating/themes/krajee-uni/theme.css')}}"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{asset('bootstrap_star_rating/js/star-rating.js')}}"></script>
<script src="{{asset('bootstrap_star_rating/themes/krajee-fa/theme.js')}}"></script>
<script src="{{asset('bootstrap_star_rating/themes/krajee-svg/theme.js')}}"></script>
<script src="{{asset('bootstrap_star_rating/themes/krajee-gly/theme.js')}}"></script>
<script src="{{asset('bootstrap_star_rating/themes/krajee-uni/theme.js')}}"></script>

<div class="header" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.8), transparent), url(https://img.bekiacocina.com/articulos/portada/85000/85623.jpg) no-repeat center center; min-height: 60vh; background-attachment: fixed; ">
    <div class="center">
      <h1 class="alex-brush"></h1>
      <h2>Las mejores </h2>
      <span id="asterisk">*</span>
      <p>Productos para ti</p>
    </div>
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
</style>

@include('store.categorias_list')
@include('store.productos_destacados')
<div class="row">

    <div class="col l4 m8 s12 offset-m2">
        <div class="product-card">
            <div class="card ">
                <div class="card-image">
                    @if($productos->has_promociones())
                    <a class="btn-floating btn-large price waves-effect waves-light " style="background-color: #e04b4b">{{$productos->getTotalDiscountAttribute()}}%</a>
                    @else 
                    @endif
                    <img src="{{asset('storage').'/'.$productos->foto2}}" alt="product-img" style="height: 400px;">
                    <span class="card-title"><span>{{$productos->nombre}}</span>
                    <div class="ratings">
                        <input id="input_rate_{{$productos->id}}_EMPL" value="{{round($productos->averageRating,1)}}" class="rating-loading">
                        <span>{{$productos->timesRated()}}</span> <span>({{round($productos->averageRating,1)}}%)</span>
                        <script>
                            $('#input_rate_{{$productos->id}}_EMPL').rating({displayOnly: true,size:'xs', showCaption:false, theme:'krajee-fa', starCaptions:{1:'Muy malo',2:'Malo',3:'Está bien',4:'Bueno',5:'Muy Bueno'},step: 0.5,theme:'krajee-fa'});
                        </script>
                    </div>
                    
                </div>
                <ul class="card-action-buttons">
                    <li><a id="buy" href="{{route('store_a_product',$productos)}}" class="btn-floating waves-effect waves-light blue"><i class="material-icons buy">add_shopping_cart</i></a>
                
                    </li>
                </ul>
                <div class="card-content">
                    <div class="row">
                        <div class="col s12">                            
                            <p>
                                @if($productos->has_promociones())
                                <h4><span>S/.{{$productos->getDiscountAttribute()}}</span>  <span style="text-decoration: line-through;">S/.{{$productos->precio}}</span></h4>
                                @else
                                <h4><span>S/.{{$productos->precio}}</span></h4>
                                @endisset
                                <strong>Descripcion:</strong> <br />
                                {{substr($productos->descripcion,0,80)}}...
                            </p>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div style="width: 95%; margin: auto;">
                            <div class="chip"><a href="{{url('/products/'.$productos->categorias->id)}}">{{$productos->categoria}}</a></div>
                                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <fieldset>
        <legend>Comentarios sobre el plato</legend>
        <div class="form-group">
            @isset(auth()->user()->id_rol)
                <span><a type="submit" href="">Calificar</a></span>
            @endisset
        </div>
            @foreach ($productos->ratings as $key=>$rating)
                <div class="review-box">                
                    <span><i class="fa fa-user"> {{$rating->user->name}} </i><br>{{$rating->created_at}}</span>
                    <div class="ratings">
                        <input id="input_rate_{{$key}}" value="{{$rating->rating}}" class="rating rating-loading">
                        <script>
                                $('#input_rate_{{$key}}').rating({showCaption:false, theme:'krajee-fa',displayOnly: true, starCaptions:{1:'Muy malo',2:'Malo',3:'Está bien',4:'Bueno',5:'Muy Bueno'},step: 0.5,theme:'krajee-fa'});
                        </script>
                        <h4>{{$rating->comentario}}</h4>
                    </div>
                </div>                
            @endforeach
    </fieldset>
</div>

@include('store.modal_califica')


@endsection