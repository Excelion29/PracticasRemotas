@extends('Admin.index')
@section('content')
    <div class="container">
        <form action="{{url('dashboard/Delivery')}}" method="POST" enctype="multipart/form-data">
            @csrf    
            @include('admin/Delivery.form',['modo'=>'Crear'])
        </form>
</div>
@endsection