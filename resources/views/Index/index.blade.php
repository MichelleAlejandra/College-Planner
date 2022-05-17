@extends('layouts.app')
@section('content')
    <h1 class="text-center subtitulo">CONSOLIDADO DE HORAS SEMESTRALES</h1>
    <div class="row p-2">
        <div class="col p-2" style="text-align:center">
            <div class="tarjeta" style="background-color: rgba(128, 110, 80, 1);">
                <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
                <lord-icon src="https://cdn.lordicon.com/jcquurdy.json" trigger="hover" colors="primary:#FFFFFF"
                    style="width:100%;height:100%">
                </lord-icon>
                <h1>{{ $totalCreditos }}</h1>
                TOTAL DE <br> CREDITOS
            </div>
        </div>

        <div class="col p-2" style="text-align:center">
            <div class="tarjeta" style="background-color: rgba(255, 90, 219, 1)">
                <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
                <lord-icon src="https://cdn.lordicon.com/vgwctwpk.json" trigger="hover" colors="primary:#FFFFFF"
                    state="hover" style="width:100%;height:100%">
                </lord-icon>
                <h1 style="color:white">{{ $totalHorasEstudio }}</h1>
                TOTAL DE HORAS DE ESTUDIO
            </div>
        </div>

        <div class="col p-2" style="text-align:center">
            <div class="tarjeta" style="background-color: rgba(251, 206, 61, 1)">
                <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
                <lord-icon src="https://cdn.lordicon.com/nxvrkirq.json" trigger="hover" colors="primary:#FFFFFF"
                    style="width:100%;height:100%">
                </lord-icon>
                <h1>{{ $totalHorasEstudiadas }}</h1>
                TOTAL DE HORAS ESTUDIADAS
            </div>
        </div>
        <div class="col p-2" style="text-align:center">
            <div class="tarjeta" style="background-color: rgba(168, 111, 255, 1)">
                <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
                <lord-icon src="https://cdn.lordicon.com/zjptfwtq.json" trigger="hover" colors="primary:#FFFFFF"
                    style="width:100%;height:100%">
                </lord-icon>
                <h1>{{ $horasIndependiente }}</h1>
                TOTAL DE HORAS INDEPENDIENTES
            </div>
        </div>
        <div class="col p-2" style="text-align:center">
            <div class="tarjeta" style="background-color: rgba(41, 192, 200, 1)">
                <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
                <lord-icon src="https://cdn.lordicon.com/vereblpj.json" trigger="hover" colors="primary:#FFFFFF"
                    style="width:100%;height:100%">
                </lord-icon>
                <h1>{{ $totalHorasPendientes }}</h1>
                TOTAL DE HORAS PENDIENTES
            </div>
        </div>
    </div>
@endsection
