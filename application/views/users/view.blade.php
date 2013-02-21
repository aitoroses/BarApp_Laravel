@layout('layouts.default')

<!-- CONTENT SECTION -->

@section('content')
<section id='content'>
	<header><h1 class="small"> {{ $user->username }} </h1><header>
	<article class="text">

		<!-- Comprobamos si existen errores -->
		{{ render('users.errors') }}

		<p><em>Nombre:  </em>{{ $user->username }} </p>
		<p>
			{{ Form::open('users/update','PUT',array('class' => '')) }}
			<em> {{ Form::label('type','Privilegios: ') }} </em>
			{{ Form::select('type', array('administrador' => 'Administrador', 'normal' => 'Usuario', 'limitado' => 'Usuario limitado', 'excluido' => 'Usuario excluido'), $user->type) }}
			{{ Form::hidden('id', $user->id) }}
			{{ Form::submit('Guardar')}}
			{{ Form::close() }}
		</p>
		<p><small>Creado en: {{ $user->created_at }}</small></p>
		<p>
			<p class="button">
				{{ HTML::link_to_route('users_index', 'Atras') }}
				<!-- {{ HTML::link_to_route('users_edit', 'Editar', array($user->id)) }} -->
			</p>

			{{ Form::open('users/delete', 'DELETE', array('class' => 'form')) }}
			{{ Form::hidden('id', $user->id) }}
			{{ Form::submit('Eliminar') }}
			{{ Form::close() }}

			
		</p>
	</article>
	<script type="text/javascript">
			$('.form').submit(function(){

			    if (!confirm('Seguro que desea eliminar?')) { 
			        
			        return false; 
			    }
			});
	</script>
</section>
@endsection