<!doctype html>

<html lang="en">

<head>

	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="css/estilo.css">

</head>

<footer>
	<div alert alert-dark" role="alert" align="center">
		<a title="Consulta Online" href="https://api.whatsapp.com/send?phone=5492616339555&text=Hola%20tengo%20una%20consulta"><img src="img/whatsapp.jpg" class="rounded float-center" alt="Consulta Online"  width="110" height="60"/a><br>
		<a title="Consulta Online" href="https://api.whatsapp.com/send?phone=5492616339555&text=Hola%20tengo%20una%20consulta"/>Consulta Online</a>
		
		<?php  if($cnx->connect_error){
			echo "<p class='mt-5 mb-3 text-muted mensajeservidor'>Estado: No conectado - WineCity &copy; 2018-2019</p>";
		}else
		{
			echo"<p class='mt-5 mb-3 text-muted mensajeservidor'>Estado : conectado - WineCity &copy; 2018-2019</p>";
		}?>
	</div>

</footer>

