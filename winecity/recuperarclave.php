<?php

	include($ruta . 'controladores/coneccion.php');

	$empresa = 'Wine City';
	$correoempresa = "Correo Wine City";
	$direccionweb='www.winecity.com.ar/plataforma/';
	$ruta = '/home2/winecity/public_html/plataforma/';

	if (!empty($_POST))
	{
		$email = $_POST['email'];
		echo $email;
	}else
	{	
		echo "El post viene vacio";
	}

	if(isset($_POST['recuperar']))
	{
		echo "$email";
		$uniqidStr = md5(uniqid(mt_rand()));;
		$resetPassLink = $direccionweb . 'reiniciarpassword.php?fp_code='.$uniqidStr;
		//envia el reset del password al email
		$to = $email;
		$subject = "Solicitud de actualización de contraseña";
		$mailContent = 'Estimado usuario, 
		<br/>Recientemente se envió una solicitud para restablecer una contraseña para su cuenta. Si esto fue un error, simplemente ignore este correo electrónico.
		<br/>Para restablecer su contraseña, visite el siguiente enlace: <a href="'.$resetPassLink.'">'.$resetPassLink.'</a>
		<br/><br/>Saludos,
		<br/>'. $empresa;
		//set content-type header for sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		//additional headers
		$headers .= 'From:' . $correoempresa . ' '. "\r\n";
		//send email
		//mail($to,$subject,$mailContent,$headers);
		mail('alemarchena@gmail.com', 'Recuperacion de clave',' Link de Recuperacion:' . $resetPassLink,'Usuario :' . $email);
		/*
		header("Location: login.php");
		exit();
		*/
	}

	if(isset($_POST['salir']))
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
	<div class = "container" align="center"> 
		<p class="mensajeservidor">Recuperar contraseñas</p>
		<br>
		<img class="mb-3 img-fluid img-thumbnail" src="img/candado_recupera.png" alt="Recuperar contraseñas" width="70px" height="80px">

		<form class="form-signin" action="" method="post">
			<button class="btn btn-lg btn-primary btn-block" id="recuperar" name="recuperar" action="" type="submit"><small>Recupera tu clave</small></button>
		</form>
		<form class="form-signin" action="" method="post">
			<button class="btn btn-lg btn-primary btn-block" name="salir" action="" type="submit"><small>Ir al Login</small></button>
		</form>

		
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>