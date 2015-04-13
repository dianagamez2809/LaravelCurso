@extends('app')

@section('content')
<div class="container">
	<h1>Buscar estudiante</h1>

	@if (Session::has('message'))
    	<div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif

	{!! Form::open(array('', 'class' => 'form-horizontal')) !!}
		<div class="form-group">
			{!! Form::label('nombre', 'Nombre', ['class' => 'col-md-4 control-label']) !!}
			<div class="col-md-6">
				{!! Form::input('text', 'nombre', Input::old('nombre'), ['class' => 'form-control']) !!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::label('correo', 'Correo electrónico', ['class' => 'col-md-4 control-label']) !!}
			<div class="col-md-6">
				{!! Form::input('email', 'correo', Input::old('correo'), ['class' => 'form-control']) !!}
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-6 col-md-offset-4">
				<button type="button" class="btn btn-info" id="LoadRecordsButton">
					Buscar
				</button>
			</div>
		</div>

	{!! Form::close() !!}

	<div id="PeopleTableContainer" style="width: 100%;display:none;"></div>

</div>
@endsection

@section('javascript')
	<script type="text/javascript">
		$( document ).ready(function(){
			$("#LoadRecordsButton").click(function(){
		        $("#PeopleTableContainer").show();
		    });

            var _token = $('meta[name="_token"]').attr('content');
            $.ajaxPrefilter(function(options, originalOptions, jqXHR){
              if (options.type.toLowerCase() === "post") {
                  options.data += options.data?"&":"";
                  options.data += "_token=" + _token;
              }
            });
            var spanishMessages = {
  	            serverCommunicationError: 'Error de comunicación',
  	            loadingMessage: 'Cargando...',
  	            noDataAvailable: 'No existen datos disponibles',
  	            addNewRecord: 'Agregar nuevo registro',
  	            editRecord: 'Editar registro',
  	            areYouSure: 'Confirmación de borrar',
  	            deleteConfirmation: '¿Desea eliminar el registro?',
  	            save: 'Guardar',
  	            saving: 'Guardando',
  	            cancel: 'Cancelar',
  	            deleteText: 'Borrar',
  	            deleting: 'Borrando',
  	            error: 'Error',
  	            close: 'Cerrar',
  	            pagingInfo: 'Mostrando {0} a {1} de {2}'
  	        };

  				$('#PeopleTableContainer').jtable({
  					messages: spanishMessages,
  					paging: true,
  					pageSize: 10, //Set page size (default: 10)
  					selecting: false, //Enable selecting
  					actions: {
  						listAction: 'getData/list'
  					},
  					fields: {
  						id: {
  							key: true,
  							create: false,
  							edit: false,
  							list: false
  						},
  						nombre: {
  							title: 'Nombre',
  							width: '15%',
                			edit: true,
  						},
  						correo: {
  							title: 'Correo',
  							width: '15%',
                			edit: true,
  				
            			}
            		}
  				});

          $('#LoadRecordsButton').click(function (e) {
              e.preventDefault();
              $('#PeopleTableContainer').jtable('load', {
                  nombre:		$('#nombre').val(),
                  correo: 		$('#correo').val(),
              });
              $("#LoadRecordsButton").val('Hell unleashed!');
          });

          
        });
      </script>
@endsection