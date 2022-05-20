@extends('layouts.app')

@section('template_title')
    Horario
@endsection

@section('content')
    <div class="container-fluid">

        <h1 class="text-center subtitulo">HORARIO</h1>
        <div class="row">
            <div style='text-align:right'>
                <a href="{{ route('horario.create') }}" class="btn mb-1 btn-agregar" id="">
                    {{ __('Agregar') }}
                    <img style="width:18px; margin-left: 2px;" src=" {!! asset('img/anadir.png') !!}" alt="Agregar un horario" />
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
                            <table class="table-horario" cellpadding="-10" cellspacing="0">
                                <thead class="thead">
                                    <tr>
                                        <th style="text-align:center; width:9%">Hora</th>
                                        <th style="text-align:center; width:13%">Lunes</th>
                                        <th style="text-align:center; width:13%">Martes</th>
                                        <th style="text-align:center; width:13%">Miércoles</th>
                                        <th style="text-align:center; width:13%">Jueves</th>
                                        <th style="text-align:center; width:13%">Viernes</th>
                                        <th style="text-align:center; width:13%">Sábado</th>
                                        <th style="text-align:center; width:13%">Domingo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $lunes_ubi = 0;
                                        $lunes_top = 7;
                                        $martes_ubi = 0;
                                        $martes_top = 7;
                                        $miercoles_ubi = 0;
                                        $miercoles_top = 7;
                                        $jueves_ubi = 0;
                                        $jueves_top = 7;
                                        $viernes_ubi = 0;
                                        $viernes_top = 7;
                                        $sabado_ubi = 0;
                                        $sabado_top = 7;
                                        $domingo_ubi = 0;
                                        $domingo_top = 7;
                                    @endphp
                                    @for ($i = 7; $i < 21; $i++)
                                        <tr>
                                            @if ($i < 12)
                                                <th class="th-h pt-3 pb-3" scope="row">
                                                    {{ $i }}:00 AM</th>
                                            @else
                                                <th class="th-h pt-3 pb-3" scope="row">
                                                    {{ $i }}:00 PM</th>
                                            @endif
                                            @if ($lunes_top == $i)
                                                @if ($lunes_ubi < count($horariosLunes))
                                                    @for ($j = $lunes_ubi; $j < count($horariosLunes); $j++)
                                                        @if ($horariosLunes[$j]->hora_inicial == $i)
                                                            <td class="td-h"
                                                                rowspan="{{ $horariosLunes[$j]->duracion }}">
                                                                <a class="btn a-horario"
                                                                    style="background-color: {{ $horariosLunes[$j]->materia_color }}"
                                                                    href="{{ route('horario.edit', $horariosLunes[$j]->id) }}">
                                                                    {{ $horariosLunes[$j]->materia_nombre }}
                                                                </a>
                                                            </td>
                                                            @php($lunes_top = $horariosLunes[$j]->hora_final)
                                                            @php($lunes_ubi++)
                                                        @else
                                                            <td class="td-h" style="text-align:center"></td>
                                                            @php($lunes_top++)
                                                        @endif
                                                    @break
                                                @endfor
                                            @else
                                                <td class="td-h"></td>
                                                @php($lunes_top++)
                                            @endif
                                        @endif

                                        @if ($martes_top == $i)
                                            @if ($martes_ubi < count($horariosMartes))
                                                @for ($j = $martes_ubi; $j < count($horariosMartes); $j++)
                                                    @if ($horariosMartes[$j]->hora_inicial == $i)
                                                        <td class="td-h"
                                                            rowspan="{{ $horariosMartes[$j]->duracion }}">
                                                            <a class="btn a-horario"
                                                                style="background-color: {{ $horariosMartes[$j]->materia_color }}"
                                                                href="{{ route('horario.edit', $horariosMartes[$j]->id) }}">
                                                                {{ $horariosMartes[$j]->materia_nombre }}
                                                            </a>
                                                        </td>
                                                        @php($martes_top = $horariosMartes[$j]->hora_final)
                                                        @php($martes_ubi++)
                                                    @else
                                                        <td class="td-h"></td>
                                                        @php($martes_top++)
                                                    @endif
                                                @break
                                            @endfor
                                        @else
                                            <td class="td-h"></td>
                                            @php($martes_top++)
                                        @endif
                                    @endif

                                    @if ($miercoles_top == $i)
                                        @if ($miercoles_ubi < count($horariosMiercoles))
                                            @for ($j = $miercoles_ubi; $j < count($horariosMiercoles); $j++)
                                                @if ($horariosMiercoles[$j]->hora_inicial == $i)
                                                    <td class="td-h"
                                                        rowspan="{{ $horariosMiercoles[$j]->duracion }}">
                                                        <a class="btn a-horario"
                                                            style="background-color: {{ $horariosMiercoles[$j]->materia_color }}"
                                                            href="{{ route('horario.edit', $horariosMiercoles[$j]->id) }}">
                                                            {{ $horariosMiercoles[$j]->materia_nombre }}
                                                        </a>
                                                    </td>
                                                    @php($miercoles_top = $horariosMiercoles[$j]->hora_final)
                                                    @php($miercoles_ubi++)
                                                @else
                                                    <td class="td-h"></td>
                                                    @php($miercoles_top++)
                                                @endif
                                            @break
                                        @endfor
                                    @else
                                        <td class="td-h"></td>
                                        @php($miercoles_top++)
                                    @endif
                                @endif

                                @if ($jueves_top == $i)
                                    @if ($jueves_ubi < count($horariosJueves))
                                        @for ($j = $jueves_ubi; $j < count($horariosJueves); $j++)
                                            @if ($horariosJueves[$j]->hora_inicial == $i)
                                                <td class="td-h"
                                                    rowspan="{{ $horariosJueves[$j]->duracion }}">
                                                    <a class="btn a-horario"
                                                        style="background-color: {{ $horariosJueves[$j]->materia_color }}"
                                                        href="{{ route('horario.edit', $horariosJueves[$j]->id) }}">
                                                        {{ $horariosJueves[$j]->materia_nombre }}
                                                    </a>
                                                </td>
                                                @php($jueves_top = $horariosJueves[$j]->hora_final)
                                                @php($jueves_ubi++)
                                            @else
                                                <td class="td-h"></td>
                                                @php($jueves_top++)
                                            @endif
                                        @break
                                    @endfor
                                @else
                                    <td class="td-h"></td>
                                    @php($jueves_top++)
                                @endif
                            @endif


                            @if ($viernes_top == $i)
                                @if ($viernes_ubi < count($horariosViernes))
                                    @for ($j = $viernes_ubi; $j < count($horariosViernes); $j++)
                                        @if ($horariosViernes[$j]->hora_inicial == $i)
                                            <td class="td-h"
                                                rowspan="{{ $horariosViernes[$j]->duracion }}">
                                                <a class="btn a-horario"
                                                    style="background-color: {{ $horariosViernes[$j]->materia_color }}"
                                                    href="{{ route('horario.edit', $horariosViernes[$j]->id) }}">
                                                    {{ $horariosViernes[$j]->materia_nombre }}
                                                </a>
                                            </td>
                                            @php($viernes_top = $horariosViernes[$j]->hora_final)
                                            @php($viernes_ubi++)
                                        @else
                                            <td class="td-h"></td>
                                            @php($viernes_top++)
                                        @endif
                                    @break
                                @endfor
                            @else
                                <td class="td-h"></td>
                                @php($viernes_top++)
                            @endif
                        @endif

                        @if ($sabado_top == $i)
                            @if ($sabado_ubi < count($horariosSabado))
                                @for ($j = $sabado_ubi; $j < count($horariosSabado); $j++)
                                    @if ($horariosSabado[$j]->hora_inicial == $i)
                                        <td class="td-h"
                                            rowspan="{{ $horariosSabado[$j]->duracion }}">
                                            <a class="btn a-horario"
                                                style="background-color: {{ $horariosSabado[$j]->materia_color }}"
                                                href="{{ route('horario.edit', $horariosSabado[$j]->id) }}">
                                                {{ $horariosSabado[$j]->materia_nombre }}
                                            </a>
                                        </td>
                                        top {{ $horariosSabado[$j]->hora_final }}
                                        @php($sabado_top = $horariosSabado[$j]->hora_final)
                                        @php($sabado_ubi++)
                                    @else
                                        <td class="td-h"></td>
                                        @php($sabado_top++)
                                    @endif
                                @break
                            @endfor
                        @else
                            <td class="td-h"></td>
                            @php($sabado_top++)
                        @endif
                    @endif

                    @if ($domingo_top == $i)
                        @if ($domingo_ubi < count($horariosDomingo))
                            @for ($j = $domingo_ubi; $j < count($horariosDomingo); $j++)
                                @if ($horariosDomingo[$j]->hora_inicial == $i)
                                    <td class="td-h"
                                        rowspan="{{ $horariosDomingo[$j]->duracion }}">
                                        <a class="btn a-horario"
                                            style="background-color: {{ $horariosDomingo[$j]->materia_color }}"
                                            href="{{ route('horario.edit', $horariosDomingo[$j]->id) }}">
                                            {{ $horariosDomingo[$j]->materia_nombre }}
                                        </a>
                                    </td>
                                    @php($domingo_top = $horariosDomingo[$j]->hora_final)
                                    @php($domingo_ubi++)
                                @else
                                    <td class="td-h"></td>
                                    @php($domingo_top++)
                                @endif
                            @break
                        @endfor
                    @else
                        <td class="td-h"></td>
                        @php($domingo_top++)
                    @endif
                @endif
        @endfor
    </tbody>
</table>

</div>
</div>
</div>
</div>
</div>
</div>
@endsection
