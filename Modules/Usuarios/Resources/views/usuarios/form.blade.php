@php
$edit = isset($usuario);
@endphp

<div class="card-body">
    <div class="form-group">
        <label for="nombres">Nombres</label>
        {!! Form::text('nombres', null, ['class' => 'form-control'.($errors->has('nombres') ? ' is-invalid' : ''), 'placeholder' => 'Nombre', 'required' => true ]) !!}
        @if ($errors->has('nombres'))
        <span class="has-error">{{ $errors->first('nombres') }}</span>
        @endif
    </div>

    <div class="form-group">
        <label for="apellidos">Apellidos</label>
        {!! Form::text('apellidos', null, ['class' => 'form-control'.($errors->has('apellidos') ? ' is-invalid' : ''), 'placeholder' => 'Nombre', 'required' => true ]) !!}
        @if ($errors->has('apellidos'))
        <span class="has-error">{{ $errors->first('apellidos') }}</span>
        @endif
    </div>

    <div class="form-group">
        <label for="password">Contraseña</label>
        {!! Form::password('password', [
            'class' => 'form-control'.($errors->has('password') ? ' is-invalid' : ''),
            'placeholder' =>
            'Contraseña',
            'required' => ($edit ? false : true) ,
            ]) !!}
        <span class="text-muted small">Entre 8 y 32 caratceres</span>
        @if ($errors->has('password'))
        <span class="has-error">{{ $errors->first('password') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="password_confirmation">Confirmar contraseña</label>
        {!! Form::password('password_confirmation', [
            'class' => 'form-control'.($errors->has('password_confirmation') ? ' is-invalid' : ''),
            'placeholder' =>
            'Confirmar contraseña',
            'required' => ($edit ? false : true)
            ]) !!}
        <span class="text-muted small">Entre 8 y 32 caratceres</span>
        @if ($errors->has('password_confirmation'))
        <span class="has-error">{{ $errors->first('password_confirmation') }}</span>
        @endif
    </div>

    {!! Form::hidden('id', null) !!}
</div>
<!-- /.card-body -->
