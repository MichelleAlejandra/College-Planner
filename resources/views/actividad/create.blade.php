@extends('layouts.app')

@section('template_title')
    Create Lista
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="float-right">
            <a class="btn btn-primary mt-4" href="{{ route('actividades.index', $actividad->materia_id) }}"> Atrás</a>
        </div>
        <div class="row">
            <div class="col-md-12">
                @includeif('partials.errors')

                <div class="card mt-5 cardcreate">
                    <h1 class="text-center mt-5">
                        Registra tu actividad
                        <h5 class="text-center">En: <strong> {{ $materia->nombre }} </strong></h5>
                    </h1>

                    <div class="card-body mt-3">
                        <form method="POST" action="{{ route('actividades.store') }}"  enctype="multipart/sform-data">
                            @csrf

                            @include('actividad.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
