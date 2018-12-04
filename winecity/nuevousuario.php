<?php
	$emailAvisoNuevoUsuario='alemarchena@gmail.com';
	$ruta = '/home2/winecity/public_html/plataforma/';
	include($ruta . 'controladores/coneccion.php');

	$respuesta = "";

	if(isset($_POST['guardar']))
	{
		$nombre = $_POST['nombrenuevo'];
		$email = $_POST['emailnuevo'];
		$clave = $_POST['clavenueva'];

		$resultado = $cnx->query("select * from usuarios where email_usuario = '$email'");
		$fila = $cnx->affected_rows;

		if($fila > 0)
		{
			$respuesta = "El usuario ya existe";		
		}else
		{
			$respuesta = "";
			$resultado = $cnx->query("insert into usuarios (nombre_usuario, email_usuario, clave_usuario) VALUES ('$nombre','$email','$clave')");
			$fila = $cnx->affected_rows;
			if($fila > 0)
			{
				$_SESSION['active'] =0;
				mail($emailAvisoNuevoUsuario, 'Nuevo usuario:' . $nombre . ' - ', $nombre . ' se agrego a la plataforma,' . 'con el usuario:' . $email);
			    header("Location: bienvenido.php");
				exit();
			}else
			{
				$respuesta = "Algo no funcionó con la creación";
			}
			exit();	
		}
	}

	if(isset($_POST['login']))
	{
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
			crossorigin="anonymous">
		</script>
		
		<link href="css/signin.css" rel="stylesheet">
		<link href="css/estilo.css" rel="stylesheet">
</head>
<body>
	<div class = "container" >
	<div class="offset-sm-4 col-sm-4 offset-md-4 col-md-4 offset-lg-4 col-lg-4" align="center">
		<form class="form-signin" action="" method="post">
			
			<img class="mb-3  img-fluid img-thumbnail" src="img/candado.jpg" alt="" width="40" height="40">
				
			<h1 class="h3 mb-3 font-weight-normal">Nuevo usuario</h1>
			<div class="contenedorrespuesta" align="center">
				<div align="center">
					<?php  if($respuesta !="") echo "<p class='alert alert-warning mensajeservidor' role='alert'>$respuesta</p>"; ?>
				</div>
			</div>

			<div class="row">
			    <div class="col">
			      <input type="text" id="nombrenuevo" name="nombrenuevo" class="form-control" placeholder="Nombre de la cuenta" value="<?php  if(isset($nombre)) echo $nombre ?>"><span id="faltanombre">Escribe un nombre</span>
			    </div>
		  	</div>
			<br>
			<label for="inputEmail" class="sr-only">email</label>
			<input type="email"  name="emailnuevo" id="inputEmail" class="form-control" placeholder="dirección de email" value="<?php  if(isset($email)) echo $email ?>" required autofocus>
			<br>
			<label for="inputPassword" class="sr-only">clave</label>
			<input type="password" id="inputPassword"  name="clavenueva" class="form-control" placeholder="clave de 8 caracteres"  size="8" value="<?php  if(isset($clavenueva)) echo $clavenueva ?>"required>
			<br>
			<label for="inputPassword" class="sr-only">repita la clave</label>
			<input type="password" id="inputPassword1"  name="clave1" class="form-control" placeholder="clave"  size="8" value="<?php  if(isset($clave1)) echo $clave1 ?>"required>

			
			<button class="btn btn-lg btn-primary btn-block" id="guardar" name="guardar" action="" type="submit"><small>Guardar</small></button>
			
    	</form>
    
	    <p>o bien</p>
	    
	    <form action="login.php" method="post">
	    	<button class="btn btn-lg btn-info" name="login" type="submit"><small>ir a Login</small></button>
	    </form>

	    <!--
	    <form class="form-signin" name="correo" action="" method="post">
	    	<button>Enviar email</button>
	    </form>
		-->

		<?php
			include('footer.php');
		?>
	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
<script>
$(document).ready(function() {
	//variables
	var pass1 = $('[name=clavenueva]');
	var pass2 = $('[name=clave1]');
	var confirmacion = "Las contraseñas si coinciden";
	var longitud = "La contraseña debe estar formada entre 6-8 carácteres (ambos inclusive)";
	var negacion = "No coinciden las contraseñas";
	var vacio = "La contraseña no puede estar vacía";
	//oculto por defecto el elemento span
	var span = $('<span></span>').insertAfter(pass2);
	span.hide();

	//función que comprueba las dos contraseñas
	function coincidePassword(){
		var valor1 = pass1.val();
		var valor2 = pass2.val();
		//muestro el span
		span.show().removeClass();
		//condiciones dentro de la función
		if(valor1 != valor2){
		span.text(negacion).addClass('negacion');	
		}
		if(valor1.length == 0 || valor1==""){
		span.text(vacio).addClass('negacion');	
		}
		if(valor1.length < 6 || valor1.length>8){
		span.text(longitud).addClass('negacion');
		}
		if(valor1.length != 0 && valor1==valor2){
		span.text(confirmacion).removeClass("negacion").addClass('confirmacion');
		}
	}

	//ejecuto la función al soltar la tecla
	pass2.keyup(function(){
		coincidePassword();
	});

	$( "#nombre" ).focus(function(){
		if($( "#nombre" ).val().length<=0) 
		{
			$("#faltanombre").css("display","inline").fadeOut(2000);
		}	
	});

	
	$( "#guardar").click(function(){
		if($( "#nombre" ).val().length<=0) 
		{
			$("#faltanombre").css("display","inline").fadeOut(2000);
			return false;
		}	
	});
});
</script>