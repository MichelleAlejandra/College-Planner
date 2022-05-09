<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'College planner') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/locales-all.js"></script>

    <style>

    </style>

</head>

<body>
    <div id="app">
        <div class="content w-100">
            <nav class="navbar navbar-expand-lg barraestado">
                <div class="p-2">
                    <a href="{{ url('/') }}" class="navbar-brand text-center text-dark w-100 p-2"
                        style="font-size:24px; font-weight: bold; margin-left: 3px">
                        College planner
                    </a>
                </div>
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @endif

                    @if (Route::has('register'))
                    <li class="nav-item" style="margin-right:60px">
                        <a class="nav-link text-dark" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown" style="margin-right:60px">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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
            </nav>
            <div class="d-flex">
                @if (Auth::check())
                <div id="sidebar">
                    <div id="sidebar-accordion" class="accordion" style="margin-top:40px;">
                        <div class="list-group">
                            <a href="{{ route('index.index') }}" style="border-radius:0px"
                                class="list-group-item list-group-item-action bar {{ request()->is('/') ? 'active' : '' }} {{ request()->is('index') ? 'active' : '' }}">
                                <img src="{!! asset('img/reloj.png') !!}" class="icon">
                                Consolidado
                            </a>

                            <a href="{{ route('materias.index') }}"
                                class="list-group-item list-group-item-action bar {{ (request()->segment(1) == 'materias') ? 'active' : '' }} {{ (request()->segment(1) == 'actividad') ? 'active' : '' }}">
                                <img src="{!! asset('img/libro.png') !!}" class="icon">
                                Materias
                            </a>

                            <hr style="height:2.5px" />

                            <a href="{{ route('listas.index') }}"
                                class="list-group-item list-group-item-action bar {{ request()->is('listas') ? 'active' : '' }} {{ request()->is('listas/create') ? 'active' : '' }}">
                                <img src=" {!! asset('img/lista.png') !!}" class="icon">
                                Listas
                            </a>

                            <a href="{{ route('horario.index') }}" data-toggle="collapse" aria-expanded="false"
                                class="list-group-item list-group-item-action bar {{ request()->is('horario') ? 'active' : '' }}">
                                <img src=" {!! asset('img/calendario.png') !!}" class="icon">
                                Horario
                            </a>

                            <div class="dropdown">
                                <button class="dropdown-toggle bar" style="width:100%" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src=" {!! asset('img/lista.png') !!}" class="icon-nav">Listas de tareas
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="width:100%">
                                    @foreach ($listas as $lista)
                                    <li><a class="dropdown-item"
                                            href="{{ route('tareas.index',$lista->id) }}">{{ $lista->nombre }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                @endif
                <section style="background-color:white; height:100vh; width:100%">
                    <div class="container">
                        @yield('content')
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/horario.js') }}" defer></script>
</body>

</html>
