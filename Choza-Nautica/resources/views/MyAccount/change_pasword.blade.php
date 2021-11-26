@extends('MyAccount.perfil')
@section('change_password')

{!! Form::model($perfil, ['route'=>['update_password',$perfil],'method'=>'PUT']) !!}
<div class="changep-p">
    <fieldset class="changep-p-cont">
        <legend>Cambio de contraseña</legend>
        <div class="form-group">
        <small id="helpId" class="text-muted">Contraseña actual</small>
        <input type="password" name="old_password" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <small id="helpId" class="text-muted">Nueva Contraseña</small>
            <input type="password" name="password" id="" class="form-control" required autocomplete="new-password" placeholder="Nueva Contraseña" aria-describedby="helpId">
            
        </div>
        <div class="form-group">
            <small id="helpId" class="text-muted">Confirmar Contraseña</small>
            <input type="password" name="password_confirmation" id="" class="form-control" placeholder="Confirmar Contraseña" aria-describedby="helpId">
            
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </fieldset>
    
</div>
{!! Form::close() !!}

@endsection