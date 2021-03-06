<?php
	$ruta = '/home2/winecity/public_html/plataforma/';
	include($ruta . 'controladores/coneccion.php');

	//valida si el usuario realmente inicio sesion, sino lo re dirije al login
	if($_SESSION['active'] ==0)
	{
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
	<link rel="icon" type="img/png" href="/plataforma/img/logowinecity.png" />
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<!--LIBRERIA de BOOSTRAP -->

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

	<!--LIBRERIA PARA JQUERY -->
	<link href="css/estilo.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/agenda.css">

	<script
		src="https://code.jquery.com/jquery-3.3.1.min.js"
		integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
		crossorigin="anonymous">
	</script>

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
<header>
<!-- librerias para el calendario-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">

<link rel="stylesheet" href="css/clockpicker.css">

<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="js/jquery-clockpicker.js"></script>

<script src="js/bootstrap-clockpicker.js"></script>

<script src="js/highlight.min.js"></script>

<script src="js/html5shiv.js"></script>

<script src="js/respond.min.js"></script>

<script src="js/moment.js"></script>

</header>


	<div>
		<nav class="navbar navbar-expand-lg navbar-light bg-primary">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
				<form method="POST" action="" class="form-inline my-2 my-lg-0">
					<div class="btn-group mr-2" role="group" aria-label="Second group">
						<button type="button" class="btn btn-light my-2 my-sm-2" id="inicio" ref="#">Inicio</button>
						<button type="button" class="btn btn-light my-2 my-sm-2" id="panel" ref="#">Panel</button>
						<button type="button" class="btn btn-light my-2 my-sm-2" id="agenda" ref="#">Agenda</button>
					</div>

					<div class="btn-group" role="group" aria-label="Third group">
						<button type="submit" class="btn btn-light my-2 my-sm-2" name="submit">Salir</button>
					</div>
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
				<img src="img/wc.png" class="img-fluid img-thumbnail" alt="Panel Wine City">

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



	    $("#panel").click(function(){

	        $("#contenedor").load("panel.php");

	    });



	   $("#agenda").click(function(){

	        $("#contenedor").load("agenda.php");

	    });

	});

</script>