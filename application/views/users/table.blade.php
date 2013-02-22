@layout('layouts.default')

@section('content')
<section>
	<h1 class="titulo">Usuarios Registrados</h1>
	<?php 
		$body = [];
		$id = 1;
		foreach ($users as $ele) {
			$row = array('id' => $id, 'name' => HTML::link_to_route('users_view', $ele->username, array($ele->id)), 'type' => $ele->type);
			$body[] = $row;
			$id = $id + 1;
		}
	/*
	<ul>

		@foreach($users as $ele)
			<li class="title"> {{ HTML::link_to_route('users_view', $ele->username, array($ele->id)) }} </li>
		@endforeach
	</ul>
	*/
	?>
	<div class="margins-normal">
		{{ Table::bordered_hover_open(); }}
		{{ Table::headers('#', 'Usuario', 'Privilegios'); }}
		{{ Table::body($body); }}
		{{ Table::open(); }}
	</div>
	<p class='button'> 
		{{ HTML::link_to_route('users_create', 'Añadir') }}
		{{ HTML::link_to_route('logout', 'Salir') }}
	</p>
</section>
@endsection