@extends('layouts.app')

@section('template_title')
    {{ $materia->name ?? 'Show Lista' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="float-right">
            <a class="btn btn-primary mt-2" href="{{ route('materias.index') }}"> Atrás</a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h5 class="text-center mt-0 mb-1">Todo lo que debes saber de <br>
                    <h1 class="text-center mb-0"><strong>{{ $materia->nombre }}</strong></h1>
                </h5>

                <div class="card cardshow p-4">
                    <h5 class="mb-3" style="font-weight: bold">Estimaciones semestrales</h5>
                    <div class="row">

                        <div class="col card cardinfo" style="background-color: #15D6D9">
                            <script src="https://cdn.lordicon.com/xdjxvujz.js" integrity="sha384-mfEhF0z5LRchX68hsUhT2ADmQLzF1c0+jBJfzebBSnOUCothrjbeE7ZbK/+TuqJV" crossorigin="anonymous"></script>
                            <lord-icon src="https://cdn.lordicon.com/jcquurdy.json" trigger="hover" colors="primary:#FFFFFF"
                                style="width:50%; height:50%; align-self: center;">
                            </lord-icon>
                            <h2><strong>{{ $materia->creditos }}</strong></h2>
                            Créditos <br /> abarcados
                        </div>

                        <div class="col card cardinfo" style="background-color: #15D6D9">
                            <script src="https://cdn.lordicon.com/xdjxvujz.js" integrity="sha384-mfEhF0z5LRchX68hsUhT2ADmQLzF1c0+jBJfzebBSnOUCothrjbeE7ZbK/+TuqJV" crossorigin="anonymous"></script>
                            <lord-icon src="https://cdn.lordicon.com/vgwctwpk.json" trigger="hover" colors="primary:#FFFFFF"
                                state="hover" style="width:50%; height:50%; align-self: center;">
                            </lord-icon>
                            <h2><strong>{{ $materia->horas_total }}</strong></h2>
                            Horas totales de dedicación
                        </div>

                        <div class="col card cardinfo" style="background-color: #15D6D9">
                            <script src="https://cdn.lordicon.com/xdjxvujz.js" integrity="sha384-mfEhF0z5LRchX68hsUhT2ADmQLzF1c0+jBJfzebBSnOUCothrjbeE7ZbK/+TuqJV" crossorigin="anonymous"></script>
                            <lord-icon src="https://cdn.lordicon.com/elkhjhci.json" trigger="hover" state="hover"
                                colors="primary:#ffffff,secondary:#ffffff"
                                style="width:50%; height:50%; align-self: center;">
                            </lord-icon>
                            <h2><strong>{{ $materia->horas_dedicar_total }}</strong></h2>
                            Horas de trabajo independiente
                        </div>

                        <div class="col card cardinfo" style="background-color: #15D6D9">
                            <script src="https://cdn.lordicon.com/xdjxvujz.js" integrity="sha384-mfEhF0z5LRchX68hsUhT2ADmQLzF1c0+jBJfzebBSnOUCothrjbeE7ZbK/+TuqJV" crossorigin="anonymous"></script>
                            <lord-icon src="https://cdn.lordicon.com/ctugkxcs.json" trigger="hover" colors="primary:#FFFFFF"
                                state="hover" style="width:50%; height:50%; align-self: center;">
                            </lord-icon>
                            <h2><strong>{{ $materia->horas_total_clase }}</strong></h2>
                            Horas de docencia directa
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="card cardshow p-4" style="margin-right: 2%; margin-left: 10%">
                            <h5 class="mb-3" style="font-weight: bold;">Estimaciones semanales</h5>
                            <div class="row">
                                <div class="col card cardinfo mb-1" style="background-color: #9650ff; margin: 0% 5%">
                                    <h2><strong>{{ $materia->horas_dedicar_semana }}</strong></h2>
                                    Horas independientes
                                </div>

                                <div class="col card cardinfo mb-1" style="background-color: #9650ff; margin: 0% 5%">
                                    <h2><strong>{{ $materia->horas }}</strong></h2>
                                    Horas de <br /> docencia
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card cardshow p-4" style="margin-left: 2%; margin-right: 10%">
                            <h5 class="mb-3" style="font-weight: bold;">Actividad</h5>
                            <div class="row ">
                                <div class="col card cardinfo mb-1" style="background-color: #FF5ADB; margin: 0% 5%">
                                    <h2><strong>{{ $materia->horas_pendientes_total }}</strong></h2>
                                    Horas pendientes por dedicar
                                </div>

                                <div class="col card cardinfo mb-1" style="background-color: #FF5ADB; margin: 0% 5%">
                                    <h2><strong>{{ $materia->horas_ejecutadas }}</strong></h2>
                                    Horas <br /> dedicadas
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
