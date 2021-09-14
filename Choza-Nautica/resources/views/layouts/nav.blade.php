<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('css/stilos.css')}}">
    <link rel="stylesheet" href="{{asset('css/product.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bubblegum+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choza N. - @yield('title')</title>

    
</head>
<body>
    <!--navbar -->
    <div class="navbar">
        <div class="logo">
            <img src="{{asset('img/logo.png')}}" alt="">
        </div>
        <div class="list-container">
            <ul class="list">
                <li>
                    <a href="{{ url('/') }}">Inicio</a>
                </li>
                @isset(auth()->user()->id_rol)
                @if (auth()->user()->id_rol ==1)
                <li>
                    <a href="{{url('dashboard')}}">Dashboard</a>
                </li>
                @endif
                @endisset

                <li>
                    <a href="">Contacto</a>
                </li>
                <li>
                    <a href="">Conócenos</a>
                </li>
                <li>
                    <a href="">Preguntas Frecuentes</a>
                </li>
                <li>
                    <a href="{{ url('category') }}">Ordena Aquí</a>
                </li>

                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </ul>
           
        </div>  
        <div class="shadow">     
        </div> 
    </div>
    
    <!--Contenido-->
    @yield('content') -> @section('content')
</body>
</html>

