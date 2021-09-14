@extends('layouts.app')
@extends('layouts.js')
@section('content')
    <div class="container">
        <form action="{{url('dashboard/productos/'.$producto->id)}}" method="POST"  enctype="multipart/form-data">
            @csrf    
            {{method_field('PATCH')}}
            @include('admin/Productos.form',['modo'=>'Editar'])
        </form>
</div>
@endsection