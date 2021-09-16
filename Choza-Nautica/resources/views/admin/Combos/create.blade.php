@extends('Admin.index')
@section('content')
    <div class="container">
        <form action="{{url('dashboard/combos')}}" method="POST" enctype="multipart/form-data">
            @csrf    
            @include('admin/Combos.form',['modo'=>'Crear'])
        </form>
</div>
@endsection