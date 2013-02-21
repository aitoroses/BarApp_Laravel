@layout('layouts.default')

@section('content')
<section>
	<h1 class="titulo">Creando nuevo Usuario</h1>
	{{ Form::open_for_files('users/add_new', 'POST', array('class' => "form")) }}

	<!-- Comprobamos si existen errores -->
	{{ render('users.errors') }}

	<fieldset>
		{{ Form::label('username','Nombre: ') }} <br />
		{{ Form::text('username', Input::old('username')) }}
	</fieldset>
	<fieldset>
		{{ Form::label('password','Contraseña: ') }} <br />
		{{ Form::text('password', Input::old('password')) }}
	</fieldset>
	<fieldset>
		{{ Form::label('type','Tipo: ') }} <br />
		{{ Form::select('type', array('administrador' => 'Administrador', 'normal' => 'Usuario', 'limitado' => 'Usuario limitado', 'excluido' => 'Usuario excluido'), Input::old('type')) }}
	</fieldset>
	
	<div class="buttons-float">
		<p class="button">{{ HTML::link_to_route('users_index', 'Atras') }}</p>
		{{ Form::submit('Añadir nuevo') }}
	</div>
	
	{{ Form::close() }}
</section>
@endsection