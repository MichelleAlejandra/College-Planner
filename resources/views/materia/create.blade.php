@extends('layouts.app')

@section('template_title')
Create Lista
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="float-right">
                <a class="btn btn-primary" style="margin-top: 2%;" href="{{ route('materias.index') }}"> Atrás</a>
            </div>
            @includeif('partials.errors')

            <div class="card cardcreate">
                <h1 class="text-center mt-4">
                    Crea una materia
                </h1>
                <div class="card-body mt-3">
                    <form method="POST" action="{{ route('materias.store') }}" role="form" enctype="multipart/form-data">
                        @csrf
                        @include('materia.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
