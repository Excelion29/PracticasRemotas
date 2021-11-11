@extends('MyAccount.index')
@section('content_ordenes')
    <table class="table">
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
    <style>
        .map_area_wrapper{
            display: none;
            }
        </style>

@endsection