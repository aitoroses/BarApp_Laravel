@layout('layouts.default')

@section('content')
	<section>
	<h1 class="titulo"> Likes del Bar Mô </h1>
	<ul>
		@foreach($data as $ele)
			<li class="title"> {{ HTML::link_to_route('like', $ele->name, array($ele->id)) }} 
			</li>
		@endforeach
	</ul>
	<p class='button'> 
		{{ HTML::link_to_route('create_like', 'Añadir') }}
		{{ HTML::link_to_route('logout', 'Salir') }}
	</p>
</section>
@endsection