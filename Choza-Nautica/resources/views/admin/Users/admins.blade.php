@extends('Admin.index')

@section('content_header')
    <h1>Administradores</h1>
@stop

@include('admin/Users.rol',['modo'=>'blue','rol'=>'administrador','id'=>'1'])