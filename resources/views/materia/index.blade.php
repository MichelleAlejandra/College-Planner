@extends('layouts.app')

@section('template_title')
    materia
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="text-center subtitulo">MATERIAS REGISTRADAS</h1>
        <div class="row">
            <div style='text-align:right'>
                <a href="{{ route('materias.create') }}" class="btn mb-1 btn-agregar" id="">
                    {{ __('Agregar') }}
                    <img style="width:18px; margin-left: 2px;" src=" {!! asset('img/anadir.png') !!}" alt="Agregar materia"/>
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
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th style="text-align:center">Nombre</th>
                                        <th style="text-align:center">Créditos</th>
                                        <th style="text-align:center">Horas semestrales</th>
                                        <th style="text-align:center">Trabajo independiente</th>
                                        <th style="text-align:center">Clase semanal</th>
                                        <th style="text-align:center">Dedicadas</th>
                                        <th style="text-align:center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($materias as $materia)
                                        <tr>
                                            <td style="text-align:center">{{ $materia->nombre }}</td>
                                            <td style="text-align:center">{{ $materia->creditos }}</td>
                                            <td style="text-align:center">{{ $materia->horas_total }} horas</td>
                                            <td style="text-align:center">{{ $materia->horas_dedicar_total }} horas</td>
                                            <td style="text-align:center">{{ $materia->horas }} horas</td>
                                            <td style="text-align:center">{{ $materia->horas_ejecutadas }} horas</td>
                                            <td style="text-align:center">
                                                <form action="{{ route('materias.destroy', $materia->id) }}" method="POST">
                                                    <a class="btn btn-sm m-2 btn-icon"
                                                        href="{{ route('materias.show', $materia->id) }}"
                                                        style="background-color: #30C2CC"><img class="img-icon"
                                                            src=" {!! asset('img/ver.png') !!}" alt="Ver materia" /></a>
                                                    <a class="btn btn-sm m-2 btn-icon"
                                                        href="{{ route('materias.edit', $materia->id) }}"
                                                        style="background-color: #FF5ADB"><img class="img-icon"
                                                            src=" {!! asset('img/editar.png') !!}" alt="Editar materia"/></a>
                                                    <a class="btn btn-sm m-2 btn-icon "
                                                        href="{{ route('actividades.index', $materia->id) }}"
                                                        style="background-color: #9650ff"><img class="img-icon"
                                                            src=" {!! asset('img/actividad.png') !!}" alt="Agregar una actividad a la materia"/></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-icon btn-sm  m-2"
                                                        style="background-color: #ff1038"><img class="img-icon"
                                                            src=" {!! asset('img/eliminar.png') !!}" alt="Eliminar materia"/></button>

                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $materias->links() !!}
            </div>
        </div>
    </div>
@endsection
