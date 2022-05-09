@extends('layouts.app')

@section('template_title')
    Actualizar actividad
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="float-right">
            <a class="btn btn-primary mt-4" href="{{ route('actividades.index', $actividad->materia_id) }}"> Atrás</a>
        </div>
        <div class="mt-2">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card cardcreate">
                    <h1 class="text-center mt-4">
                        Actualiza la actividad
                    </h1>
                    <div class="card-body mt-3">
                        <form method="POST" action="{{ route('actividad.update', $actividad->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('actividad.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
