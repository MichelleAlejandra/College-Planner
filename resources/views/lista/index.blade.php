@extends('layouts.app')

@section('template_title')
    Lista
@endsection

@section('content')
    <div class="container-fluid" style="width:100%; height:100vh">
        <h1 class="text-center subtitulo">LISTAS</h1>

        <div style='text-align:right'>
            <a href="{{ route('listas.create') }}" class="btn mb-1 btn-agregar" id="">
                {{ __('Agregar') }}
                <img style="width:18px; margin-left: 2px;" src=" {!! asset('img/anadir.png') !!}" alt="Agregar lista"/>
            </a>
        </div>
        <div class="card">
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-striped table-hover" description="Listas">
                        <thead class="thead">
                            <tr>
                                <th style="text-align:center">No</th>
                                <th style="text-align:center">Nombre</th>
                                <th style="text-align:center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listas as $lista)
                                <tr>
                                    <td style="text-align:center">{{ ++$i }}</td>
                                    <td style="text-align:center">{{ $lista->nombre }}</td>
                                    <td style="text-align:center">
                                        <form action="{{ route('listas.destroy', $lista->id) }}" method="POST">
                                            <a class="btn btn-sm m-2 btn-icon"
                                                href="{{ route('tareas.index', $lista->id) }}"
                                                style="background-color: #30C2CC"><img class="img-icon"
                                                    src=" {!! asset('img/ver.png') !!}" alt="Ver contenido de la lista"/></a>

                                            <a class="btn btn-sm m-2 btn-icon"
                                                href="{{ route('listas.edit', $lista->id) }}"
                                                style="background-color: #FF5ADB"><img class="img-icon"
                                                    src=" {!! asset('img/editar.png') !!}" alt="Editar lista"/></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-icon btn-sm  m-2" style="background-color: #ff1038"><img class="img-icon" src=" {!! asset('img/eliminar.png') !!}" alt="Eliminar lista"/></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {!! $listas->links() !!}
    </div>
@endsection
