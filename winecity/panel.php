<br>
	<div class="col-sm-12">
		<a class="btn btn-outline-info btn-block" id="bodegas" ref="#">Bodegas</a>
	</div>

	<div class="col-sm-12">
		<a class="btn btn-outline-info btn-block" id="consumisiones" ref="#">Consumisiones</a>
	</div>

	<div class="col-sm-12">
		<a class="btn btn-outline-info btn-block" id="servicios" ref="#">Servicios</a>
	</div>
	<div class="col-sm-12">
		<div id="subcontenedor" class="jumbotron" align="center">

			<!--Aqui se insertan las pantallas -->
			
			<img src="img/logo-web.jpg" class="img-fluid img-thumbnail" alt="Panel Wine City">
		</div>	
	</div>	


<script>
	$(document).ready(function()

	{
	    $("#bodegas").click(function(){

	        $("#subcontenedor").load("bodegas.php");
	    });

	    $("#consumisiones").click(function(){

	        $("#subcontenedor").load("consumisiones.php");
	    });

	    $("#servicios").click(function(){

	        $("#subcontenedor").load("servicios.php");
	    });
	});
</script>