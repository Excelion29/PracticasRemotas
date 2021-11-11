@extends('MyAccount.perfil')
@section('change_password')

{!! Form::model($perfil, ['route'=>['update_password',$perfil],'method'=>'PUT']) !!}
    <fieldset>
        <legend>Cambio de contraseña</legend>
        <div class="form-group">
        <small id="helpId" class="text-muted">Contraseña actual</small>
        <input type="password" name="old_password" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <small id="helpId" class="text-muted">Nueva Contraseña</small>
            <input type="password" name="password" id="" class="form-control" placeholder="Nueva Contraseña" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <small id="helpId" class="text-muted">Confirmar Contraseña</small>
            <input type="password" name="password_confirmation" id="" class="form-control" placeholder="Confirmar Contraseña" aria-describedby="helpId">
        </div>
    </fieldset>
    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
{!! Form::close() !!}
<style>
    .map_area_wrapper{
        display: none;
        }
    </style>
@endsection