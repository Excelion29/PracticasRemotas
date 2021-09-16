@extends('Admin.index')
@extends('layouts.js')
@section('content')
    <div class="container">
        <form action="{{url('dashboard/productos')}}" method="POST" enctype="multipart/form-data">
            @csrf    
            @include('admin/Productos.form',['modo'=>'Crear'])
        </form>
</div>
@endsection