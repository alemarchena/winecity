<?php



	$ruta = '/home2/winecity/public_html/plataforma/';

	include($ruta . 'controladores/coneccion.php');


	$id  = $_POST['idreserva'];

	$emailbodega = $_POST['emailbodega'];
	$emailcopia = $_POST['emailcopia'];

	$titulo = $_POST['titulo'];

	$subtitulo = $_POST['subtitulo'];

	$cuerpo = $_POST['cuerpo'];



	mail($emailbodega, $titulo , $subtitulo . $cuerpo);
	mail($emailcopia, $titulo , $subtitulo . $cuerpo);

 	date_default_timezone_set('America/Argentina/Mendoza');
    
    $fho = new DateTime();
    $fechahoraoperativa= $fho->format('d-m-Y H:i');
	$mensaje = "Correo Enviado a: " . $emailbodega . " con copia a : " .  $emailcopia . " * " . $fechahoraoperativa . " Mensaje:" .  $titulo . "-" .  $subtitulo . "." . $cuerpo;
	//guarda en la base de datos cuando se mando el ultimo email.
	$sql = "update agendados set agendados.infoultimoemailbodega='$fechahoraoperativa' where agendados.id_agendado= $id";
	$resultado  = $cnx->query($sql);

	echo "$mensaje";
?>