@layout('layouts.default')

<!-- CONTENT SECTION -->

@section('content')
<section id='content'>
	<header><h1 class="small"> {{ $wine->name }} </h1><header>
	<article class="text">
		<p><em>Descripción:  </em>{{ $wine->description }} </p>
		<p><em>Categoria: </em>{{ $wine->category }} </p>
		<p><em>Valoracion: </em>{{ $wine->rating }} </p>
		<p><em>Precio: </em><span class='important'>{{ $wine->price }} €</span></p>

		<p><small>Ultima actualizacion: {{ $wine->updated_at }}</small></p>
		<div class="buttons-float">
			<p class="button">
				{{ HTML::link_to_route('wines_index', 'Atras') }}
				{{ HTML::link_to_route('edit_wine', 'Editar', array($wine->id)) }} 
			</p>

			{{ Form::open('wines/delete', 'DELETE', array('class' => 'form')) }}
			{{ Form::hidden('id', $wine->id) }}
			{{ Form::submit('Eliminar') }}
			{{ Form::close() }}

			
		</div>
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

<!-- PICTURE SECTION -->

@section('picture')
<section id='picture'>
	{{ HTML::image('img/wines/'.$wine->picture) }}

</section>

@endsection