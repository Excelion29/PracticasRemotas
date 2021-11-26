@extends('layouts.nav')
@section('title', 'Ordenes' )

@section('content')
<div class="header" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.8), transparent), url(https://img.bekiacocina.com/articulos/portada/85000/85623.jpg) no-repeat center center; min-height: 60vh; background-attachment: fixed; ">
    <div class="center">
      <h1 class="alex-brush"></h1>
      <h2>Los mejores </h2>
      <span id="asterisk">*</span>
      <p>Productos para ti</p>
    </div>
</div> 

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <div class="card-ordenes">
    <div class="card-ordenes-body">
        <table id="example1"  class="table table-striped" style="width:100%">
            <thead>
            <tr>
                <th>Orden</th>
                <th>Fecha</th>
                <th>Estado del envio</th>
                <th>Total</th>
                <th>Acción</th>
            </tr>
            </thead>
            <tbody>
                @forelse($orders as  $id=>$orden)
                <tr>
                    <td scope="row">{{$id}}</td>
                    <td>{{$orden->created_at}}</td>
                    <td>{{$orden->estado}}</td>
                    <td>{{$orden->total()}}</td>
                    <td><a name="" id="" class="btn btn-primary" href="{{route('Mis_detalles_orders.show',$orden->id)}}" role="button">Ver</a></td>
                </tr>
                @empty
                    <tr>
                        <td colspan="5">No existente</td>
                    </tr>
                @endforelse
            </tbody>
        </table>    
    </div>
  </div>

    <style>
        .map_area_wrapper{
            display: none;
            }
        </style>
@endsection