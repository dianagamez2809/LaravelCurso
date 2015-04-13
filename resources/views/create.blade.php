@extends('app')

@section('content')
<div class="container">
	<h1>Crear estudiante</h1>

	{!! HTML::ul($errors->all()) !!}

	{!! Form::open(array('url' => 'estudiantes')) !!}

	    <div class="form-group">
	        {!! Form::label('nombre', 'Nombre') !!}
	        {!! Form::text('nombre', Input::old('nombre'), array('class' => 'form-control')) !!}
	    </div>

	    <div class="form-group">
	        {!! Form::label('correo', 'Correo') !!}
	        {!! Form::email('correo', Input::old('correo'), array('class' => 'form-control')) !!}
	    </div>

	    <div class="form-group">
	        {!! Form::label('nivel', 'Nivel') !!}
	        {!! Form::select('nivel', array('0' => 'Seleccionar Nivel', '1' => 'Primaria', '2' => 'Secundaria', '3' => 'Preparatoria'), Input::old('nivel'), array('class' => 'form-control')) !!}
	    </div>

	    {!! Form::submit('Guardar estudiante', array('class' => 'btn btn-primary')) !!}

	{!! Form::close() !!}

</div>
@endsection