<?php 
	$emailwc = "wgalimberti@winecity.com.ar";
	$nombre = $_POST["nombre"];
	$email = $_POST["email"];
	$telefono = $_POST["telefono"];
	$mensaje = $_POST["mensaje"];

	$titulo = "Mensaje Web";
	$subtitulo = "Contacto online ";
	


	$cuerpo = "Nombre: " . $nombre . ", Email: " . $email . ", Teléfono: " . $telefono . " - Mensaje: " . $mensaje;

	mail($emailwc, $titulo , $subtitulo . $cuerpo);

	echo "Enviado correctamente";
?>