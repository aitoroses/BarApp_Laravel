@layout('layouts.default')

@section('content')
<section>
	<h1 class="titulo">Creando nuevo Pincho</h1>
	{{ Form::open_for_files('pinchos/add', 'POST', array('class' => "form")) }}

	<!-- Comprobamos si existen errores -->
	{{ render('pinchos.errors') }}

	<fieldset>
		{{ Form::label('name','Nombre: ') }} <br />
		{{ Form::text('name', Input::old('name')) }}
	</fieldset>
	<fieldset>
		{{ Form::label('description','Descripción: ') }} <br />
		{{ Form::textarea('description', Input::old('description')) }}
	</fieldset>
	<fieldset>
		{{ Form::label('link','Enlace: ') }} <br />
		{{ Form::text('link', Input::old('link')) }}
	</fieldset>
	<fieldset>
		{{ Form::label('access','Tipo de acceso: ') }} <br />
		{{ Form::select('access', array('Registrado' => 'Registrado', 'Sin registrar' => 'Sin registrar'), Input::old('description')) }}
	</fieldset>
	<fieldset>
		{{ Form::label('price','Precio: ') }} <br />
		{{ Form::text('price', Input::old('price')) }}
	</fieldset>
	<fieldset>
		{{ Form::label('image','Imagen del pincho: ') }} <br />
		{{ Form::file('image') }}
	</fieldset>
	
	<div class="buttons-float">
		<p class="button">{{ HTML::link_to_route('index_pinchos', 'Atras') }}</p>
		{{ Form::submit('Añadir nuevo', array('class'=>'btn btn-success')) }}
	</div>
	{{ Form::close() }}
</section>
@endsection