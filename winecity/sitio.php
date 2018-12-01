<?php

	$ruta = '/home2/winecity/public_html/plataforma/';

	include($ruta . 'controladores/coneccion.php');

	

	//valida si el usuario realmente inicio sesion, sino lo re dirije al login

	if($_SESSION['active'] ==0){

		session_destroy();

		header("Location: login.php");

		exit();

	}



	if(isset($_POST['submit']))

	{

		$_SESSION['active'] =0;

		header("Location: login.php");

		exit();

	}



?>

<head>

	<meta charset="utf-8">

	<title>Plataforma Wine City</title>

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

	<!--LIBRERIA de BOOSTRAP -->

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">



	<!--LIBRERIA PARA JQUERY -->

	<script
		src="https://code.jquery.com/jquery-3.3.1.min.js"
		integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
		crossorigin="anonymous">
	</script>

	

	<link href="css/estilo.css" rel="stylesheet">

	<style>

		figure {

	        margin: 10px 20px !important; 

	    }



	    .img-fluid {

	      max-width: 100%;

	      height: auto;

	    }

    </style>

</head>

<body>

	<div>

	<nav class="navbar navbar-expand-lg navbar-light bg-primary">

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">

			<span class="navbar-toggler-icon"></span>

		</button>

		<div class="collapse navbar-collapse" id="navbarTogglerDemo01">

			<form method="POST" action="" class="form-inline my-2 my-lg-0">

				<button type="button" class="btn btn-light my-2 my-sm-2" id="inicio" ref="#">Inicio</button>

				<button type="button" class="btn btn-light my-2 my-sm-2" id="servicios" ref="#">Servicios</button>

				<button type="button" class="btn btn-light my-2 my-sm-2" id="agenda" ref="#">Agenda</button>

				<button type="submit" class="btn btn-light my-2 my-sm-2" name="submit">Salir</button>

			</form>

		</div>

	</nav>


	<div id="contenedor" ref="#" class="contenedor" align="center">

			<!--Aqui se insertan las pantallas -->

			<br>
			<p class="mensajeservidor" align="center">Accede al menú.</p>
			<br>
			<p class="mensajeservidor" align="center">PANEL DE CONTROL</p>
			<br>

			<img src="img/logo-web.jpg" class="img-fluid img-thumbnail" alt="Panel Wine City">
	</div>

	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>



	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>



<script>

	$(document).ready(function()

	{

		$("#inicio").click(function(){

	       location.href= window.location.href;

	    });



	    $("#servicios").click(function(){

	        $("#contenedor").load("servicios.php");

	    });



	   $("#agenda").click(function(){

	        $("#contenedor").load("agenda.php");

	    });



	  

	});

</script>