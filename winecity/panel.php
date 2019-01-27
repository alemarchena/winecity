<br>
	<div class="col-sm-12">
		<a class="btn btn-outline-info btn-block" id="hoteles" ref="#">Hoteles</a>
	</div>

	<div class="col-sm-12">
		<a class="btn btn-outline-info btn-block" id="bodegas" ref="#">Bodegas</a>
	</div>

	<div class="col-sm-12">
		<a class="btn btn-outline-info btn-block" id="consumisiones" ref="#">Consumisiones sin bodega</a>
	</div>

	<div class="col-sm-12">
		<a class="btn btn-outline-info btn-block" id="servicios" ref="#">Servicios</a>
	</div>
	<div class="col-sm-12">
		<a class="btn btn-outline-info btn-block" id="parametros" ref="#">Parámetros email</a>
	</div>
	<div class="col-sm-12">
		<div id="subcontenedor" class="jumbotron" align="center">

			<!--Aqui se insertan las pantallas -->
			
			<img src="img/wc.png" class="img-fluid img-thumbnail" alt="Panel Wine City">
		</div>	
	</div>	


<script>
	$(document).ready(function()

	{
		$("#hoteles").click(function(){

	        $("#subcontenedor").load("hoteles.php");
	    });

	    $("#bodegas").click(function(){

	        $("#subcontenedor").load("bodegas.php");
	    });

	    $("#consumisiones").click(function(){

	        $("#subcontenedor").load("consumisiones.php");
	    });

	    $("#servicios").click(function(){

	        $("#subcontenedor").load("servicios.php");
	    });
	    $("#parametros").click(function(){

	        $("#subcontenedor").load("parametrosemail.php");
	    });
	});
</script>