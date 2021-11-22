@extends('layouts.nav2')

@section('title', 'My Cuenta' )

@section('content')
<div class="contenedor-user" >
   
    <div class="tags-results" >
        @yield('content_perfil')
        
        @yield('content_deseos')
        @yield('content_ordenes')
        @yield('content_reservaciones')
        @yield('change_profile')
        @yield('change_password')
    </div>
</div>
@include('layouts.map')

@endsection