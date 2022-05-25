@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center ">
            <div class="col-md-8 ">
                <div class="card cardcreate" style="margin-right:28%; margin-left:0%; padding-top:0%;padding-left:0%;">
                    <div class="div" style="margin-left: 25%; margin-bottom:0%; width:50%; height:50%">
                        <script src="https://cdn.lordicon.com/xdjxvujz.js"
                                                integrity="sha384-mfEhF0z5LRchX68hsUhT2ADmQLzF1c0+jBJfzebBSnOUCothrjbeE7ZbK/+TuqJV"
                                                crossorigin="anonymous"></script>
                        <lord-icon src="https://cdn.lordicon.com/huwchbks.json" trigger="loop"
                            colors="primary:#000000,secondary:#ffffff" style="width:100%;height:100%">
                        </lord-icon>
                    </div>
                    <h1 class="text-center mb-1 mt-0" style="margin-top:-6% !important;">
                        Restablece tu contraseña
                    </h1>
                    <div class="card-body m-0">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="row mb-3" style="margin-left:0%">
                                <label for="email"
                                    class="col-md-5 col-form-label text-md-end">{{ __('Correo electrónico') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"
                                        autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3" style="margin-left:0%">
                                <label for="password"
                                    class="col-md-5 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3" style="margin-left:0%">
                                <label for="password-confirm"
                                    class="col-md-5 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary mt-4">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
