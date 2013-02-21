@layout('layouts.default')

@section('content')
<section>
	<h1 class="titulo">Creando nuevo Vino</h1>
	{{ Form::open_for_files('wines/add_new', 'POST', array('class' => "form")) }}

	<!-- Comprobamos si existen errores -->
	{{ render('wines.errors') }}

	<fieldset>
		{{ Form::label('name','Nombre: ') }} <br />
		{{ Form::text('name', Input::old('name')) }}
	</fieldset>
	<fieldset>
		{{ Form::label('description','Descripción: ') }} <br />
		{{ Form::textarea('description', Input::old('description')) }}
	</fieldset>
	<fieldset>
		{{ Form::label('category','Categoria: ') }} <br />
		{{ Form::select('category', array('Cosecha' => 'Cosecha', 'Crianza' => 'Crianza', 'Reserva' => 'Reserva', 'Gran Reserva' => 'Gran Reserva'), Input::old('category')) }}
	</fieldset>
	<fieldset>
		{{ Form::label('rating','Valoracion: ') }} <br />
		{{ Form::select('rating', array('Excelente' => 'Excelente', 'Muy Bueno' => 'Muy Bueno', 'Bueno' => 'Bueno', 'Aceptable' => 'Aceptable'), Input::old('rating')) }}
	</fieldset>
	<fieldset>
		{{ Form::label('price','Precio: ') }} <br />
		{{ Form::text('price', Input::old('price')) }}
	</fieldset>
	<fieldset>
		{{ Form::label('image','Imagen del vino: ') }} <br />
		{{ Form::file('image') }}
	</fieldset>
	
	<div class="buttons-float">
		<p class="button">{{ HTML::link_to_route('wines_index', 'Atras') }}</p>
		{{ Form::submit('Añadir nuevo', array('class'=>'btn btn-success')) }}
	</div>
	{{ Form::close() }}
</section>
@endsection