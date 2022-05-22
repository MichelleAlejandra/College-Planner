@extends('layouts.app')

@section('template_title')
Actualizar materia
@endsection

@section('content')
<section class="content container-fluid">
    <div class="float-right">
        <a class="btn btn-primary mt-3" href="{{ route('materias.index') }}"> Atrás</a>
    </div>
    <div class="mt-2">
        <div class="col-md-12">
            @includeif('partials.errors')
            <div class="card cardcreate">
                <h1 class="text-center mt-1">
                    Edita tu materia
                </h1>
                <div class="card-body">
                    <form method="POST" action="{{ route('materias.update', $materia) }}" role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('materia.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
