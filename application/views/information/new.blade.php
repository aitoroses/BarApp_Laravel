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
	
	<div class="buttons-float">
		<p class="button">{{ HTML::link_to_route('information', 'Atras') }}</p>
		{{ Form::submit('Añadir nuevo', array('class'=>'btn btn-success')) }}
	</div>
	
	{{ Form::close() }}

</section>
@endsection