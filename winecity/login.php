<?php
	$ruta = '/home2/winecity/public_html/plataforma/';
	include($ruta . 'controladores/coneccion.php');
	$respuesta = "";
	
	if(isset($_POST['submit']))
	{
		$email = $_REQUEST['email'];
		$clave = $_REQUEST['clave'];
			
		$resultado = $cnx->query("select * from usuarios where email_usuario = '$email' and clave_usuario ='$clave'");
		$fila = $cnx->affected_rows;

		if($fila > 0)
		{
			$_SESSION['active'] =1;
		    header("Location: index.php");
			exit();
		}else
		{
			$respuesta = "Verifique que su correo y su clave sean correctas";		
		}
	}

	if(isset($_POST['nuevousuario']))
	{
		header("Location: nuevousuario.php");
		exit();
	}
	if(isset($_POST['recuperarclave']))
	{
		$resultado = $cnx->query("select * from usuarios where email_usuario = '$email'");
		$fila = $cnx->affected_rows;

		if($fila > 0)
		{
			$email = $_REQUEST['email'];
			header("Location: recuperarclave.php");
			exit();
		}else
		{
			$respuesta = "Verifique que su correo sea correcto";		
		}
	}
?>
<head>
		<meta charset="utf-8">
		<title>Plataforma Web</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
		<!--LIBRERIA de BOOSTRAP -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

		<!--LIBRERIA PARA JQUERY -->
		<script>
			src="https://code.jquery.com/jquery-3.3.1.min.js";
			/*integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			crossorigin="anonymous">*/
		</script>
		
		<link href="css/signin.css" rel="stylesheet">
		<link href="css/estilo.css" rel="stylesheet">
</head>
<body>
	
	<div class = "container" >
		<br>
		<div class="offset-sm-4 col-sm-4 offset-md-4 col-md-4 offset-lg-4 col-lg-4" align="center">
				<form class="form-signin" action="" method="post">
					
					<img class="mb-3 img-fluid img-thumbnail" src="img/candado.png" alt="" width="40" height="40">
					<h1 class="h3 mb-3 font-weight-normal">Ingreso</h1>
					<div class="contenedorrespuesta" align="center">
						<?php  if($respuesta !="") echo "<p class='alert alert-warning mensajeservidor' role='alert'>$respuesta</p>"; ?>
					</div>
					
					<label for="inputEmail" class="sr-only">email</label>
					<input type="email"  name="email" id="inputEmail" class="form-control" placeholder="dirección de email" value="<?php  if(isset($email)) echo $email ?>" required autofocus>
					
					<br>

					<label for="inputPassword" class="sr-only">clave</label>
					<input type="password" id="inputPassword"  name="clave" class="form-control" placeholder="clave" value="<?php  if(isset($clave)) echo $clave ?>"required>

					<button class="btn btn-lg btn-primary btn-block" name="submit" action="" type="submit"><small>Ingresar</small></button>

			    </form>
			    <p>o bien</p>
			    <form action="nuevousuario.php" method="post">
			    	<button class="btn btn-lg btn-info" name="nuevousuario" type="submit"><small>Nuevo usuario</small></button>
			    </form>
			    <form action="recuperarclave.php" method="post">
			    	<button class="btn btn-lg btn-info" name="recuperarclave" type="submit"><small>¿Olvidó su clave?</small></button>
			    </form>
		</div>
		
		<?php
			include('footer.php');
		?>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>