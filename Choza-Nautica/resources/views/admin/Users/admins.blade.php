@extends('Admin.index')

@section('content_header')
@stop
@include('admin/Users.rol',['modo'=>'blue','rol'=>'administrador','id'=>'1'])