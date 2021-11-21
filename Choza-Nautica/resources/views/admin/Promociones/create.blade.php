@extends('Admin.index')
@section('content')
    <div class="container">
        <form action="{{url('dashboard/promociones')}}" method="POST" enctype="multipart/form-data">
            @csrf    
            @include('admin/Promociones.form',['modo'=>'Crear'])
        </form>
</div>
@endsection