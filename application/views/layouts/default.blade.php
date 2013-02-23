<!DOCTYPE <html>
<head>
	<title>Bar Mô</title>
	<!-- Load bootstrapper -->
	{{ Asset::container('bootstrapper')->styles() }}
	{{ Asset::container('bootstrapper')->scripts() }}
	<!-- My Style -->
	{{ HTML::style('css/style.css') }}
	<!-- jQuery -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
</head>
<body id="wrap">
<!-- BEGIN NAVIGATION -->		
	<nav id="primary">
		<ul>
			<li>{{ HTML::link('/information', 'Principal') }}</li>
			<li>{{ HTML::link('/users', 'Usuarios') }}</li>
			<li>{{ HTML::link('/wines', 'Vinos') }}</li>
			<li><a href="#">Pinchos</a></li>
			<li><a href="#">Cervezas</a></li>
			<li><a href="#">Catering</a></li>
		</ul>
	</nav>
<!-- END NAVIGATION -->	
<!-- MESSAGE OR ERROR -->
	<!-- SCRIPT DE ANIMACION FadeTo -->
	<?php
		$message = Session::get('message');
		$error = Session::get('error');
	?>
	<!-- Mensaje de confirmacion -->
	<div class="container no-bs well" style="display:none">
		<a href='#' id="message">
			@if(isset($message))
				<script type="text/javascript">
					$('div.well').show().click( function(e){ 
						$('div.well').fadeTo(300,0, function() {
							$('section').fadeTo(150,0, function() {
								$('div.well').hide();
								$('section').fadeTo(150,1);
							});
						});
					});
				</script>
				{{ $message }}
			@endif
		</a>
	</div>
	<!-- Mensaje de error -->
	<div class="container no-bs wrong" style="display:none">
		<a href='#' id="error-message">
			@if(isset($error))
				<script type="text/javascript">
					$('div.wrong').show().click( function(e){ 
						$('div.wrong').fadeTo(300,0, function() {
							$('section').fadeTo(150,0, function() {
								$('div.wrong').hide();
								$('section').fadeTo(150,1);
							});
						});
					});
				</script>	
				{{ $error }}
			@endif
		</a>
	</div>
<!-- END MESSAGE -->

	@yield('content')
	@yield('picture')
	@yield('comments')

</body>
</html>