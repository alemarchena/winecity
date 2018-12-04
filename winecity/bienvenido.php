<?php
	$ruta = '/home2/winecity/public_html/plataforma/';
	include($ruta . 'controladores/coneccion.php');
	
	if(isset($_POST['submit']))
	{
		session_destroy();
		header("Location: login.php");
		exit();
	}
?>
<head>
		<meta charset="utf-8">
		<title>Plataforma Web</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
		<!--LIBRERIA de BOOSTRAP -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


		<link href="css/signin.css" rel="stylesheet">
		<link href="css/estilo.css" rel="stylesheet">
</head>
<body>
	<div class = "container" align="center"> 
		<p>¡¡¡ FELICITACIONES, Ya eres parte de nuestra plataforma !!!"</p>
		<br>
		<img class="mb-3" src="img/usuarios.jpg" alt="Usuario Nuevo">

		<form class="form-signin" action="" method="post">
			<button class="btn btn-lg btn-primary btn-block" name="submit" action="" type="submit"><small>Ir al Login</small></button>
		</form>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
