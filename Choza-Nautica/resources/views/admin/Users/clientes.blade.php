@extends('Admin.index')

@section('content_header')
@stop

@include('admin/Users.rol',['modo'=>'yellow','rol'=>'cliente','id'=>'2'])