<!DOCTYPE html>
<html>
<head>
<meta lang="es" charset="utf-8" />
<title>Logueate en Mô</title>
{{ HTML::style('login/css/style.css') }}
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
{{ HTML::script('login/js/check.js') }}
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> 
<![endif]-->
</head>
<body>
	<div id="blocks">
	<header><h1 class="titulo">Bar Mô</h1></header>
		<section>
			<header><h1 class="script">Login de usuario</h1></header>
				{{ Form::open('/verify','POST', array('id' => "login")) }}
				<!--<form id="login" action="verify.php" method="post">-->
					<fieldset>
						<label for="usuario">Usuario</label>
						<input type="text" class="edit" id="usuario" name="username" placeholder="Nombre de usuario" required />
					</fieldset>
					<fieldset>
						<label for="password">Password</label>
						<input type="password" class="edit" id="password" name="password" placeholder="Password" required />
					</fieldset>
					<fieldset class="submit">
						<p id="logstate">
						</p>
						<input type="submit" name="submit" value="Entrar"/>
					</fieldset> 
				</form>
		</section>
	</div>
	<div class="date">
		<p><script> document.write(new Date()) </script> </p>
	</div>
</body>
</html>