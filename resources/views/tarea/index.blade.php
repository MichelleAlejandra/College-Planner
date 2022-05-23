@extends('layouts.app')

@section('template_title')
    Tarea
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="float-right mt-2">
                <a href="{{ route('listas.index') }}" class="btn btn-primary mt-3" data-placement="left">
                    Atrás
                </a>
            </div>
            <h1 class="text-center mt-3 mb-1">Tareas de la lista <br>
                <h5 class="text-center mb-3"><strong>{{ $lista->nombre }}</strong></h5>
            </h1>
            <div style='text-align:right'>
                <a href="{{ route('tareas.create', ['id' => $id]) }}" class="btn mb-1 btn-agregar">
                    {{ __('Agregar') }}
                    <img style="width:18px; margin-left: 2px;" alt="Agregar tarea" src=" {!! asset('img/anadir.png') !!}" />
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
                            <table class="table table-striped table-hover" description="Tareas">
                                <thead class="thead">
                                    <tr>
                                        <th style="text-align:center">No</th>

                                        <th style="text-align:center">Nombre</th>

                                        <th style="text-align:center"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tareas as $tarea)
                                        <tr>
                                            <td style="text-align:center">{{ ++$i }}</td>
                                            <td style="text-align:center">{{ $tarea->nombre }}</td>

                                            <td style="text-align:center">
                                                <form action="{{ route('tareas.destroy', $tarea->id) }}" method="POST">
                                                    <a class="btn btn-sm m-2 btn-icon"
                                                        href="{{ route('tareas.edit', $tarea->id) }}"
                                                        style="background-color: #FF5ADB"><img class="img-icon" alt="Editar tarea"
                                                            src=" {!! asset('img/editar.png') !!}" /></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-icon btn-sm  m-2" style="background-color: #ff1038">
                                                        <img class="img-icon" alt="Eliminar tarea" src=" {!! asset('img/eliminar.png') !!}"/></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $tareas->links() !!}
            </div>
        </div>
    </div>
@endsection
