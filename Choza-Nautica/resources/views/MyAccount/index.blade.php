@extends('layouts.nav')

@section('title', 'Orden' )

@section('content')

<div class="contenedor-p">

    <li><a href="#">Mi lista de deseos</a></li>
    <li><a href="#">Configuración</a></li>
    <li><a href="{{ route('my_orders') }}">Mis Ordenes</a></li>
    @yield('content_ordenes')
    
</div>
@section('content')

@endsection