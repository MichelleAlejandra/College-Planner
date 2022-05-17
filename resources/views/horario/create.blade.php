@extends('layouts.app')

@section('template_title')
    Horario
@endsection

@section('content')
<section class="container-fluid">
    <div class="float-right">
        <a class="btn btn-primary mt-4" href="{{ route('horario.index') }}"> Atrás</a>
    </div>
    @includeif('partials.errors')

    <div class="card cardcreate">
        <h1 class="text-center">
            Añade una materia al horario
        </h1>
        <div class="card-body">
            <form method="POST" action="{{ route('horario.store') }}" role="form" enctype="multipart/form-data">
                @csrf
                @include('horario.form')
            </form>
        </div>
    </div>
</section>
@endsection
