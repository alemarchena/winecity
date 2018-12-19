	<header>



	<!-- librerias para el calendario-->

	

	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">

	<link rel="stylesheet" href="css/clockpicker.css">



	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<script src="js/jquery-clockpicker.js"></script>

	<script src="js/bootstrap-clockpicker.js"></script>

	<script src="js/highlight.min.js"></script>

	<script src="js/html5shiv.js"></script>

	<script src="js/respond.min.js"></script>

	<script src="js/moment.js"></script>

	

	

	</header>


<div class="jumbotron jumbotron-fluid">

	<div class="row" style="margin: 0px 5px 0px 5px">

		<div class="col-lg-2" align="center">

			<div class="row">

				<div class="col" align="center">

					<div class="row">
						<input type="text" id="fechaactual" value="" placeholder="fecha" class="form-control" >
						
						<div id="calendario">

									

						</div>
					</div>
					<div class="row">

						<div class="input-group clockpicker">

						    <input id="horaseleccionada" type="text" placeholder="hora" class="form-control" value="" >

						    <span class="input-group-addon">

						        <span class="glyphicon glyphicon-time"></span>

						    </span>

						</div>
					</div>
					<div class="row">
						<input type="text" id="montocliente" value="" placeholder="Monto" class="form-control" >
					</div>
					<div class="row">
						<input type="text" id="cantidadpersonas" value="" placeholder="Cantidad Personas" class="form-control" >
					</div>
					<br>
					<div class="row">
						<small><p class="mensajeservidor">Verificador al Agregar item</p></small>
					</div>
					<div class="row">
						 <div class="form-check">
						    <input type="checkbox" class="form-check-input" id="chkBodegas" checked>
						    <label class="form-check-label" for="chkBodegas">Bodegas</label>
						  </div>
					</div>
					<div class="row">
						  <div class="form-check">
						    <input type="checkbox" class="form-check-input" id="chkConsumisiones" checked>
						    <label class="form-check-label" for="chkConsumisiones">Consumisiones</label>
						  </div>
					</div>
					<div class="row">
						  <div class="form-check">
						    <input type="checkbox" class="form-check-input" id="chkServicios" checked>
						    <label class="form-check-label" for="chkServicios">Servicios</label>
						  </div>
					</div>
				</div>

			</div>

		</div>

		<!-- ------------------------------------------------ CLIENTES -------------------------------------------------------------- -->

		<div class="col-lg-5">

			<div class="row">
				<div class="col">
			
					<div class="accordion" id="idacorclientes"> <!--Acordeon -->
				        <div class="card">
				        	<div class="row justify-content-around">
								<div class="col-xs-6">
									<button class="btn btn-primary" id="botonguardarcliente" action="" type="submit"><small>Guardar cliente</small></button>
								</div>
								<div  class="col-xs-6">
									<button class="btn btn-info" id="nuevocliente" action="" type="submit"><small>Nuevo cliente</small></button>
								</div>
							</div>
					        <div class="card-header" id="cabeceraClientes">
					          	<h5 class="mb-0">
									<button class="btn btn-block" id="botoncolapsarclientes" type="button" data-toggle="collapse" data-target="#colapsoclientes" aria-expanded="true" aria-controls="colapsoclientes">
									    
									    <small><p class="btn btn-info btn-block mensajeservidor text-dark" >Clientes</p></small>
									</button>
					    		</h5>

					            <input type="Text" id="idclienteelegido"  width="50" style="display:none">
								<input type="email" id="emailclienteelegido" value="<?php  if(isset($emailclienteelegido)) echo $emailclienteelegido ?>" placeholder="email cliente" class="form-control" disabled></small><span id="faltaemail" style="display:none">	Ingrese un email</span>

				          	
					          	
					        </div>


							<div id="colapsoclientes" class="collapse" aria-labelledby="cabeceraClientes" data-parent="#idacorclientes">
			            		<div class="card-body">
					            	<div class="row">
					            		<div class="offset-md-3 col-md-2">
					                        <input type="text" id="idcontactocliente" name="idcontactocliente" placeholder="Id" class="form-control"  value="<?php  if(isset($idcontactocliente)) echo $idcontactocliente ?>" >
					                    </div>
					                    <div class="col-md-4">
					                        <form class="form-signin" action="">
					                            <button type="button"  class="btn btn-md btn-info btn-block" id="botonclientes_seleccionable"><small>Ver</small></button>
					                        </form>
					                    </div>
				                    </div>
				                    <div class="table-responsive-sm">
					                    <table id="tabla_clientes" class="table table-sm w-auto table-bordered table-striped">
					                    	
					                        <thead>
					                            <tr class="btn-secondary">
		                                			<th scope="col"></th>
		                                			<th scope="col"></th>
		                                			<th scope="col"></th>
					                                <th scope="col">#</th>
					                                <th scope="col">email</th>
					                                                             
					                            </tr>
					                        </thead>
					                        <tbody id = "body_clientes"> 

					                        </tbody>
					                    </table>
			            			</div>
			            		</div>
		            		</div>
					    </div><!--fin de la tarjeta -->
				    </div><!-- fin del acordeon -->

				   
					<div class="form-group green-border-focus">
					  <textarea class="form-control" placeholder="Observaciones" id="observaciones" rows="3" maxlength="150"></textarea>
					</div>
					

				</div>
			</div>
		</div>

		
		<!-- ------------------------------------------------- CONTACTOS DE BODEGAS -------------------------------------------------- -->
		<!-- ------------------------------------------------------------------------------------------------------------------------- -->

		<div class="col-lg-5">

			<div class="row">
				<div class="col">
			
					<div class="accordion" id="idacorcontacto"> <!--Acordeon -->
				        <div class="card">
				        	<div class="row justify-content-around">
								<div class="col-xs-6">
				          			<button class="btn btn-primary" id="botonguardarcontacto" action="" type="submit"><small>Guardar contacto</small></button>
								</div>
								<div  class="col-xs-6">
									<button class="btn btn-info" id="nuevocontacto" action="" type="submit"><small>Nuevo contacto</small></button>		
								</div>
							</div>
					        <div class="card-header" id="cabeceraContactos">
					          	<h5 class="mb-0">
									<button class="btn btn-block" id="botoncolapsarcontacto" type="button" data-toggle="collapse" data-target="#colapsocontacto" aria-expanded="true" aria-controls="colapsocontacto">
									    
									    <small><p class="btn btn-info btn-block mensajeservidor text-dark">Contactos</p></small>
									</button>
					    		</h5>

					            <input type="Text" id="idcontactobodegaelegido"  width="50" style="display:none">

		  						<input type="Text" id="contactobodegaelegido" class="form-control" placeholder="contacto elegido"  disabled><span id="faltanombre" style="display:none"><small>	Ingrese un Nombre</small></span>
					        </div>

							
							<div id="colapsocontacto" class="collapse" aria-labelledby="cabeceraContactos" data-parent="#idacorcontacto">
			            		<div class="card-body">
					            	<div class="row">
					            		<div class="offset-md-3 col-md-2">
					                        <input type="text" id="idcontactobodega" name="idcontactobodega" placeholder="Id" class="form-control"  value="<?php  if(isset($idcontactobodega)) echo $idcontactobodega ?>" >
					                    </div>
					                    <div class="col-md-4">
					                        <form class="form-signin" action="">
					                            <button type="button"  class="btn btn-md btn-info btn-block" id="botoncontactosbodegas_seleccionable"><small>Ver</small></button>
					                        </form>
					                    </div>
				                    </div>
				                    <div class="table-responsive-sm">
					                    <table id="tabla_contactos" class="table table-sm w-auto table-bordered table-striped">
					                        <thead>
					                            <tr class="btn-secondary">
		                                			<th scope="col"></th>
		                                			<th scope="col"></th>
		                                			<th scope="col"></th>
					                                <th scope="col">#</th>
					                                <th scope="col">Nombre</th>
					                                                             
					                            </tr>
					                        </thead>
					                        <tbody id = "body_bodegas"> 

					                        </tbody>
					                    </table>
			            			</div>
			            		</div>
		            		</div>
							
					    </div><!--fin de la tarjeta -->
				    </div><!-- fin del acordeon -->



				    <!--  -------------------------------------------- LISTAS DE SERVICIOS -------------------------------------------->
					
					<div class="accordion" id="accordionExample3">
						<div class="card">
					        <div class="card-header" id="headingTres">
					          <h5 class="mb-0">
					            <button class="btn btn-block" type="button" data-toggle="collapse" data-target="#collapseTres" aria-expanded="true" aria-controls="collapseTres">
					                <small><p class="btn btn-info btn-block mensajeservidor text-dark">Lista de Servicios</p></small>
					            </button>
					            <br>
					            <input type="Text" id="idservicioelegido" style="display:none">
		  						<small><input type="Text" id="nombreservicioelegido" class="form-control" placeholder="servicio elegido" disabled></small>
					          </h5>
					        </div>


					        <div id="collapseTres" class="collapse" aria-labelledby="headingTres" data-parent="#accordionExample3">
					            <div class="card-body">
					                <!-- LO QUE SE VA A MOSTRAR EN LA TARJETA-->
					                <div class="row">
					                    <div class="offset-md-3 col-md-2">
					                        <input type="text" id="idservicio" name="idservicio" placeholder="Id" class="form-control"  value="<?php  if(isset($idservicio)) echo $idservicio ?>" >
					                    </div>

					                    <div class="col-md-4">
					                        <form class="form-signin" action="">
					                            <button type="button"  class="btn btn-md btn-info btn-block" id="consultaservicios_seleccionable"><small>Ver</small></button>
					                        </form>
					                    </div>
									</div>

					                <div class="table-responsive-sm">
					                    <table id="tabla_servicios" class="table table-sm w-auto table-bordered table-striped">
					   
					                        <thead>
					                            <tr class="btn-secondary">
					                            	<th scope="col"></th>
					                                <th scope="col">#</th>
					                                <th scope="col">Nombre</th>
					                            </tr>
					                        </thead>
					                        <tbody id = "body_servicios"> 


					                        </tbody>
					                    </table>
					                </div>
					            <!-- FIN DE MOSTRAR EN LA TARJETA-->
					            </div>
					        </div>
				      	</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	
	
	
	<!--  -------------------------------------------- LISTAS DE BODEGAS -------------------------------------------->
	<div class="row  style="margin: 10px"">

		<div class="col-lg-7" align="center">
			<div class="accordion" id="accordionExample2"> <!--Acordeon -->
		        <div class="card">
			        <div class="card-header" id="headingTwo">
			          <h5 class="mb-0">
			            <button class="btn btn-block" type="button" data-toggle="collapse" data-target="#colapsobodega" aria-expanded="true" aria-controls="colapsobodega">
			                <small><p class="btn btn-info btn-block mensajeservidor text-dark">Lista de Bodegas</p></small>
			            </button>
			            <br>
			            <input type="Text" id="idbodegaelegida"  width="50" style="display:none">
  						<small><input type="Text" id="nombrebodegaelegida" class="form-control" placeholder="bodega elegida" disabled></small>
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
			                            <button type="button"  class="btn btn-md btn-info btn-block" id="consultabodegas_seleccionable"><small>Ver</small></button>
			                        </form>
			                    </div>
			                </div>
			                <!--<div class="table-responsive-md">-->
							<div class="table-responsive-sm">
			                    <table id="tabla_bodegas" class="table table-sm w-auto table-bordered table-striped">
			                        <thead>
			                            <tr class="btn-secondary">
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


		<!--  -------------------------------------------- LISTAS DE CONSUMISIONES -------------------------------------------->
		<div class="col-lg-5" align="center">
			<div class="accordion" id="accordionExample1">
				<div class="card">
			        <div class="card-header" id="headingUno">
			          <h5 class="mb-0">
			            <button class="btn btn-block" type="button" data-toggle="collapse" data-target="#collapseDos" aria-expanded="true" aria-controls="collapseDos">
			                <small><p class="btn btn-info btn-block mensajeservidor text-dark">Lista de Consumos</p></small>
			            </button>
			            <br>
			            <input type="Text" id="idconsumisionelegida" style="display:none">
  						<small><input type="Text" id="nombreconsumisionelegida" class="form-control" placeholder="consumo elegido" disabled></small>
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
			                            <button type="button"  class="btn btn-md btn-info btn-block" id="consultaconsumisiones_seleccionable"><small>Ver</small></button>
			                        </form>
			                    </div>
							</div>

			                <div class="table-responsive-sm">
			                    <table id="tabla_consumos" class="table table-sm w-auto table-bordered table-striped">
			   
			                        <thead>
			                            <tr class="btn-secondary">
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
	</div>
</div>




<div class="jumbotron">
	<div class="row justify-content-center">
		<div class="col">
			<button class="btn btn-info btn-lg btn-block" id="agregarreserva" action="" type="submit"><small>Agregar Item</small></button>
			<p id="mensaje" style="display: none" class='alert alert-warning mensajeservidor' role='alert'></p>
		</div>
		<div class="col">

			<button class="btn btn-success btn-lg btn-block" id="veragenda" action="" type="submit"><small>Ver Reservas</small></button>

		</div>
		<div class="col">
			<button class="btn btn-primary btn-lg btn-block" id="agendar" action="" type="submit"><small>Guardar Reserva</small></button>
		</div>
		<div class="col">
			<button class="btn btn-info btn-lg btn-block" id="nuevasreservas" disabled action="" type="submit"><small>Nueva Reserva</small></button>
		</div>
	</div>
</div>

<div class=" jumbotron col-xs-12" style="margin: 0px 5px 0px 5px">
	<small><h2 class="mensajeservidor">Agendado</h2></small>
	<!-- <input type="Text" id="id_agendado" style="display:none"> -->
	<div class="row justify-content-center">
		<div class="col-xs-4">
			<small><span id="labelid"  style="display: none" disabled class="mensajeservidor">Id Seleccionado </span></small>
			<br>
			<input type="Text" align="center" id="id_agendado" style="display: none" disabled>
			<input type="Text" id="id_estadoagendado" style="display: none" disabled>
		</div>
	</div>
	<br>
	<div class="row justify-content-center">
		<div class="col-xs-1">
			<button class="btn btn-success" id="confirmado"  style="display: none" disabled>Confirmado</button>
		</div>
		<div class="col-xs-1">
			<button class="btn btn-secondary" id="disponible"  style="display: none" disabled>Disponible</button>
		</div>
		<div class="col-xs-1">
			<button class="btn btn-danger" id="cancelado"  style="display: none" disabled>Cancelado</button>
		</div>
	</div>
	<div class="table-responsive-sm">

        <table id="tabla_agenda" class="table w-auto table-bordered table-striped">

            <thead>

                <tr class="btn-secondary">

                    <th scope="col"></th>

                    <th scope="col">Id</th>

                    <th scope="col">fecha</th>

                    <th scope="col">hora</th>

                    <th scope="col" style="display:none;">id Bod</th>

                    <th scope="col">Bodega</th>

                    <th scope="col" style="display:none;">id Consumo</th>

                    <th scope="col">Consumo</th>

                    <th scope="col" style="display:none;">id servicio</th>

                    <th scope="col">Servicio</th>

                    <th scope="col" style="display:none;">id cliente</th>

                    <th scope="col">Cliente</th>

                    <th scope="col">Monto</th>

                    <th scope="col">Cantidad</th>
                    
                    <th scope="col">Observaciones</th>

                    <th scope="col" style="display:none;">id Contacto</th>

                    <th scope="col">Contacto</th>

                    <th scope="col" style="display:none;">id Estado</th>

                    <th scope="col">Estado</th>

                    <th scope="col style="display:none;"">Fecha carga</th>

                    <th scope="col"></th>
                    
                </tr>

            </thead>

            <tbody id = "body_agenda"> 



            </tbody>

        </table>
	</div>
</div>



<script>

	$(document).ready(function()

	{

		$('#fechaactual').val(diadehoy());

		$("#veragenda").click(function()
    	{
    		consultaagenda();
    	});

    	$("#agregarreserva").click(function()
    	{
    		AgregaBotonEvento();
    	});
		
		$("#agendar").click(function(){
			guardaragenda();
		});

    	$('#fechaactual').change(function(){

			$('#fechaactual').val( formatearfecha( $('#fechaactual').val() )   );
    	});
	});

</script>



<?php

	include("funciones/clientesfunciones.php");

	include("funciones/contactosbodegasfunciones.php");

    include("funciones/agendafunciones.php");

    include("funciones/bodegasfunciones.php");

    include("funciones/consumisionesfunciones.php");

    include("funciones/serviciosfunciones.php");

?>