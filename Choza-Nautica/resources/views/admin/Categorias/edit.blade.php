@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{url('dashboard/categorias/'.$categoria->id)}}" method="POST" enctype="multipart/form-data">
    @csrf    
    {{method_field('PATCH')}}
    @include('admin/Categorias.form',['modo'=>'Editar'])
</form>
</div>
@endsection