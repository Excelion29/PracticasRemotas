@extends('Admin.index')


@section('content_header')
    <h1>Empleados</h1>
@stop

@include('admin/Users.rol',['modo'=>'green','rol'=>'empleado','id'=>'3'])