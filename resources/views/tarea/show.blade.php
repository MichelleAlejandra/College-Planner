@extends('layouts.app')

@section('template_title')
    {{ $tarea->name ?? 'Show Tarea' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="float-right">
            <a class="btn btn-primary" href="{{ route('tareas.index',  $id) }}"> Atrás</a>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title text-center">Vista de la tarea</span>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Lista:</strong>
                            {{ $tarea->lista_id }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $tarea->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
