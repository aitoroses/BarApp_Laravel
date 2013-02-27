@layout('layouts.default')

@section('content')
	<section id='content'>
	<h1 class="titulo"> Editando {{ $data->name }}</h1>
	{{ Form::open_for_files('gins/update', 'PUT', array('class' => "form")) }}

	<!-- Comprobamos si existen errores -->
	{{ render('gins.errors') }}

	<fieldset>
		{{ Form::label('name','Nombre: ') }} <br />
		{{ Form::text('name', $data->name) }}
	</fieldset>
	<fieldset>
		{{ Form::label('description','Descripción: ') }} <br />
		{{ Form::textarea('description', $data->description) }}
	</fieldset>
	<fieldset>
		{{ Form::label('price','Precio: ') }} <br />
		{{ Form::text('price', $data->price) }}
	</fieldset>
	<fieldset>
		{{ Form::label('image','Imagen del gin: ') }} <br />
		{{ Form::file('image') }}
	</fieldset>
	<div class="buttons-float">
	<p class="button"> {{ HTML::link_to_route('index_gins', 'Atras') }}</p>
	{{ Form::submit('Actualizar', array('class'=>'btn btn-warning')) }}
	{{ Form::hidden('id', $data->id) }}
	</div>
	
	{{ Form::close() }}
</section>
@endsection

@section('picture')
<!-- PICTURE SECTION -->
<section id='picture'>
	{{ HTML::image('img/gins/'.$data->picture) }}
</section>
@endsection