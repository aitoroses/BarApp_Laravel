@layout('layouts.default')

@section('content')
<section id='content
'>
	<h1 class="titulo"> Editando {{ $wine->name }}</h1>
	{{ Form::open_for_files('wines/update', 'PUT', array('class' => "form")) }}

	<!-- Comprobamos si existen errores -->
	{{ render('wines.errors') }}

	<fieldset>
		{{ Form::label('name','Nombre: ') }} <br />
		{{ Form::text('name', $wine->name) }}
	</fieldset>
	<fieldset>
		{{ Form::label('description','Descripción: ') }} <br />
		{{ Form::textarea('description', $wine->description) }}
	</fieldset>
	<fieldset>
		{{ Form::label('category','Categoria: ') }} <br />
		{{ Form::select('category', array('Cosecha' => 'Cosecha', 'Crianza' => 'Crianza', 'Reserva' => 'Reserva', 'Gran Reserva' => 'Gran Reserva'), $wine->category) }}
	</fieldset>
	<fieldset>
		{{ Form::label('rating','Valoracion: ') }} <br />
		{{ Form::select('rating', array('Excelente' => 'Excelente', 'Muy Bueno' => 'Muy Bueno', 'Bueno' => 'Bueno', 'Aceptable' => 'Aceptable'), $wine->rating) }}
	</fieldset>
	<fieldset>
		{{ Form::label('price','Precio: ') }} <br />
		{{ Form::text('price', $wine->price) }}
	</fieldset>
	<fieldset>
		{{ Form::label('image','Imagen del vino: ') }} <br />
		{{ Form::file('image') }}
	</fieldset>
	
	<p class="button"> {{ Form::submit('Actualizar') }}
		{{ HTML::link_to_route('wines_index', 'Atras') }}
		{{ Form::hidden('id', $wine->id) }}
	</p>
	
	{{ Form::close() }}
</section>
@endsection



@section('picture')
<!-- PICTURE SECTION -->
<section id='picture'>
	{{ HTML::image('img/wines/'.$wine->picture) }}
</section>
@endsection