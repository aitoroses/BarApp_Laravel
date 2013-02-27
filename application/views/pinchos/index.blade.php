@layout('layouts.default')

@section('content')
	<section>
	<h1 class="titulo"> Pinchos del Bar Mô </h1>
	<ul>
		@foreach($data as $ele)
			<li class="title"> {{ HTML::link_to_route('pincho', $ele->name, array($ele->id)) }} 
			</li>
		@endforeach
	</ul>
	<p class='button'> 
		{{ HTML::link_to_route('create_pincho', 'Añadir') }}
		{{ HTML::link_to_route('logout', 'Salir') }}
	</p>
</section>
@endsection