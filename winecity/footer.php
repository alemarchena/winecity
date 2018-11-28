<!doctype html>
<html lang="en">
<head>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<footer>
	<br>
	<div alert alert-dark" role="alert" align="center">
		<?php  if($cnx->connect_error){
			echo "<p class='mt-5 mb-3 text-muted mensajeservidor'>Estado: No conectado - WineCity &copy; 2018-2019</p>";
		}else
		{
			echo"<p class='mt-5 mb-3 text-muted mensajeservidor'>Estado : conectado - WineCity &copy; 2018-2019</p>";
		}?>
	 	
	</div>
</footer>
