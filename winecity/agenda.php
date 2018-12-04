	<br>
	<p class="mensajeservidor">Sistema de reservas</p>

	<div class="row">
		<div class="col-lg-3" align="center">
			<div class="accordion" id="accordionExample0">
				<div class="card">
					<div class="card-header" id="headingCero">
						<h5 class="mb-0">
				            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseCal" aria-expanded="true" aria-controls="collapseCal">
				                <p class="mensajeservidor">CALENDARIO</p>
				            </button>
				            <br>
				            <small><span class="mensajeservidor" id="textofecha"></span></small>
				          </h5>
					</div>

				 	<div id="collapseCal" class="collapse" aria-labelledby="headingCero" data-parent="#accordionExample0">
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
			            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#colapsobodega" aria-expanded="true" aria-controls="colapsobodega">
			                <p class="mensajeservidor">BODEGAS</p>
			            </button>
			            <br>
			            <input type="Text" id="idbodegaelegida" width="50" style="display:none">
  						<small><input type="Text" id="nombrebodegaelegida" disabled></small>
			          </h5>
			        </div>

			        <div id="colapsobodega" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample2">
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
			                <p class="mensajeservidor">CONSUMIBLES</p>
			            </button>
			            <br>
			            <input type="Text" id="idconsumisionelegida" style="display:none">
  						<small><input type="Text" id="nombreconsumisionelegida" disabled></small>
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
			                            	<th scope="col"></th>
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
		<div class="container">

			
			

			<div class="col-lg-12">
				<div class="table-responsive-md">
                    <table id="tabla_agenda" class="table w-auto table-bordered table-striped">
                        <thead>
                            <tr class="btn-info">
                                <th scope="col">Item</th>
                                <th scope="col">fecha</th>
                                <th scope="col">id Bod</th>
                                <th scope="col">Bodega</th>
                                <th scope="col">id Con</th>
                                <th scope="col">Consumo</th>
        
                            </tr>
                        </thead>
                        <tbody id = "body_consumos"> 
                            
                        </tbody>
                    </table>
                </div>
			</div>
			<button class="btn btn-lg btn-info btn-block" id="agregarreserva" action="" type="submit"><small>Agregar Reserva</small></button>
			<div  align="center">
				<p id="mensaje" style="display: none" class='alert alert-warning mensajeservidor' role='alert'></p>
			</div>
			<br>
			<button class="btn btn-lg btn-primary btn-block" id="agendar" action="" type="submit"><small>Agendar nueva Reserva</small></button>
			<br>
			<button class="btn btn-lg btn-success btn-block" id="ver" action="" type="submit"><small>Ver Reservas</small></button>

			
			
		</div>
		
	</div>


<script>

	function noseleccionaitem()
	{
		$(document).on('click', '.quitar', function (event) 
		{
		    event.preventDefault();
		    $(this).closest('tr').remove();
		});	
	}

	function AgregaBotonEvento()
	{

		if($("#diafecha").val() == ""){
			$("#mensaje").html("Indique una fecha en el calendario").show();
			$("#mensaje").html("Indique una fecha en el calendario").fadeOut(3000);

		}else{
			$("#mensaje").html("").hide();
			if($("#idbodegaelegida").val() == ""){
				$("#mensaje").html("Indique una bodega").show();
				$("#mensaje").html("Indique una bodega").fadeOut(3000);
			}else{
				$("#mensaje").html("").hide();
				if($("#idconsumisionelegida").val() == ""){
					$("#mensaje").html("Indique un consumo").show();
					$("#mensaje").html("Indique un consumo").fadeOut(3000);
				}else{
					$("#mensaje").html("").hide();
					var fechaelegida = $("#diafecha").val() + '-' + $("#mesfecha").val() + "-" + $("#aniofecha").val();
					var fechaelegidaInv = $("#aniofecha").val() + '-' + $("#mesfecha").val() + "-" + $("#diafecha").val();

					var idbodegae = $("#idbodegaelegida").val();
					var nombrebodegae = $("#nombrebodegaelegida").val();

					var idconsumisione = $("#idconsumisionelegida").val();
					var nombreconsumisione = $("#nombreconsumisionelegida").val();
				
					var fila = "<tr><td><input type='button' value = 'X' class = 'quitar btn btn-sm btn-info' onclick='noseleccionaitem()' /></td><td>"+fechaelegida+"</td><td>"+idbodegae+"</td><td>"+nombrebodegae+"</td><td>"+idconsumisione+"</td><td>"+nombreconsumisione+"</td></tr>";

					$("#tabla_agenda").append(fila);
				}
			}
		}
	}
</script>

<script>
	$(document).ready(function(){
    	$("#calendario").load("calendario.php");
    	//$("#calendario").load("calendarioboostrap.php");

    	$("#agregarreserva").click(function(){
    		AgregaBotonEvento();
    	})
	});
</script>


<?php
    include("funciones/bodegasfunciones.php");
    include("funciones/consumisionesfunciones.php");
?>