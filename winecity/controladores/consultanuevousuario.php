<?php
	$emailAvisoNuevoUsuario='alemarchena@gmail.com';
	$ruta = '/home2/winecity/public_html/plataforma/';
	include($ruta . 'controladores/coneccion.php');

	$respuesta = "";

	if(isset($_POST['guardar']))
	{
		$nombre = $_POST['nombrenuevo'];
		$email = $_POST['emailnuevo'];
		$clave = $_POST['clavenueva'];

		$resultado = $cnx->query("select * from usuarios where email_usuario = '$email'");
		$fila = $cnx->affected_rows;

		if($fila > 0)
		{
			$respuesta = "El usuario ya existe";		
		}else
		{
			$respuesta = "";
			$resultado = $cnx->query("insert into usuarios (nombre_usuario, email_usuario, clave_usuario) VALUES ('$nombre','$email','$clave')");
			$fila = $cnx->affected_rows;
			if($fila > 0)
			{
				$_SESSION['active'] =0;
				mail($emailAvisoNuevoUsuario, 'Nuevo usuario:' . $nombre . ' - ', $nombre . ' se agrego a la plataforma,' . 'con el usuario:' . $email);
			    header("Location: bienvenido.php");
				exit();
			}else
			{
				$respuesta = "Algo no funcionó con la creación";
			}
			exit();	
		}
	}

	if(isset($_POST['login']))
	{
		header("Location: login.php");
		exit();
	}
?>