	<header>



	<!-- librerias para el calendario-->

	

	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">

	<link rel="stylesheet" href="css/clockpicker.css">



	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<script src="js/jquery-clockpicker.js"></script>

	<script src="js/bootstrap-clockpicker.js"></script>
<!--
	<script src="js/highlight.min.js"></script>

	<script src="js/html5shiv.js"></script>
-->
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

	<div class="row">

		<div class="col-lg-2" align="center">

			<div class="row">

				<div class="col" align="center">

					<input type="text" id="fechaactual" value="" placeholder="fecha" class="form-control" >

						<div id="calendario">

									

						</div>

				</div>

			</div>

		</div>

			

		<div class="col-lg-2" align="center">

			<div class="input-group clockpicker">

			    <input id="horaseleccionada" type="text" placeholder="hora" class="form-control" value="" >

			    <span class="input-group-addon">

			        <span class="glyphicon glyphicon-time"></span>

			    </span>

			</div>

		</div>

			

		<div class="col-lg-3">

			<input type="email" id="emailcliente" value="<?php  if(isset($emailcliente)) echo $emailcliente ?>" placeholder="email cliente" class="form-control" >

			<input type="text" id="montocliente" value="" placeholder="Monto" class="form-control" >

		</div>

		

		<div class="col-lg-5">

			<div class="row">
				
				<div class="col-lg-3">
					<input type="text" id="contactobodega" value="" placeholder="contacto elegido" class="form-control" >
				</div>
				<div class="col-lg-1">
					<input type="text" id="idcontactobodega" name="id" class="form-control" style="display: none;"><br>
				</div>
				<div class="col-lg-3">
					<button class="btn btn-info" id="botonguardarcontacto" action="" type="submit"><small>Guardar contacto</small></button><span id="faltanombre" style="display:none">Ingrese un Nombre</span>
				</div>
				<div class="col-lg-5">
					<div class="dropdown">
					    <button class="btn btn-info btn-block dropdown-toggle" id="botoncontactosbodegas_seleccionable" type="button" data-toggle="dropdown"><small>Contactos bodegas</small>

					    <span class="caret"></span></button>

					    <ul class="dropdown-menu" role="menu" id="listacontactos" aria-labelledby="menucontactosbodegas">

					    </ul>

				  	</div>
			  	</div>
			</div>

		</div>

	</div>



	<div class="row">

		<div class="col-lg-7" align="center">



			<div class="accordion" id="accordionExample2"> <!--Acordeon -->



		        <div class="card">



			        <div class="card-header" id="headingTwo">



			          <h5 class="mb-0">



			            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#colapsobodega" aria-expanded="true" aria-controls="colapsobodega">



			                <p class="mensajeservidor text-danger">Lista de Bodegas</p>



			            </button>



			            <br>



			            <input type="Text" id="idbodegaelegida"  width="50" style="display:none">



  						<small><input type="Text" id="nombrebodegaelegida" placeholder="bodega elegida" disabled></small>

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



			                            <button type="button"  class="btn btn-md btn-info btn-block" id="consultabodegas_seleccionable"> Ver</button>



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



			                <p class="mensajeservidor text-danger">Lista de Consumos</p>



			            </button>



			            <br>



			            <input type="Text" id="idconsumisionelegida" style="display:none">



  						<small><input type="Text" id="nombreconsumisionelegida" placeholder="consumo elegido" disabled></small>



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



			                            <button type="button"  class="btn btn-md btn-info btn-block" id="consultaconsumisiones_seleccionable">Ver</button>



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

                    <th scope="col" style="display:none;">id Con</th>

                    <th scope="col">Consumo</th>

                    <th scope="col">cliente</th>

                    <th scope="col">Monto</th>

                    <th scope="col">Contacto Bod</th>

                </tr>

            </thead>

            <tbody id = "body_consumos"> 



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



    	$('#fechaactual').change(function(){

			$('#fechaactual').val( formatearfecha( $('#fechaactual').val() )   );



    	})



    	

	});

</script>



<?php

	include("funciones/contactosbodegasfunciones.php");

    include("funciones/agendafunciones.php");

    include("funciones/bodegasfunciones.php");

    include("funciones/consumisionesfunciones.php");

?>