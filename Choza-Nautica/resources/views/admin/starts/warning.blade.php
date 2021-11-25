@extends('Admin.index')
@section('template_title')
    Productos
@endsection
@section('content')
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
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  </div>

{{-- diseño para no mostrar tooblar air --}}
<style>
    .note-popover .popover-content, .panel-heading.note-toolbar {
        display:none;
    }
</style>

<div class="card">
    <div class="card-body">
        <table id="example1" class="table table-striped table-bordered" style="width:100%">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Producto</th>
                <th>Comentarios</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($producto as $key=>$rating)
            <tr>     
                <td>{{$key}}</td>
                <td>{{$rating->nombre}} 
                    <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$rating->foto}}"  width="100" alt="">
                </td>           
                <td>
                    <span><i class="fa fa-user"> {{$rating->user->name}} </i><br>{{$rating->created_at}}</span>
                    <div class="ratings">
                        <input id="input_rating_{{$rating->id}}_SPL" value="{{$rating->rating}}" class="rating-loading">
                                <script>
                                    $('#input_rating_{{$rating->id}}_SPL').rating({displayOnly: true,size:'xs', showCaption:false, theme:'krajee-fa', starCaptions:{1:'Muy malo',2:'Malo',3:'Está bien',4:'Bueno',5:'Muy Bueno'},step: 0.5,theme:'krajee-fa'});
                                </script>
                        <h4>{{$rating->comentario}}</h4>
                        <style>
                            .rating-container .rating-stars {
                                display: block;
                            }
                        </style>
                    </div>  
                </td>             
            </tr>
            @endforeach       
        </tbody>
    </table>
</div>
{!! $producto->links() !!}
</div>
@endsection