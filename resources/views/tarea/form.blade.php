<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group mt-2">
            {{ Form::label('descripción') }}
            {{ Form::text('nombre', $tarea->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Descripción']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
            <input type="hidden" name="lista_id" value="{{  $id }}">


        </div>

    </div>
    <div class="box-footer offset-md-4 mt-5">
        <button type="submit" class="btn btn-info mt-2" style="align-self: center; width: 55%; font-weight:bold; border-color:#8b8b8b;">Guardar</button>
    </div>
</div>
