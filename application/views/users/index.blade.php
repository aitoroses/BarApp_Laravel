@layout('layouts.default')

@section('content')
<section>
	<h1 class="titulo">Usuarios Registrados</h1>
	<ul>
		@foreach($users as $ele)
			<li class="title"> {{ HTML::link_to_route('users_view', $ele->username, array($ele->id)) }} </li>
		@endforeach
	</ul>
	<p class='button'> 
		{{ HTML::link_to_route('users_create', 'Añadir') }}
		{{ HTML::link_to_route('logout', 'Salir') }}
	</p>
</section>
@endsection