<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Descripción') }}
            {{ Form::text('descripcion', $actividad->descripcion, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Decripción de la actividad que realizó']) }}
            <p style="font-size: 0px"></p>
            {{ Form::label('Horas') }}
            {{ Form::number('horas', $actividad->horas, ['class' => 'form-control' . ($errors->has('creditos') ? ' is-invalid' : ''), 'placeholder' => 'Número de horas dedicadas a la actividad']) }}
            <input type="hidden" name="materia_id" value="{{$actividad->materia_id}}">
        </div>

    </div>
    <div class="box-footer offset-md-4 mt-4">
        <button type="submit" class="btn btn-info" style="align-self: center; width: 55%; font-weight:bold; border-color:#8b8b8b;">Guardar</button>
    </div>
</div>
