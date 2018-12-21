<?php



	$ruta = '/home2/winecity/public_html/plataforma/';

	include($ruta . 'controladores/coneccion.php');



	$emailcliente = $_POST['emailcliente'];

	$titulo = $_POST['titulo'];

	$subtitulo = $_POST['subtitulo'];

	$cuerpo = $_POST['cuerpo'];



	mail($emailcliente, $titulo , $subtitulo . $cuerpo);

 	date_default_timezone_set('America/Argentina/Mendoza');
    
    $fho = new DateTime();
    $fechahoraoperativa= $fho->format('d-m-Y H:i:sP');
	$mensaje = "Correo Enviado el " . $fechahoraoperativa;
	
	echo "$mensaje";
?>