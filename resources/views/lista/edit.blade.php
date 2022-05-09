@extends('layouts.app')

@section('template_title')
    Update Lista
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="float-right">
            <a class="btn btn-primary mt-4" href="{{ route('listas.index') }}"> Atrás</a>
        </div>
        <div class="mt-3">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card cardcreate">
                    <h1 class="text-center mt-5">
                        Actualiza la lista
                    </h1>
                    <div class="card-body">
                        <form method="POST" action="{{ route('listas.update', $lista->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('lista.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
