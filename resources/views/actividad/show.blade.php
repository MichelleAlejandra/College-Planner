@extends('layouts.app')

@section('template_title')
{{ $actividad->name ?? 'Show Lista' }}
@endsection

@section('content')
<section class="content container-fluid">
    <div class="float-right">
        <a class="btn btn-primary mt-4" href="{{ route('actividades.index', $actividad->materia_id) }}"> Atrás</a>
    </div>
    <div class="row mt-5">

        <div class="col-md-12">
            <div class="card cardcreate">
                <div class="card-body">

                    <h1 class="text-center"><strong>{{ $actividad->descripcion }}</strong></h1>

                    <div class="card cardinfo">
                        <h1><strong>{{ $actividad->horas }}</strong></h1>
                        Horas estudiadas
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection