@extends('layouts.app')

@section('template_title')
    Create Lista
@endsection

@section('content')
    <section class="container-fluid">
        <div class="float-right">
            <a class="btn btn-primary mt-4" href="{{ route('listas.index') }}"> Atrás</a>
        </div>
        @includeif('partials.errors')

        <div class="card cardcreate">

            <h1 class="text-center mt-5">
                Crea una nueva lista
            </h1>
            <div class="card-body mt-3">
                <form method="POST" action="{{ route('listas.store') }}" role="form" enctype="multipart/form-data">
                    @csrf
                    @include('lista.form')
                </form>
            </div>
        </div>
    </section>
@endsection
