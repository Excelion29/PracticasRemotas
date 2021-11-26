@extends('layouts.nav')

@section('title', 'Orden' )

@section('estilos')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.css">
<link rel="stylesheet" href="{{asset('bootstrap_star_rating/css/star-rating.css')}}">
<link rel="stylesheet" href="{{asset('bootstrap_star_rating/themes/krajee-fa/theme.css')}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{asset('bootstrap_star_rating/js/star-rating.js')}}"></script>
<script src="{{asset('bootstrap_star_rating/themes/krajee-fa/theme.js')}}"></script>
@endsection
@section('content')



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
<div class="header" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.8), transparent), url(https://img.bekiacocina.com/articulos/portada/85000/85623.jpg) no-repeat center center; min-height: 60vh; background-attachment: fixed; ">
      <div class="center">
        <h1 class="alex-brush"></h1>
        <h2>Las mejores </h2>
        <span id="asterisk">*</span>
        <p>Categorias para ti</p>
      </div>
    </div>  
    
    
    <div class="wrap">
      <form action="{{route('search_categorias')}}" id="form_search_category" method="GET" >
        <input type="text" name="search_category" id="search_category" placeholder="Buscar Categorias" class="search-text">
        <input type="submit" class="search-imput">
      </form>
    </div>
    
@include('store.productos_destacados')
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
    {!! $categorias->links() !!}
  </div>
</div>
@endsection
@section('scripts')    
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="{{asset('js/typeahead.bundle.min.js')}}"></script>
  <script>
      var categorias = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        prefetch:"{{route('categorias.json')}}"
      });
      $('#search_category').typeahead({
        hint: true,
        highlight: true,
        minLength: 1
      },
      {
        name:'categorias',
        source:categorias
      }).on('typehead:selected',function(event,selection){
            $('#form_search_category').submit();
      });
  </script>
@endsection