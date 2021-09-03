@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{url('dashboard/categorias')}}" method="POST" enctype="multipart/form-data">
            @csrf    
            @include('admin/Categorias.form',['modo'=>'Crear'])
        </form>
</div>
@endsection