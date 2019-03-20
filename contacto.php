<div class="row">
	<div class="offset-sm-2 col-sm-8" align="left">
		<h5>Contáctenos</h5><br>
		<p>Por favor complete los datos y envíenos su inquietud</p>
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text">Nombre y Apellido</span>
			
				<input id="nombre" type="text" aria-label="First name" class="form-control">
				<input id="apellido" type="text" aria-label="Last name" class="form-control">
			</div>
			<div class="input-group-prepend btn-block">
				<span for="exampleInputEmail1"class="input-group-text  btn-block">email</span>
				<input id="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

				<span class="input-group-text">Teléfono</span>
				<input id="telefono" type="text" aria-label="Telefono" class="form-control">
			</div>
			<div class="input-group-prepend btn-block">
		    	<span class="input-group-text">Su mensaje</span>
				<textarea id="mensaje" class="form-control" aria-label="With textarea"></textarea>
	  		</div>
		</div>
	
		<button id="enviar" type="submit" class="btn btn-primary btn-block">Enviar</button>

	</div>
</div>

<script>
	
	$("#enviar").click(function(){
		var nombre = $("#nombre").val();
		var apellido = $("#apellido").val();
		var email = $("#email").val();
		var telefono = $("#telefono").val();
		var mensaje = $("#mensaje").val();

		$.ajax({

			url:"controladores/enviaremail.php",
			data:{nombre:nombre,apellido:apellido,email:email,telefono:telefono,mensaje:mensaje},
			type:"post",
			success:function(data){
				if(data!="consultavacia")
	            {
	            	alert("¡¡¡Gracias por enviar su mensaje!!!");
	            }
			},
			error:function(e){
				alert("Error al Enviar");
			}
		});
	});
	

</script>