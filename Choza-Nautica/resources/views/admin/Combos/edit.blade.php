@extends('Admin.index')
@section('content')
<div class="container">
<form action="{{url('dashboard/combos/'.$combos->id)}}" method="POST" enctype="multipart/form-data">
    @csrf    
    {{method_field('PATCH')}}
    @include('admin/Combos.form',['modo'=>'Editar'])
</form>
</div>
@endsection