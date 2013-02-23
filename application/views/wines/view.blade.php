@layout('layouts.default')

<!-- CONTENT SECTION -->

@section('content')
<section id='content'>
	<header><h1 class="small"> {{ $wine->name }} </h1></header>
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
			{{ Form::submit('Eliminar', array('class'=>'btn btn-danger'))}}
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

@section('comments')
<section id='comments'>
	<header><h1 class="small"> Comentarios </h1></header>
	<!-- Comments -->
	<ul>

		@foreach($comments as $ele)
		<article>
			<header>
				<hgroup>
					<h1>Comentario</h1>
					<h2>{{$ele->username}}</h2>
				</hgroup>
			</header>
			<aside>{{ $ele->comment }}</aside>
		</article>
		@endforeach
		<article>
			<header><h1>Primer comentario</h1></header>
			<aside>Esta es la descripcion de este primer comentario y hay que hacer un poco de 
				lorem impsum ñam ñam ñam ñam ñam ñam ñam ñam ñam ñam ñam ñam ñam ñam </aside>
		</article>
		<article>
			<header>
				<hgroup>
					<h1>segundisimo comentario</h1>
					<h2>Usuario1</h2>
				</hgroup>
			</header>
			<aside>Esta es la descripcion de este segundisimo comentario y hay que hacer un poco de 
				lorem impsum ñam ñam ñam ñam ñam ñam ñam ñam ñam ñam ñam ñam ñam ñam </aside>
		</article>
		<article>
			<header><h1>tercer comentario</h1></header>
			<aside>Esta es la descripcion de este tercer comentario y hay que hacer un poco de 
				lorem impsum ñam ñam ñam ñam ñam ñam ñam ñam ñam ñam ñam ñam ñam ñam
				 Esta es la descripcion de este tercer comentario y hay que hacer un poco de 
				lorem impsum ñam ñam ñam ñam ñam ñam ñam ñam ñam ñam ñam ñam ñam ñam 
			</aside>
		</article>
	</ul>
	<!-- Buttons -->
	<div>
		<p class='button'> 
			{{ HTML::link_to_route('index', 'Añadir') }}
			{{ HTML::link_to_route('index', 'Salir') }}
		</p>
	</div>
</section>
@endsection