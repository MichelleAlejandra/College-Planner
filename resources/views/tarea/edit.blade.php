@extends('layouts.app')

@section('template_title')
    Update Tarea
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="float-right">
            <a class="btn btn-primary" href="{{ route('tareas.index',  $id) }}"> Atrás</a>
        </div>
        <div class="mt-5">
            <div class="col-md-12">
                @includeif('partials.errors')
                <div class="card cardcreate">
                    <h1 class="text-center mt-4">
                        Actualiza la tarea
                    </h1>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tareas.update', $tarea->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            @method('PUT')
                            @include('tarea.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
