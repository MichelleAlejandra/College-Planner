<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $lista->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer offset-md-4 mt-5">
        <button type="submit" class="btn btn-info" style="align-self: center; width: 55%; font-weight:bold; border-color:#8b8b8b;">Guardar</button>
    </div>
</div>
