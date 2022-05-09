@extends('layouts.app')

@section('template_title')
    Crear Tarea
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="float-right">
            <a class="btn btn-primary mt-4" href="{{ route('tareas.index',  $id) }}"> Atrás</a>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                @includeif('partials.errors')
                <div class="card cardcreate">
                    <h1 class="text-center mt-5">
                        Añade una tarea a la lista
                    </h1>
                    <h4 class="text-center mt-1"><strong> {{ $lista->nombre }} </strong></h4>
                    <div class="card-body mt-0">
                        <form method="POST" action="{{ route('tareas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            @include('tarea.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
