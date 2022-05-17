@extends('layouts.app')

@section('template_title')
    Horario
@endsection

@section('content')<section class="content container-fluid">
    <div class="float-right">
        <a class="btn btn-primary mt-4" href="{{ route('horario.index') }}"> Atrás</a>
    </div>
    <div class="mt-2 mb-4">
        <div class="col-md-12">
            @includeif('partials.errors')
            <div class="card cardcreate">
                <h1 class="text-center mt-4">
                    Edita el horario
                </h1>
                <div class="card-body">
                    <form method="POST" action="{{ route('horario.update', $horario->id) }}" role="form" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf
                        @method('PUT')
                        @include('horario.form')
                    </form>
                </div>
            </div>
            <p style="color:transparent">hola</p>
        </div>
    </div>
</section>
@endsection
