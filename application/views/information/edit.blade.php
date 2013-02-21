@layout('layouts.default')

@section('content')
<section>
	<h1 style='display: inline' class="titulo">Editando {{ $information->title }}</h1>
	
	{{ Form::open('information/update', 'PUT', array('class' => "form")) }}

	<fieldset>
		{{ Form::label('title','Título: ') }} <br />
		{{ Form::text('title', $information->title) }}
	</fieldset>
	<fieldset>
		{{ Form::label('description','Descripción: ') }} <br />
		{{ Form::textarea('description',$information->description) }}
	</fieldset>
	<div class="buttons-float">
		<p class="button">{{ HTML::link_to_route('information', 'Atras', array($information->id)) }}</p>
		{{ Form::hidden('id', $information->id) }}
		{{ Form::submit('Actualizar',  array('class'=>'btn btn-warning')) }}
		{{ Form::close() }}
	</div>
</section>
@endsection