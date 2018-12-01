
<?php
    include("funciones/bodegasfunciones.php");
    include("funciones/consumisionesfunciones.php");
?>

<head>
	<meta charset="utf-8">
    <link href="css/estilo.css" rel="stylesheet">
	
</head>

	<br>
	<p class="mensajeservidor">Agenda</p>

	<div class="row">
		<div class="col-lg-3" align="center">
			<div class="accordion" id="accordionExample0">
				<div class="card">
					<div class="card-header" id="headingCero">
						<h5 class="mb-0">
				            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseCero" aria-expanded="true" aria-controls="collapseCero">
				                <p class="mensajeservidor">CALENDARIO</p>
				            </button>
				          </h5>
					</div>

				 	<div id="collapseCero" class="collapse show" aria-labelledby="headingCero" data-parent="#accordionExample0">
			            <div class="card-body">
							<div id="calendario"">
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		

		<div class="col-lg-5" align="center">
			<div class="accordion" id="accordionExample2"> <!--Acordeon -->
		        <div class="card">
			        <div class="card-header" id="headingTwo">
			          <h5 class="mb-0">
			            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
			                <p class="mensajeservidor">LISTA DE BODEGAS</p>
			            </button>
			          </h5>
			        </div>

			        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample2">
			            <div class="card-body">
			                <!-- LO QUE SE VA A MOSTRAR EN LA TARJETA-->
			                <div class="row">
			                    <div class="offset-md-2 col-md-2">
			                        <input type="text" id="idbodega" name="idbodega" placeholder="Id" class="form-control"  value="<?php  if(isset($idbodega)) echo $idbodega ?>" >
			                    </div>
			                    <div class="col-md-4">
			                        <form class="form-signin" action="">
			                            <button type="button"  class="btn btn-md btn-primary btn-block" id="consultabodegas_seleccionable"> Bodegas</button>
			                        </form>
			                    </div>
			                </div>

			                <div class="table-responsive-md">
			                    <table id="tabla_bodegas" class="table table-sm w-auto table-bordered table-striped">
			                        <thead>
			                            <tr class="btn-info">
			                            	<th scope="col"></th>
                                			<th scope="col"></th>
			                                <th scope="col">#</th>
			                                <th scope="col">Nombre</th>
			                                <th scope="col">email</th>                                        
			                                <th scope="col">teléfono</th>                                        
			                            </tr>
			                        </thead>
			                        <tbody id = "body_bodegas"> 

			                        </tbody>
			                    </table>
			                </div>
			            <!-- FIN DE MOSTRAR EN LA TARJETA-->
			            </div>
			        </div>
		      	</div>	<!--fin de card -->
			</div><!--fin de acordeon -->
		</div>
		<div class="col-lg-4" align="center">
			<div class="accordion" id="accordionExample1">
				<div class="card">
			        <div class="card-header" id="headingUno">
			          <h5 class="mb-0">
			            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseDos" aria-expanded="true" aria-controls="collapseDos">
			                <p class="mensajeservidor">LISTA DE CONSUMIBLES</p>
			            </button>
			          </h5>
			        </div>

			        <div id="collapseDos" class="collapse" aria-labelledby="headingUno" data-parent="#accordionExample1">
			            <div class="card-body">
			                <!-- LO QUE SE VA A MOSTRAR EN LA TARJETA-->
			                <div class="row">
			                    <div class="offset-md-3 col-md-2">
			                        <input type="text" id="idconsumo" name="idconsumo" placeholder="Id" class="form-control"  value="<?php  if(isset($idconsumo)) echo $idconsumo ?>" >
			                    </div>
			                    <div class="col-md-4">
			                        <form class="form-signin" action="">
			                            <button type="button"  class="btn btn-md btn-primary btn-block" id="consultaconsumisiones_seleccionable"> Consumibles</button>
			                        </form>
			                    </div>
			                </div>

			                <div class="table-responsive-md">
			                    <table id="tabla_consumos" class="table w-auto table-bordered table-striped">
			                        <thead>
			                            <tr class="btn-info">
			                                <th scope="col">#</th>
			                                <th scope="col">Nombre</th>
			                                <th scope="col"></th>
                                			<th scope="col"></th>                          
			                            </tr>
			                        </thead>
			                        <tbody id = "body_consumos"> 
			                            
			                        </tbody>
			                    </table>
			                </div>
			            <!-- FIN DE MOSTRAR EN LA TARJETA-->
			            </div>
			        </div>
		      	</div>
			</div>
		</div>
		<button class="btn btn-lg btn-primary btn-block" id="agendar" action="" type="submit"><small>Agendar</small></button>
	</div>


<script>
	$(document).ready(function(){
    	$("#calendario").load("calendario.php");
	});
</script>