@extends('layouts.nav')

@section('title', 'My Cuenta' )

@section('content')

<div class="contnedor-p" style="display:flex; position:relative;">
    <div class="tags">
        <li><a href="{{ route('mi_cuenta') }}">Ayuda</a></li>
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
@section('content')
@endsection