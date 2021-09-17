@extends('Admin.index')
@section('content')
<div class="container">
    <form action="{{url('dashboard/mesas')}}" method="POST" enctype="multipart/form-data">
        @csrf    
        @include('admin/Mesas.form',['modo'=>'Crear'])
    </form>
</div>
@endsection