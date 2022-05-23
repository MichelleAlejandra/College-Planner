@extends('layouts.app')

@section('template_title')
    actividad
@endsection

@section('content')
    <div class="container-fluid">
        <div class="float-right">
            <a class="btn btn-primary mt-4" href="{{ route('materias.index') }}"> Atrás</a>
        </div>
        <div class="row">
            <h1 class="text-center mt-3 mb-1">Actividades de la materia <br>
                <h5 class="text-center mb-0"><strong>{{ $materia->nombre }}</strong></h5>
            </h1>

            <div style='text-align:right'>
                <a href="{{ route('actividades.create', $id) }}" class="btn mb-1 btn-agregar" id="">
                  {{ __('Agregar') }}
                <img style="width:18px; margin-left: 2px;" src=" {!! asset('img/anadir.png') !!}" alt="Agregar actividad"/>
                </a>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" description="Actividades">
                                <thead class="thead">
                                    <tr>
                                        <th style="text-align:center">No</th>
                                        <th style="text-align:center">Descripción</th>
                                        <th style="text-align:center">Horas</th>
                                        <th style="text-align:center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($actividades as $actividad)
                                        <tr>
                                            <td style="text-align:center">{{ ++$i }}</td>
                                            <td style="text-align:center">{{ $actividad->descripcion }}</td>
                                            <td style="text-align:center">{{ $actividad->horas }}</td>
                                            <td style="text-align:center">
                                                <form action="{{ route('actividad.destroy', $actividad->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm m-2 btn-icon" href="{{ route('actividad.edit', $actividad->id) }}" style="background-color: #FF5ADB"><img class="img-icon" src=" {!! asset('img/editar.png') !!}" alt="Editar actividad"/></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-icon btn-sm  m-2" style="background-color: #ff1038"><img class="img-icon" src=" {!! asset('img/eliminar.png') !!}" alt="Eliminar actividad"/></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {!! $actividades->links() !!}
        </div>
    </div>
    </div>
@endsection
