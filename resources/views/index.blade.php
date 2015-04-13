@extends('app')

@section('content')
<div class="container">
	<h1>Estudiantes</h1>

	<!-- will be used to show any messages -->
	@if (Session::has('message'))
	    <div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif

	<table class="table table-striped table-bordered">
	    <thead>
	        <tr>
	            <td>Nombre</td>
	            <td>Correo</td>
	            <td>Nivel</td>
	            <td>Mostrar</td>
	            <td>Editar</td>
	        </tr>
	    </thead>
	    <tbody>
	    @foreach($estudiantes as $key => $value)
	        <tr>
	            <td>{{ $value->nombre }}</td>
	            <td>{{ $value->correo }}</td>
	            <td>{{ $value->nivel }}</td>

	            <td>

	                <a class="btn btn-small btn-success" href="{{ URL::to('estudiantes/' . $value->id) }}">Mostrar estudiante</a>
	            </td>
	            <td>
	                <a class="btn btn-small btn-info" href="{{ URL::to('estudiantes/' . $value->id . '/edit') }}">Editar estudiante</a>

	            </td>
	        </tr>
	    @endforeach
	    </tbody>
	</table>
</div>
@endsection
