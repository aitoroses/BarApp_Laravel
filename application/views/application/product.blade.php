<!DOCTYPE html>
<head>
	<title>Mô</title>
	<meta charset="utf-8" />
	<meta name = "viewport" content = "width=device-width, maximum-scale = 1, minimum-scale=1" />

	{{ HTML::script('item/js/underscore-min.js') }}
	{{ HTML::script('item/js/zepto.min.js') }}
	{{ HTML::script('item/js/backbone-min.js') }}
	{{ HTML::script('item/js/scripts.js') }}
	{{ HTML::style('item/css/style.css') }}

</head>
<body data-item='{"product": "{{$product}}", "id": "{{$id}}"}'>
	
	<div id="wrapper">
		
		<header id="header">
			<h1>Header</h1>
		</header>
		<section id="main">
			<div id="content">
				<h1 class="title">Vacio</h1>
				<div class="container">
					<div class="pic"><img src="/laravel/public/item/img/default.jpg"></div>
					<div class="info">
						<p>Categoria: <span class="category optional"></span></p>
						<p>Precio: <span class="price">999€</span></p>
					</div>
				</div>
				<div class="description">
					<h1 class="minihead">Descripción</h1>
					<p>El {{$product}} que pides no existe</p>
				</div>
			    
			</div>
		</section>
		<section id="comments">
			<h1 class="minihead">Comentarios</h1>
			<article id="comment-template" style="display:none">
				<div class="container">
					<div class="column-one">
						<h1><%= name %></h1>	
					</div>
					<div class="column-two">
						<%= comment %>
					</div>
				</div>
			</article>
		</section>
		<footer id="footer">
			<div class="container">
				<h1 class="minihead">Haz un comentario</h1>
				<input id="user" type="hidden" value="">
				<textarea id="textarea" class="text container"></textarea>
				
				<div class="container">
					<div class="rating">
						<div>1</div>
						<div>2</div>
						<div>3</div>
						<div>4</div>
						<div>5</div>
					</div>
					<div class="btn">Comentar</div>
				</div>

			</div>
		</footer>

	</div>

</body>
</html>