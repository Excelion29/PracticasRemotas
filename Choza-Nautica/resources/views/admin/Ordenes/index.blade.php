@extends('Admin.index')

@section('template_title')
    Ordenes
@endsection

@section('content')

<link rel="stylesheet" href="{{asset('css/jqueryui-editable.css')}}">
<h1>Gestión de Ordenes</h1>
<br>
<br>
<div class="card">
    <div class="card-body">
        <table id="example1"  class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th>Orden</th>
                    <th>Fecha</th>
                    <th>Estado del envio</th>
                    <th>Estado de la compra</th>
                    <th>Total</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($compras as $key=>$compra)
                <tr>
                    <td scope="row">{{$compra->id}}</td>
                    <td>{{$compra->created_at}}</td>
                    <td>{{csrf_field()}} {{$compra->compra}} 
                        <a href="#" 
                        id="username"
                        class="editable"
                        data-type="select" 
                        data-pk="{{$compra->id}}" 
                        data-url="{{url("compra_update/$compra->id")}}" 
                        data-title="Estado"
                        data-value="{{$compra->estado}}">{{$compra->estado}}</a></td>
                    <td>{{$compra->estado_pago}}</td>
                    <td>S/.{{number_format($compra->total(),2)}}</td>
                    <td><a href="{{route('detalles_orders.show',$compra->id)}}"><i class="far fa-eye"></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>    
</div>
</div>
{!! $compras->links() !!}
@endsection

