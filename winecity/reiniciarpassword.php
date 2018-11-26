<?php
	$_SESSION['active'] =1;
	$ruta = '/home2/winecity/public_html/plataforma/';
	include($ruta . 'controladores/coneccion.php');
	include('header.php');
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

		<div class="row">
			<div class="col-sm-12" align="center">
				<div class="form-signin">
					<form action="actualizaclave.php" method="post">
						<input type="password" name="password" placeholder="Clave" class="form-control" value="<?php if(isset($password)) echo $password ?>" required="" >
						<input type="password" name="confirm_password" placeholder="Confirmar clave" value="<?php  if(isset($confirm_password)) echo $confirm_password ?>" required="">

						
						<input type="hidden" name="fp_code" value="<?php echo $_REQUEST['fp_code']; ?>"/>
						<input type="submit" name="resetSubmit" value="Reiniciar clave">
						
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
$(document).ready(function() {
	//variables
	var pass1 = $('[name=password]');
	var pass2 = $('[name=confirm_password]');
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
});
</script>