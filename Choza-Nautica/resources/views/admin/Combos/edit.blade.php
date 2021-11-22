@extends('Admin.index')
@section('content')
<div class="container">
    {!! Form::model($combo,['route'=>['combos_prod.update',$combo],'method'=>'PUT']) !!}
        @include('admin/Combos.form',['modo'=>'Editar'])
    {!! Form::close() !!}
</div>
@endsection