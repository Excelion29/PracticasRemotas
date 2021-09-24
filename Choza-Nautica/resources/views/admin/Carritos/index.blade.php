@extends('Admin.index')

@section('template_title')
    Carritos
@endsection

@section('content')

<div class="alert alert-succes alert-dismissible" role="alert">
    @if(Session::get('mensaje')){{
        Session::get('mensaje')
    }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    @endif
</div>

<h1>Gestión de Carritos</h1>
<br>
<br>


<div class="card">
    <div class="card-body">
        <table id="example1"  class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Carrito</th>
                <th>Propietario</th>
                <th>Creado</th>
                <th>Actualizado</th>                
                <th>Estado</th>
                <th>Pedidos</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carritos as $id=>$carrito)
            <tr>
                <td>{{$id}}</td>
                <td>Carrito_{{$carrito->id}}</td>
                <td>{{$carrito->name}}</td> 
                <td>{{$carrito->created_at}}</td>
                <td>{{$carrito->updated_at}}</td>
                <td>
                    @if ($carrito->estado == 1)
                       <a class="btn btn-success" href="{{route('change.status.carritos',$carrito)}}">Activa</a>
                       @else
                       <a class="btn btn-danger" href="{{route('change.status.carritos',$carrito)}}">Inactiva</a>
                   @endif
               </td>
               <td>
                   <a href="{{route('carritos.pedidos.productos',$carrito->id)}}">Ver Productos</a>
                   <a href="{{route('carritos.pedidos.combos',$carrito->id)}}">Ver Combos</a>
               </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>

{!! $carritos->links() !!}

@endsection

