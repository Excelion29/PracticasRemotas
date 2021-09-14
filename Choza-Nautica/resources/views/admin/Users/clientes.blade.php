@extends('Admin.index')

@section('content_header')
    <h1>Clientes</h1>
@stop

@include('admin/Users.rol',['modo'=>'yellow','rol'=>'cliente','id'=>'2'])