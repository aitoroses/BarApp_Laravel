@layout('layouts.default')

@section('content')
<section id='content'>
	<header><h1 class="small"> {{ $data->name }} </h1></header>
	<article class="text">
		<p><em>Descripción:  </em>{{ $data->description }} </p>
		<p><em>Enlace:  </em>{{ $data->link }} </p>
		<p><em>Acceso:  </em>{{ $data->access }} </p>

		<p><em>Precio: </em><span class='important'>{{ $data->price }} €</span></p>

		<p><small>Ultima actualizacion: {{ $data->updated_at }}</small></p>
		<div class="buttons-float">
			<p class="button">
				{{ HTML::link_to_route('index_pinchos', 'Atras') }}
				{{ HTML::link_to_route('edit_pincho', 'Editar', array($data->id)) }} 
			</p>

			{{ Form::open('pinchos/delete', 'DELETE', array('class' => 'form')) }}
			{{ Form::hidden('id', $data->id) }}
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
	{{ HTML::image('img/pinchos/'.$data->picture) }}

</section>
@endsection

@section('comments')
	@include('common.comments')
@endsection