<section id='comments'>
	<header><h1 class="small"> Comentarios </h1></header>
	<!-- Comments -->
	<ul>
		@foreach($comments as $ele)
		<article>
			<header>
				<hgroup>
					<h1>{{ $ele->title }}</h1>

					<h2>{{ Comment::find($ele->id)->user()->first()->username }}</h2>
					<h3>
						<?php 
							$rating = $ele->rating;
							for ($i=0; $i < $rating; $i++) { 
								echo HTML::image('img/star.png');
							}
						?>
					</h3>

				</hgroup>
			</header>
			<aside>
				{{ $ele->comment }} </br>
				<span> Creado: {{ $ele->created_at}} </span>
			</aside>
			<!-- Delete form -->
			{{ Form::open('comments/delete', 'DELETE') }}
			{{ Form::hidden('id', $ele->id) }}
			{{ Form::submit('Borrar', array('class'=>'btn btn-danger')) }}
			{{ Form::close() }}	
		</article>
		@endforeach
	</ul>
	<!-- Buttons -->
	<div>
		<p class='button'> 
			<!-- {{ HTML::link_to_route('index', 'Añadir') }} -->
			<!-- {{ HTML::link_to_route('index', 'Salir') }} -->
		</p>
	</div>
		<!-- Script show/hide -->
		<script	type="text/javascript">
			$('#comments button').hide();
			$('#comments article').hover(function(){$(this).find('button').fadeIn(500)}, function(){$(this).find('button').fadeOut(500)});
		</script>
		<!-- Script POST AJAX Submit -->
		<script type="text/javascript">
			$('#comments article button').click(function(){
				var article = $(this).parent().parent();
				var duration = 300;
				$(article).fadeTo(duration,0, function(){setTimeout(function(){$(article).hide()}, duration)});
	    		var frm = $(article).find('form');
			    frm.submit(function () {
			        $.ajax({
			            type: frm.attr('method'),
			            url: frm.attr('action'),
			            data: frm.serialize(),
			            success: function (data) {
			                setTimeout(function(){$(article).remove()}, duration*2);
			            },
			            error: function (data) {
			            	setTimeout(function(){$(article).show()}, duration*2);
			            }
			        });

			        return false;
			   	});

		    });
		</script>
</section>