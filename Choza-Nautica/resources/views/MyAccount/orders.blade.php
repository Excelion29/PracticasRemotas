@extends('MyAccount.index')
@section('content_ordenes')
    <table class="table">
        <thead>
            <tr>
                <th>Orden</th>
                <th>Fecha</th>
                <th>Stado</th>
                <th>Total</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as  $id=>$orden)
            <tr>
                <td scope="row">{{$id}}</td>
                <td>{{$orden->created_at}}</td>
                <td>{{$orden->estado}}</td>
                <td>{{$orden->total()}}</td>
                <td></td>
               
        'user_id',
        'subtotal',
        'impuesto',
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection