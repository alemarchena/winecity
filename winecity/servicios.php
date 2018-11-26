<div class="row">
	<div class="col-sm-12">
		<a class="btn btn-outline-info btn-block" id="bodegas" ref="#"><small>Bodegas</small></a>
	</div>
	<div class="col-sm-12">
		<a class="btn btn-outline-info btn-block" id="consumisiones" ref="#"><small>Consumisiones</small></a>
	</div>
	<div class="col-sm-12">
		<div id="subcontenedor" class="jumbotron" align="center">
			<!--Aqui se insertan las pantallas -->
			<p>Debes seleccionar alguno de los botones.</p>
		</div>	
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
	});
</script>