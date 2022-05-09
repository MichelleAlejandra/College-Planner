<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group" style="padding">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $materia->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            <p style="font-size: 0px"></p>
            {{ Form::label('créditos') }}
            {{ Form::number('creditos', $materia->creditos, ['class' => 'form-control' . ($errors->has('creditos') ? ' is-invalid' : ''), 'placeholder' => 'Número de creditos']) }}
            <p style="font-size: 0px"></p>
            {{ Form::label('Horas') }}
            {{ Form::number('horas', $materia->horas, ['class' => 'form-control' . ($errors->has('creditos') ? ' is-invalid' : ''), 'placeholder' => 'Número de horas de clase a la semana']) }}
        </div>
    </div>
    <div class="box-footer offset-md-4 mt-4">
        <button type="submit" class="btn btn-info" style="align-self: center; width: 55%; font-weight:bold; border-color:#8b8b8b;">Guardar</button>
    </div>
</div>
