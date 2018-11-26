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
	<script
		src="https://code.jquery.com/jquery-3.3.1.min.js"
		integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
		crossorigin="anonymous">;
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
	
		<div class="row rounded p-3 mb-2 bg-info text-dark" align="center">
			<div class="col-sm-2 img-fluid img-thumbnail">
				<div>
					<p class="mensajeservidor">Panel de control</p>
				</div>
				<div>
					<img src="img/logo-web.jpg" class="col-sm-2 img-fluid img-thumbnail d-none d-lg-block" alt="Wine City" font-family: 'Patrick Hand', cursive>
				</div>
			</div>
			
			<div class="col-sm-2">
				<a class="btn btn-light btn-block" id="inicio" ref="#"><small>Inicio</small></a>
			</div>

			<div class="col-sm-3">
				<a class="btn btn-light btn-block" id="servicios" ref="#"><small>Servicios</small></a>
			</div>
			<div class="col-sm-3">
				<a class="btn btn-light btn-block" id="agenda" ref="#"><small>Agenda</small></a>
			</div>
			<div class="col-sm-2">
				
			<form class="form-signin" action="" method="post">
				<button class="btn btn-light btn-block" name="submit" action="" type="submit"><small>Salir</small></button>
			</form>

			</div>
			
		</div>
		<div class="container" align="center">
			<div id="contenedor" ref="#" class="contenedor" align="center">
					<!--Aqui se insertan las pantallas -->
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