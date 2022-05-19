<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Login') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body id="login"
    style="background:#ffffff; margin: 0;padding: 0;display: flex;min-height: 100vh;justify-content: center;align-items: center;">
    <div id="aside" style="min-height: 100vh; width:50%">
        <h1 class="titulo" style="margin-top:5%; font-size:34px">
            College Planner - prueba
        </h1>
        <img src="{!! asset('img/login.png') !!}" style="width:90%; margin-left: 5%">
        <div class="tarjeta-login">
            Somos el planeador universitario que mas se ajusta a tus necesidades, ingresa
            y descubre lo que tenemos para ti.
        </div>
    </div>

    <div id="main" style="min-height: 100vh;width:50%">
        <div class="card"
            style="background : #fbfbfb;width:80%; height: 500px; margin-top:8% !important;margin:10%; box-shadow: 1px 10px 10px rgba(0, 0, 0, 0.2); border-radius:15px">
            <div class="card-body" style="text-align: center;">
                <div class="div" style="text-align: center; margin-top: 8%; margin-bottom:8%;">
                    <h1 class="subtitulo mb-2" style="font-size: 30px;"> ¡Inicia sesión! </h1>
                    <p class="text-center mt-0">Diligencia tus datos para entrar a tu cuenta.</p>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row mb-3">
                        <label for="email"
                            class="col-md-4 col-form-label text-md-end">{{ __('Correo electrónico') }} <a style="color:red">*</a></label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Correo electrónico no válido</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <label for="password"
                            class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }} <a style="color:red">*</a></label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0" style="text-align: right; margin-right: 16%">
                        <p style="font-size: 11px; font-weight:bold"> <a style="color:red; font-weight:normal">*</a> Campos obligatorios</p>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember" style="display: flex; margin-left: 2%">
                                    {{ __('Recuérdame') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        @if (Route::has('password.request'))
                            <a class="btn-link" href="{{ route('password.request') }}">
                                {{ __('¿Olvidaste tu contraseña?') }}
                            </a>
                        @endif
                    </div>

                    <div class="row mb-0">
                        <div class="col-12">
                            <button type="submit" class="btn btn-info m-3"
                                style=" align-self: center;  width: 45%; border-color:#8b8b8b; font-weight: bold;">
                                {{ __('Ingresar') }}
                            </button>
                        </div>
                    </div>
                </form>

                <div class="row mb-0">
                    <div class="col-12">
                        <p style="color:#202020">¿No te encuentras registrado?
                            <a class="btn-link" href="{{ route('register') }}" style="font-weight: bold; color:#202020">
                                {{ __('Registrarme') }}
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
