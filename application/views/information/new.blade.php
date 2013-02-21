@layout('layouts.default')

@section('content')
<section>
	<h1 class="titulo">Creando nueva información</h1>
	
	{{ Form::open('information/add_new', 'POST', array('class' => "form")) }}

	<fieldset>
		{{ Form::label('title','Nuevo título: ') }} <br />
		{{ Form::text('title', Input::old('title')) }}
	</fieldset>
	<fieldset>
		{{ Form::label('description','Nueva descripción: ') }} <br />
		{{ Form::textarea('description', Input::old('description')) }}
	</fieldset>
	
	<p class="button"> {{ Form::submit('Añadir nuevo') }}
		{{ HTML::link_to_route('information', 'Atras') }}
	</p>
	
	{{ Form::close() }}

</section>
@endsection