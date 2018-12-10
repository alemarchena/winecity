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



	<div class="row">

		<div class="col-md-4">

			<button class="btn btn-lg btn-success btn-block" id="ver" action="" type="submit"><small>Ver Reservas</small></button>

		</div>

		<br>

		<div class="offset-md-4 col-md-4">

			<button class="btn btn-lg btn-primary btn-block" id="agendar" action="" type="submit"><small>Guardar Reserva</small></button>

		</div>

	</div>



<div class="jumbotron jumbotron-fluid">

	<div class="row" style="margin: 10px">

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

				</div>

			</div>

		</div>

		<!-- ------------------------------------------------ CLIENTES -------------------------------------------------------------- -->

		<div class="col-lg-5">

			<div class="row">
				<div class="col">
			
					<div class="accordion" id="idacorclientes"> <!--Acordeon -->
				        <div class="card">
					        <div class="card-header" id="cabeceraClientes">
					          	<h5 class="mb-0">
									<button class="btn btn-link" id="botoncolapsarclientes" type="button" data-toggle="collapse" data-target="#colapsoclientes" aria-expanded="true" aria-controls="colapsoclientes">
									    
									    <small><p class="mensajeservidor text-danger">Clientes</p></small>
									</button>
					    		</h5>

					            <input type="Text" id="idclienteelegido"  width="50" style="display:none">
								<input type="email" id="emailclienteelegido" value="<?php  if(isset($emailclienteelegido)) echo $emailclienteelegido ?>" placeholder="email cliente" class="form-control" disabled></small><span id="faltaemail" style="display:none">	Ingrese un email</span>

				          	
					          	<button class="btn btn-info" id="botonguardarcliente" action="" type="submit"><small>Guardar cliente</small></button>
									<button class="btn btn-info" id="nuevocliente" action="" type="submit"><small>Nuevo cliente</small></button>
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
					                    <div>
					                    <table id="tabla_clientes" class="table table-sm w-auto table-bordered table-striped">
					                        <thead>
					                            <tr class="btn-info">
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
					        <div class="card-header" id="cabeceraContactos">
					          	<h5 class="mb-0">
									<button class="btn btn-link" id="botoncolapsarcontacto" type="button" data-toggle="collapse" data-target="#colapsocontacto" aria-expanded="true" aria-controls="colapsocontacto">
									    
									    <small><p class="mensajeservidor text-danger">Contactos de Bodegas</p></small>
									</button>
					    		</h5>

					            <input type="Text" id="idcontactobodegaelegido"  width="50" style="display:none">

		  						<input type="Text" id="contactobodegaelegido" class="form-control" placeholder="contacto elegido"  disabled><span id="faltanombre" style="display:none"><small>	Ingrese un Nombre</small></span>
					          	
					          	<button class="btn btn-info" id="botonguardarcontacto" action="" type="submit"><small>Guardar contacto</small></button>
									<button class="btn btn-info" id="nuevocontacto" action="" type="submit"><small>Nuevo contacto</small></button>
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
					                    <div>
					                    <table id="tabla_contactos" class="table table-sm w-auto table-bordered table-striped">
					                        <thead>
					                            <tr class="btn-info">
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
			            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#colapsobodega" aria-expanded="true" aria-controls="colapsobodega">
			                <small><p class="mensajeservidor text-danger">Lista de Bodegas</p></small>
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
							<div>
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



		<div class="col-lg-5" align="center">
			<div class="accordion" id="accordionExample1">
				<div class="card">
			        <div class="card-header" id="headingUno">
			          <h5 class="mb-0">
			            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseDos" aria-expanded="true" aria-controls="collapseDos">
			                <small><p class="mensajeservidor text-danger">Lista de Consumos</p></small>
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

			                <div>
			                    <table id="tabla_consumos" class="table table-sm w-auto table-bordered table-striped">
			   
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
	</div>
</div>




<div class="container">

	<button class="btn btn-lg btn-info btn-block" id="agregarreserva" action="" type="submit"><small>Agregar Item</small></button>

	<p id="mensaje" style="display: none" class='alert alert-warning mensajeservidor' role='alert'></p>

	<br>

</div>



<div class="col-lg-12">

	<div class="table-responsive-md">

        <table id="tabla_agenda" class="table w-auto table-bordered table-striped">

            <thead>

                <tr class="btn-info">

                    <th scope="col"></th>

                    <th scope="col">fecha</th>

                    <th scope="col">hora</th>

                    <th scope="col" style="display:none;">id Bod</th>

                    <th scope="col">Bodega</th>

                    <th scope="col" style="display:none;">id Consumo</th>

                    <th scope="col">Consumo</th>

                    <th scope="col" style="display:none;">id cliente</th>

                    <th scope="col">cliente</th>

                    <th scope="col">Monto</th>

                    <th scope="col" style="display:none;">id Contacto</th>

                    <th scope="col">Contacto Bod</th>

                    <th scope="col" style="display:none;">id Estado</th>

                    <th scope="col">Estado</th>

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



    	$("#agregarreserva").click(function()

    	{

    		AgregaBotonEvento();

    	});
		
		$("#agendar").click(function(){
			guardaragenda();
		});


    	$('#fechaactual').change(function(){

			$('#fechaactual').val( formatearfecha( $('#fechaactual').val() )   );



    	})



    	

	});

</script>



<?php

	include("funciones/clientesfunciones.php");

	include("funciones/contactosbodegasfunciones.php");

    include("funciones/agendafunciones.php");

    include("funciones/bodegasfunciones.php");

    include("funciones/consumisionesfunciones.php");

?>