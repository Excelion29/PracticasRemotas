@extends('Admin.index')

@section('template_title')
    Pedidos
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

<h1>Lista de pedidos</h1>
<br>
<br>


<div class="card">
    <div class="card-body">
        <table id="example1"  class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Pedido</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Credo</th>    
                <th>Actualizado</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ordenes as $id=>$orden)
            <tr>
                <td>{{$id}}</td>
                <td>Pedido_{{$orden->nombre}}</td>
                <td>{{$orden->cantidad}}</td> 
                <td>S/.{{$orden->precio}}</td>
                <td>{{$orden->created_at}}</td>
                <td>{{$orden->updated_at}}</td>
                <td>
                    @if ($orden->estado == 1)
                       <span>Pedido</span>
                    @else
                        <span>Compra</span>
                   @endif
               </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>

{!! $ordenes->links() !!}

@endsection

