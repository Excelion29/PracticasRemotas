@extends('layouts.app')

@section('content')
<div id="back">
  <div class="backRight"></div>
  <div class="backLeft"></div>
</div>

<div id="slideBox">
  <div class="topLayer">
    <div class="left">
      <div class="content" style="top:150px;">
        <h2>Registrate</h2>
        <form method="post" class="formreglog" action="{{ route('register') }}" >
            @csrf
            <div class="form-group">
              <input id="name" type="text" placeholder="Nombres" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus />
              @error('name')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
              <input id="apellidos" type="text" placeholder="Apellidos" name="apellidos" value="{{ old('apellidos') }}" required autocomplete="apellidos" autofocus/>
              @error('apellidos')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
              <input id="email" type="text" placeholder="Correo" name="email" value="{{ old('email') }}" required autocomplete="email"/>
              @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
              <input id="password" type="password" placeholder="Contraseña" name="password" required autocomplete="new-password"/>
              @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              <input id="password-confirm" type="password" placeholder="Confirma contraseña" name="password_confirmation" required autocomplete="new-password"/>                  
          </div>
          <button  type="submit">Registro</button>
        </form>
        <button id="goLeft"  class="off">Ya tengo una cuenta.</button>
      </div>
    </div>

    <div class="right">
      <div class="content">
        <h2>Ingresar</h2>
        <form method="post" class="formreglog" action="{{ route('login') }}">
          @csrf
          <div class="form-group">
            <input input id="email" type="email"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus  placeholder="Correo" />
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input id="password" type="password"  name="password" required autocomplete="current-password" placeholder="Contraseña" />
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror          
          </div>
          <button id="login" type="submit">Login</button>
        </form>
        <button id="goRight" class="off">Aún no te haz registrado?</button>
        <br>
        <a href="{{route('password.request')}}" class="btn btn-link">Olvidé mi contraseña</a>
      </div>
    </div>
  </div>
</div>   
@endsection
