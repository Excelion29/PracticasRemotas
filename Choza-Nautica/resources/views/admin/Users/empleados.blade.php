@extends('Admin.index')


@section('content_header')
@stop

@include('admin/Users.rol',['modo'=>'green','rol'=>'empleado','id'=>'3'])