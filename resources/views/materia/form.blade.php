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
            <p style="font-size: 0px"></p>
            {!! Form::label('color', 'Color', ['class' => 'control-label']) !!}
            <div class="input-group mb-3">
                {!! Form::text('color', old('color'), ['class' => 'form-control colorpicker', 'placeholder' => ' Selecciona un color']) !!}
                <span class="input-group-text" id="basic-addon1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#878787" class="bi bi-palette-fill" viewBox="0 0 16 16">
                    <path d="M12.433 10.07C14.133 10.585 16 11.15 16 8a8 8 0 1 0-8 8c1.996 0 1.826-1.504 1.649-3.08-.124-1.101-.252-2.237.351-2.92.465-.527 1.42-.237 2.433.07zM8 5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm4.5 3a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM5 6.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm.5 6.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                  </svg></span>
            </div>
        </div>
    </div>
    <div class="box-footer offset-md-4 mt-5">
        <button type="submit" class="btn btn-info" style="align-self: center; width: 55%; font-weight:bold; border-color:#8b8b8b;">Guardar</button>
    </div>
</div>
@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/js/bootstrap-colorpicker.min.js">
    </script>
    <script>
        $('.colorpicker').colorpicker();
    </script>
@stop
