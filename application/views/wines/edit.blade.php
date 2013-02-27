@layout('layouts.default')

@section('content')
<section id='content'>
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
		{{ Form::label('price','Precio: ') }} <br />
		{{ Form::text('price', $wine->price) }}
	</fieldset>
	<fieldset>
		{{ Form::label('image','Imagen del vino: ') }} <br />
		{{ Form::file('image') }}
	</fieldset>
	<div class="buttons-float">
	<p class="button"> {{ HTML::link_to_route('wines_index', 'Atras') }}</p>
	{{ Form::submit('Actualizar', array('class'=>'btn btn-warning')) }}
	{{ Form::hidden('id', $wine->id) }}
	</div>
	
	{{ Form::close() }}
</section>
@endsection



@section('picture')
<!-- PICTURE SECTION -->
<section id='picture'>
	{{ HTML::image('img/wines/'.$wine->picture) }}
</section>
@endsection