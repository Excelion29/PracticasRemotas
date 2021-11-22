@extends('MyAccount.index')
@section('content_ordenes')
<link rel="stylesheet" href="{{asset('css/user.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="container">
  <div class="row -spacing-a">
    <div class="col-md-12">
      <h1>Mi Perfil</h1>
    </div>
  </div>
  <div class="row -spacing-a">
    <div class="col-md-4">
      <div class="profile-image">
        <img src="https://www.hola.com/imagenes/estar-bien/20190426140762/perro-huevo-pompom-gt/0-669-982/portada-pompom-t.jpg?filter=w600" class="fullwidth"/>
        <div class="edit-profile-image">
        <span class="edit-profile-image__information">
          <span class="fa fa-camera"></span>
          <span class="edit-profile-image__label">
          Cambiar Foto
          </span>
        </span>
      </div>
      </div>
      
    </div>
    <div class="col-md-8">
      <h5>Información</h5>
      <div class="row -spacing-b">
        <div class="col-md-3">
          <p class="-typo-copy">Nombre de Usuario</p>
          <p class="-typo-copy">Nombres</p>
          <p class="-typo-copy">Apellidos</p>
          <p class="-typo-copy">Correo</p>
        </div>
        <div class="col-md-3">
          <p class="-typo-copy -typo-copy--blue">YSmith</p>
          <p class="-typo-copy -typo-copy--blue">{{old('name',$perfil->name)}}</p>
          <p class="-typo-copy -typo-copy--blue">{{old('apellidos',$perfil->apellidos)}}</p>
          <p class="-typo-copy -typo-copy--blue">-</p>
          <p class="-typo-copy -typo-copy--blue">{{old('email',$perfil->email)}}</p>
        </div>
        <div class="col-md-3">
          <p class="-typo-copy">Dirección</p>
          <p class="-typo-copy">Número</p>
          <p class="-typo-copy">DNI</p>
          <p class="-typo-copy">RUC</p>
          <p class="-typo-copy">Passwort</p>

          
          <button class="btn btn--green">
            <span class="btn__icon fa fa-pencil"></span>
            
            <span class="btn__label"> <a href="{{ route('change_profile') }}">EDITAR PERFIL</a> </span>
          </button>
          <br>
          <br>
          <button class="btn btn--green">
            <span class="btn__icon fa fa-pencil"></span>
            <span class="btn__label"> <a href="{{ route('change_password') }}">Cambiar contraseña</a> </span>

          </button>
          
        </div>
        <div class="col-md-3">
        <p class="-typo-copy -typo-copy--blue">{{old('direccion',$perfil->cliente->direccion)}}</p>
          <p class="-typo-copy -typo-copy--blue">{{old('celular',$perfil->cliente->celular)}}</p>
          <p class="-typo-copy -typo-copy--blue">{{old('dni',$perfil->cliente->dni)}}</p>
          <p class="-typo-copy -typo-copy--blue">{{old('ruc',$perfil->cliente->ruc)}}</p>
          <p class="-typo-copy -typo-copy--blue">******</p>
        </div>
      </div>
    </div>  
  </div>
</div>

@endsection


