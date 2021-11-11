@extends('layouts.nav')

@section('title', 'My Cuenta' )

@section('content')
<div class="header" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.8), transparent), url(https://img.bekiacocina.com/articulos/portada/85000/85623.jpg) no-repeat center center; min-height: 60vh; background-attachment: fixed; ">
      <div class="center">
        <h1 class="alex-brush"></h1>
        <h2>Las mejores </h2>
        <span id="asterisk">*</span>
        <p>Categorias para ti</p>
      </div>
    </div>   
<div class="contnedor-p" style="display:flex; position:relative;">
    <div class="tags">
        <li><a href="{{ route('mi_cuenta') }}">Nosotros</a></li>
        <li><a href="{{ route('my_perfil') }}">Detalles de la cuenta</a></li>
        <li><a href="{{ route('mis_deseos') }}">Mi lista de deseos</a></li>
        <li><a href="{{ route('my_orders') }}">Pedidos</a></li>
        <li><a href="{{ route('my_reserves') }}">Reservaciones</a></li>
        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form></li>
    </div>
    <div class="tags-results" style="display: flex; width:450px;">
        @yield('content_perfil')
        @yield('change_password')
        @yield('content_deseos')
        @yield('content_ordenes')
        @yield('content_reservaciones')
    </div>
</div>
@include('layouts.map')
@endsection