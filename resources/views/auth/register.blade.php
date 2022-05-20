<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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
            College Planner
        </h1>
        <img src="{!! asset('img/login.png') !!}" style="width:90%; margin-left: 5%" alt="Imagen principal">
        <div class="tarjeta-login">
            Somos el planeador universitario que mas se ajusta a tus necesidades, ingresa
            y descubre lo que tenemos para ti.
        </div>
    </div>

    <div id="main" style="min-height: 100vh;width:50%">
        <div class="card"
            style="background : #fbfbfb;width:80%; margin-top:8% !important;margin:10%; box-shadow: 1px 10px 10px rgba(0, 0, 0, 0.2); border-radius:15px">
            <div class="card-body" style="text-align: center;">
                <div class="div" style="text-align: center; margin-top: 8%; margin-bottom:5%;">
                    <h1 class="subtitulo mb-2" style="font-size: 30px;"> ¡Registrate! </h1>
                    <p class="text-center mt-0">Ingresa tus datos para hacer parte de nuestra comunidad.</p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row mb-3" >
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre ') }} <a style="color:red">*</a></label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email"
                            class="col-md-4 col-form-label text-md-end">{{ __('Correo electrónico ') }}<a style="color:red">*</a></label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password"
                            class="col-md-4 col-form-label text-md-end">{{ __('Contraseña ') }}<a style="color:red">*</a></label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-1">
                        <label for="password-confirm"
                            class="col-md-4 col-form-label text-md-end">{{ __('Confirmar contraseña ') }} <a style="color:red">*</a></label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                    <div class="row mb-0" style="text-align: right; margin-right: 16%">
                        <p style="font-size: 11px; font-weight:bold"> <a style="color:red; font-weight:normal">*</a> Campos obligatorios</p>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12">
                            <button type="submit" class="btn btn-info m-2"
                                style=" align-self: center;  width: 45%; border-color:#8b8b8b; font-weight: bold;">
                                {{ __('Registrarme') }}
                            </button>
                        </div>
                    </div>
                </form>

                <div class="row mb-0">
                    <div class="col-12">
                        <p style="color:#202020">¿Ya te encuentras registrado?
                            <a class="btn-link" href="{{ route('login') }}" style="font-weight: bold; color:#202020">
                                {{ __('Iniciar sesión') }}
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
</body>
