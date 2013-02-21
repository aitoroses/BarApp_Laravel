@layout('layouts.default')

@section('content')
<section>
	<h1 class="titulo"> Vinos del Bar Mô </h1>
	<ul>
		@foreach($wines as $ele)
			<li class="title"> {{ HTML::link_to_route('wine', $ele->name, array($ele->id)) }} 
			</li>
		@endforeach
	</ul>
	<p class='button'> 
		{{ HTML::link_to_route('wines_create', 'Añadir') }}
		{{ HTML::link_to_route('logout', 'Salir') }}
	</p>
</section>
@endsection