<?php



	$ruta = '/home2/winecity/public_html/plataforma/';

	include($ruta . 'controladores/coneccion.php');


 	date_default_timezone_set('America/Argentina/Mendoza');


	$fecha  = $_POST['fecha'];
	$fho = strtotime($fecha);
    $fechahoraoperativa= $fho->format('d-m-Y H:i');
	
	echo "$fechahoraoperativa";
?>