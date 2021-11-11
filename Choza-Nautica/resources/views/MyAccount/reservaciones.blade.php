@extends('MyAccount.index')
@section('content_reservaciones')
    <table class="table">
        <thead>
            <tr>
                <th>Reservación</th>
                <th>Fecha</th>
                <th>Estado del pago</th>
                <th>Total</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
             {{-- @forelse($reservaciones as  $id=>$reservacion)
            <tr>
                <td scope="row">{{$id}}</td>
                <td>{{$orden->created_at}}</td>
                <td>{{$orden->estado}}</td>
                <td>{{$orden->total()}}</td>
                <td><a name="" id="" class="btn btn-primary" href="#" role="button">Ver</a></td>
            </tr>
            @empty
                <tr>
                    <td colspan="5">No existente</td>
                </tr>
            @endforelse --}}
        </tbody>
    </table>
    <style>
        .map_area_wrapper{
            display: none;
            }
        </style>
@endsection