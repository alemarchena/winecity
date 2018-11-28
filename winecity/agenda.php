<head>
	<meta charset="utf-8">
    <link href="css/estilo.css" rel="stylesheet">

</head>

<div class="border border-success">
	<p class="mensajeservidor">Agenda</p>
	<div class="row">
		
		<div id="calendario" class="col-sm-6">
			<p class="mensajeservidor">Calendario</p>
		</div>

		<div class="col-sm-6">
			<div class="row">
				<div class="accordion" id="accordionExample0">
					<div class="card">
					        <div class="card-header" id="headingUno">
					          <h5 class="mb-0">
					            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseDos" aria-expanded="true" aria-controls="collapseDos">
					                <p class="mensajeservidor">LISTA DE CONSUMOS</p>
					            </button>
					          </h5>
					        </div>

					        <div id="collapseDos" class="collapse show" aria-labelledby="headingUno" data-parent="#accordionExample0">
					            <div class="card-body">
					                <!-- LO QUE SE VA A MOSTRAR EN LA TARJETA-->
					                <div class="row">
					                    <div class="offset-md-3 col-md-1">
					                        <input type="text" id="idconsumo" name="idconsumo" placeholder="Id" class="form-control"  value="<?php  if(isset($idconsumo)) echo $idconsumo ?>" >
					                    </div>
					                    <div class="col-md-4">
					                        <form class="form-signin" action="">
					                            <button type="button"  class="btn btn-md btn-primary btn-block" id="consultaconsumisiones"> Consultar</button>
					                        </form>
					                    </div>
					                </div>

					                <div class="table-responsive-md">
					                    <table id="tabla_consumos" class="table w-auto table-bordered table-striped">
					                        <thead>
					                            <tr class="btn-info">
					                                <th scope="col">#</th>
					                                <th scope="col">Nombre</th>                          
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
			<div class="row">
				
				<div class="accordion" id="accordionExample"> <!--Acordeon -->
			        <div class="card">
				        <div class="card-header" id="headingTwo">
				          <h5 class="mb-0">
				            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
				                <p class="mensajeservidor">LISTA DE BODEGAS</p>
				            </button>
				          </h5>
				        </div>

				        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
				            <div class="card-body">
				                <!-- LO QUE SE VA A MOSTRAR EN LA TARJETA-->
				                <div class="row">
				                    <div class="offset-md-3 col-md-1">
				                        <input type="text" id="idbodega" name="idbodega" placeholder="Id" class="form-control"  value="<?php  if(isset($idbodega)) echo $idbodega ?>" >
				                    </div>
				                    <div class="col-md-4">
				                        <form class="form-signin" action="">
				                            <button type="button"  class="btn btn-md btn-primary btn-block" id="consultabodegas"> Consultar</button>
				                        </form>
				                    </div>
				                </div>

				                <div class="table-responsive-md">
				                    <table id="tabla_bodegas" class="table w-auto table-bordered table-striped">
				                        <thead>
				                            <tr class="btn-info">
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
			</div><!--fin de fila -->
		</div><!--fin columna -->
	</div>
</div>

<script>
	$(document).ready(function(){
    	$("#calendario").load("calendario.php");
	});
</script>