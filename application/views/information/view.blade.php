@layout('layouts.default')

@section('content')
<section>
	<header><h1 class="small"> {{ $information->title }} </h1></header>
	<article class="text">
		<p> {{ $information->description }} </p>
		<p><small>Ultima actualizacion: {{ $information->updated_at }}</small></p>
		<div class="buttons-float">
			<p class="button">
				{{ HTML::link_to_route('information', 'Atras') }}
				{{ HTML::link_to_route('edit_info', 'Editar', array($information->id)) }} 
			</p>
			{{ Form::open('information/delete', 'DELETE', array('class' => 'form')) }}
			{{ Form::hidden('id', $information->id) }}
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