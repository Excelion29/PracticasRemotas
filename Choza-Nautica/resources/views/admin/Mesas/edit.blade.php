@extends('Admin.index')
@section('content')
<div class="container">
    <form action="{{url('dashboard/mesas/'.$mesa->id)}}" method="POST" enctype="multipart/form-data">
        @csrf    
        {{method_field('PATCH')}}
        @include('admin/Mesas.form',['modo'=>'Editar'])
    </form>
    </div>
@endsection