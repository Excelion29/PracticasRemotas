@extends('MyAccount.index')
@section('content_ordenes')
<fieldset>
    <legend>Perfil de usuario</legend>
    <div class="form-group">
        <small id="helpId" class="text-muted">{{old('name',$perfil->name)}}</small>
    </div>
    <div class="form-group">
    <small id="helpId" class="text-muted">{{old('apellidos',$perfil->apellidos)}}</small></div>
    <div class="form-group">
        <small id="helpId" class="text-muted">{{old('email',$perfil->email)}}</small></div>
    <div class="form-group">
        <small id="helpId" class="text-muted">{{old('dni',$perfil->cliente->dni)}}</small></div>
    <div class="form-group">
        <small id="helpId" class="text-muted">{{old('ruc',$perfil->cliente->ruc)}}</small> </div>      
    <div class="form-group">
        <small id="helpId" class="text-muted">{{old('direccion',$perfil->cliente->direccion)}}</small></div>   
    <div class="form-group">
        <small id="helpId" class="text-muted">{{old('celular',$perfil->cliente->celular)}}</small>
    </div>     
    <button type="submit" class="btn btn-primary">Cambiar datos</button>
</fieldset>
{!! Form::model($perfil, ['route'=>['update_perfil',$perfil],'method'=>'PUT']) !!}
    <fieldset>
        <legend>Configuración de perfil</legend>
        <div class="form-group">
            <small id="helpId" class="text-muted">Nombre</small>
            <input type="text" class="form-control" name="name" id="name" value="{{old('name',$perfil->name)}}" aria-describedby="helpId" placeholder="Nombre">
        </div>
        <div class="form-group">
        <small id="helpId" class="text-muted">Apellidos</small>
        <input type="text" name="apellidos" id="apellidos" class="form-control" value="{{old('apellidos',$perfil->apellidos)}}" placeholder="Apellidos" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <small id="helpId" class="text-muted">Direccion de correo electrónico</small>
            <input type="text" name="email" id="email" class="form-control" value="{{old('email',$perfil->email)}}" placeholder="Direccion de correo electrónico" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <small id="helpId" class="text-muted">DNI</small>
            <input type="text" name="dni" id="dni" class="form-control" value="{{old('dni',$perfil->cliente->dni)}}" placeholder="DNI" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <small id="helpId" class="text-muted">RUC</small>
            <input type="text" name="ruc" id="ruc" class="form-control" value="{{old('ruc',$perfil->cliente->ruc)}}" placeholder="RUC" aria-describedby="helpId">
        </div>      
        <div class="form-group">
            <small id="helpId" class="text-muted">Dirección</small>
            <input type="text" name="direccion" id="direccion" class="form-control" value="{{old('direccion',$perfil->cliente->direccion)}}" placeholder="Dirección" aria-describedby="helpId">
        </div>   
        <div class="form-group">
            <small id="helpId" class="text-muted">Celular</small>
            <input type="text" name="celular" id="celular" class="form-control" value="{{old('celular',$perfil->cliente->celular)}}" placeholder="Celular" aria-describedby="helpId">
        </div>     
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </fieldset>
{!! Form::close() !!}
<a name="" id="" class="btn btn-primary" href="{{ route('change_password') }}" role="button">Cambiar contraseña</a> 
@endsection
