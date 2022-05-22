<div class="box box-info padding-1">
    <div class="box-body">
        @if ($message = Session::get('error'))
            <div class="alert alert-danger p-2">
                <strong>¡Error!, no se pudo agregar la materia al horario: </strong>
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="form-group">

            {{ Form::label('materia') }}
            <select class="form-select @error('dia_semana') is-invalid @enderror" id="materia_id" name="materia_id"
                autocomplete="dia_semana" autofocus required>
                <option selected value="">Seleccione una materia</option>
                @foreach ($materias as $materia)
                    <option value="{{ $materia->id }}" {{ $horario->materia_id == $materia->id ? 'selected' : '' }}>
                        {{ $materia->nombre }}
                    </option>
                @endforeach
            </select>

            <label class="mt-3">Día de la semana</label>
            <select class="form-select @error('dia_semana') is-invalid @enderror" name="dia_semana" id="dia_semana"
                autocomplete="dia_semana" required>
                <option selected value="">Seleccione una día</option>
                <option value="Lunes" {{ $horario->dia_semana == 'Lunes' ? 'selected' : '' }}>Lunes</option>
                <option value="Martes" {{ $horario->dia_semana == 'Martes' ? 'selected' : '' }}>Martes</option>
                <option value="Miercoles" {{ $horario->dia_semana == 'Miercoles' ? 'selected' : '' }}>Miércoles
                </option>
                <option value="Jueves" {{ $horario->dia_semana == 'Jueves' ? 'selected' : '' }}>Jueves</option>
                <option value="Viernes" {{ $horario->dia_semana == 'Viernes' ? 'selected' : '' }}>Viernes</option>
                <option value="Sabado" {{ $horario->dia_semana == 'Sabado' ? 'selected' : '' }}>Sábado</option>
                <option value="Domingo" {{ $horario->dia_semana == 'Domingo' ? 'selected' : '' }}>Domingo
                </option>
            </select>

            <label class="mt-3">Hora inicial</label>
            <select class="form-select @error('error') is-invalid @enderror" size="1" id="hora_inicial"
                name="hora_inicial" required>
                <option selected>Seleccione una hora</option>
                @for ($i = 7; $i < 13; $i++)
                    @if ($i < 10)
                        <option value="{{ $i }}" {{ $horario->hora_inicial == $i ? 'selected' : '' }}>
                            0{{ $i }}:00 AM</option>
                    @else
                        <option value="{{ $i }}" {{ $horario->hora_inicial == $i ? 'selected' : '' }}>
                            {{ $i }}:00 AM</option>
                    @endif
                @endfor
                @for ($i = 1; $i < 11; $i++)
                    @if ($i < 10)
                        <option value="{{ $i + 12 }}"
                            {{ $horario->hora_inicial == $i + 12 ? 'selected' : '' }}>0{{ $i }}:00 PM
                        </option>
                    @else
                        <option value="{{ $i + 12 }}"
                            {{ $horario->hora_inicial == $i + 12 ? 'selected' : '' }}>{{ $i }}:00 PM
                        </option>
                    @endif
                @endfor
            </select>

            <label class="mt-3">Duración de la clase</label>
            <input type="number" name="duracion" id="duracion" placeholder="Horas de duración de la clase"
                class="form-control @error('error') is-invalid' @enderror)" value="{{ $horario->duracion }}"
                required>
            @error('error')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="box-footer offset-md-4 mt-4">
        <button type="submit" class="btn btn-info"
            style="align-self: center; width: 55%; font-weight:bold; border-color:#8b8b8b;">Guardar</button>
    </div>
    <div class="div">
        @if (request()->segment(3) == 'edit')

        @endif
    </div>
</div>
