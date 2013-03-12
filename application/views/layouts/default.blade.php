<!DOCTYPE <html>
<head>
	<title>Bar Mô</title>
	<meta name = "viewport" content = "width=device-width, maximum-scale = 1, minimum-scale=1" />
	<!-- Load bootstrapper -->
	{{ Asset::container('bootstrapper')->styles() }}
	{{ Asset::container('bootstrapper')->scripts() }}
	<!-- My Style -->
	{{ HTML::style('css/style.css') }}
	<!-- jQuery -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	{{ HTML::script('js/bootstrap.js') }}
</head>
<body id="wrap">
	
<!-- BEGIN NAVIGATION -->		
	<nav id="primary">
		<ul>
			<li>{{ HTML::link('/information', 'Principal') }}</li>
			<li>{{ HTML::link('/users', 'Usuarios') }}</li>
			<li>{{ HTML::link('/wines', 'Vinos') }}</li>
			<li>{{ HTML::link('/pinchos', 'Pinchos') }}</li>
			<li>{{ HTML::link('/gins', 'Gin tonics') }}</li>
			<li>{{ HTML::link('/likes', 'Nos gusta') }}</li>
			<script type="text/javascript">
				$('.disabled').popover();
				$('.disabled').click(function(){
					//alert('Enlace deshabilitado por mantenimiento');
					$(this).popover();
				});
			</script>
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