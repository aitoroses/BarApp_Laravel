@layout('layouts.default')

@section('content')
	<section id='content'>
	<h1 class="titulo"> Editando {{ $data->name }}</h1>
	{{ Form::open_for_files('pinchos/update', 'PUT', array('class' => "form")) }}

	<!-- Comprobamos si existen errores -->
	{{ render('pinchos.errors') }}

	<fieldset>
		{{ Form::label('name','Nombre: ') }} <br />
		{{ Form::text('name', $data->name) }}
	</fieldset>
	<fieldset>
		{{ Form::label('description','Descripción: ') }} <br />
		{{ Form::textarea('description', $data->description) }}
	</fieldset>
	<fieldset>
		{{ Form::label('access','Tipo de acceso: ') }} <br />
		{{ Form::select('access', array('Registrado' => 'Registrado', 'Sin registrar' => 'Sin registrar'), $data->access) }}
	</fieldset>
	<fieldset>
		{{ Form::label('link','Enlace: ') }} <br />
		{{ Form::text('link', $data->link) }}
	</fieldset>
	<fieldset>
		{{ Form::label('price','Precio: ') }} <br />
		{{ Form::text('price', $data->price) }}
	</fieldset>
	<fieldset>
		{{ Form::label('image','Imagen del pincho: ') }} <br />
		{{ Form::file('image') }}
	</fieldset>
	<div class="buttons-float">
	<p class="button"> {{ HTML::link_to_route('index_pinchos', 'Atras') }}</p>
	{{ Form::submit('Actualizar', array('class'=>'btn btn-warning')) }}
	{{ Form::hidden('id', $data->id) }}
	</div>
	
	{{ Form::close() }}
</section>
@endsection

@section('picture')
<!-- PICTURE SECTION -->
<section id='picture'>
	{{ HTML::image('img/pinchos/'.$data->picture) }}
</section>
@endsection