<?php



	$ruta = '/home2/winecity/public_html/plataforma/';

	include($ruta . 'controladores/coneccion.php');


	$id  = $_POST['idreserva'];

	$emailcliente = $_POST['emailcliente'];

	$titulo = $_POST['titulo'];

	$subtitulo = $_POST['subtitulo'];

	$cuerpo = $_POST['cuerpo'];



	mail($emailcliente, $titulo , $subtitulo . $cuerpo);

 	date_default_timezone_set('America/Argentina/Mendoza');
    
    $fho = new DateTime();
    $fechahoraoperativa= $fho->format('d-m-Y H:i');
	$mensaje = "Correo Enviado a: " . $emailcliente . ",el " . $fechahoraoperativa . " Mensaje:" .  $titulo . "-" .  $subtitulo . "." . $cuerpo;
	//guarda en la base de datos cuando se mando el ultimo email.
	$sql = "update agendados set agendados.infoultimoemail='$fechahoraoperativa' where agendados.id_agendado= $id";
	$resultado  = $cnx->query($sql);

	echo "$mensaje";
?>