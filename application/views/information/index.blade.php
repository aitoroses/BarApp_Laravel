@layout('layouts.default')

@section('content')
<section>
	<h1 class="titulo">{{ $title }}</h1>
	<ul>
		@foreach($information as $ele)
			<li class="title"> {{ HTML::link_to_route('information', $ele->title, array($ele->id)) }} </li>
		@endforeach
	</ul>
	<p class='button'> 
		{{ HTML::link_to_route('create', 'Añadir') }}
		{{ HTML::link_to_route('logout', 'Salir') }}
	</p>
</section>
@endsection