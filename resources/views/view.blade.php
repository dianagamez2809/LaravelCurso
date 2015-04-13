@extends('app')

@section('content')
<div class="container">
	<h1>Información de estudiante</h1>

	<div class="jumbotron text-center">
        <h2>{{ $estudiante->nombre }}</h2>
        <p>
            <strong>Correo electrónico:</strong> {{ $estudiante->correo }}<br>
            <strong>Nivel:</strong> {{ $estudiante->nivel }}
        </p>
    </div>

</div>
@endsection