@extends('Admin.index')
@section('content')
<div class="container">
    {!! Form::model($promocione,['route'=>['promociones.update',$promocione],'method'=>'PUT']) !!}
    @include('admin/promociones.form',['modo'=>'Editar'])
    {!! Form::close() !!}
</div>
@endsection