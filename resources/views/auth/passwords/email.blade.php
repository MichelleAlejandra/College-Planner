@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card cardcreate" style="margin-right:28%; margin-left:0%; padding-top:0%">
                    <div class="div" style="margin-left: 25%; margin-bottom:0%; width:50%; height:50%">
                        <script src="https://cdn.lordicon.com/xdjxvujz.js"
                                                integrity="sha384-mfEhF0z5LRchX68hsUhT2ADmQLzF1c0+jBJfzebBSnOUCothrjbeE7ZbK/+TuqJV"
                                                crossorigin="anonymous"></script>
                        <lord-icon src="https://cdn.lordicon.com/rhvddzym.json" trigger="loop"
                            colors="primary:#000000,secondary:#000000" style="width:250px;height:250px">
                        </lord-icon>
                    </div>
                    <h1 class="text-center mb-1 mt-0" style="margin-top:-6% !important;">
                        Restablece tu contraseña
                    </h1>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                               <strong> {{ session('status') }} </strong>
                                <br/>Si el correo electrónico proporcionado es válido,
                                 le habrá llegado un enlace para recuperar su contraseña
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="row mb-0">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Correo electrónico') }}</label>
                            </div>
                    </div>
                    <div class="row mb-3">

                        <div class="col-10" style="margin-left: 8%; margin-right:8%">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-5 mt-4">
                        <div class="col-md-8 offset-md-3">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Enviar enlace de restablecimiento') }}
                            </button>
                        </div>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <input type="hidden" value="hola">
    </div>
@endsection
