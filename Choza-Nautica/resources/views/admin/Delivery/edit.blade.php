@extends('Admin.index')
@section('content')
<div class="container">
<form action="{{url('dashboard/Delivery/'.$delivery->id)}}" method="POST" enctype="multipart/form-data">
    @csrf    
    {{method_field('PATCH')}}
    @include('admin/Delivery.form',['modo'=>'Editar'])
</form>
</div>
@endsection