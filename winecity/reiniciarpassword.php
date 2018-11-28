<?php
	$correoempresa = "Correo Wine City";
	$_SESSION['active'] =1;
	$ruta = '/home2/winecity/public_html/plataforma/';
	include($ruta . 'controladores/coneccion.php');
	include('header.php');
	$respuesta = "";
	
	if(isset($_POST['resetSubmit']))
	{
		$email = $_REQUEST['emailrecupero'];
		$token = $_REQUEST['fp_code'];
		$pas =$_POST['clavecambiada'];
		
		
		$resultado = $cnx->query("select * from usuarios where email_usuario = '$email' and  token = '$token'");
		$fila = $cnx->affected_rows;

		if($fila > 0)
		{
			$resultado = $cnx->query("update usuarios set token= '$uniqidStr' where email_usuario = '$email'");
			$fila = $cnx->affected_rows;
			if($fila)
			{
				$resultado = $cnx->query("update usuarios set clave_usuario= '$pas', token= '' where email_usuario = '$email'");
				$fila = $cnx->affected_rows;
				if($fila)
				{
					$respuesta = "Su clave fue cambiada con éxito.";
					//envia el nuevo password al email
					$to = $email;
					$subject = "Contraseña actualizada";
					$mailContent = 'Su cambio de clave ha sido exitoso. La nueva clave es : ".$pas';
					//set content-type header for sending HTML email
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					//additional headers
					$headers .= 'From:' . $correoempresa . ' '. "\r\n";
					//send email
					mail($to,$subject,$mailContent,$headers);
					mail($to,$subject,$mailContent,$headers);
				}else
				{
					$respuesta = "Ocurrió un problema al guardar la nueva clave.";
				}
				
			}
		}else
		{
			$respuesta = "El vinculo desde el cual accedió a recuperar su clave está obsoleto. Vuelva a recuperar su clave desde el login.";
		}
	}
?>

<!doctype html>
<html lang="en">
<body>
<div class="container" >
	
	<div class="col-sm-12">
		<div class="row">
			<div class="col-sm-12" align="center">
				<h4>Reinicio de clave</h4>
				<p class="mensajeservidor">Ingresa una nueva clave</p>
			</div>
		</div>

		<div align="center">
			<?php  if($respuesta !="") echo "<p class='alert alert-warning mensajeservidor' role='alert'>$respuesta</p>"; ?>
		</div>

		<div class="row">
			<div class="col-sm-12" align="center">
				<div class="form-signin">
					<form action="" method="post">
						<input type="password" name="clavecambiada" placeholder="Clave" class="form-control" value="<?php if(isset($clavecambiada)) echo $clavecambiada ?>" required="" >
						<input type="password" name="confirmaclavecambiada" placeholder="Confirmar clave" value="<?php  if(isset($confirmaclavecambiada)) echo $confirmaclavecambiada ?>" required="">
						<input type="hidden" name="fp_code" value="<?php echo $_REQUEST['fp_code']; ?>"/>
						<input type="submit" name="resetSubmit" value="Reiniciar clave">
					</form>
					<form class="form-signin" action="login.php" method="post">
							<button class="btn btn-lg btn-primary btn-block" name="salir" type="submit"><small>Ir al Login</small></button>
						</form>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12">
				<?php include('footer.php');?>
			</div>
		</div>   
	</div>   
</div>

	

</body>

<script>
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
</script>

<script>
$(document).ready(function() {
	//variables
	var pass1 = $('[name=clavecambiada]');
	var pass2 = $('[name=confirmaclavecambiada]');
	var confirmacion = "Las contraseñas si coinciden";
	var longitud = "La contraseña debe estar formada entre 6-8 carácteres (ambos inclusive)";
	var negacion = "No coinciden las contraseñas";
	var vacio = "La contraseña no puede estar vacía";
	//oculto por defecto el elemento span
	var span = $('<span></span>').insertAfter(pass2);
	span.hide();

	//ejecuto la función al soltar la tecla
	pass2.keyup(function(){
		coincidePassword();
	});	
});
</script>