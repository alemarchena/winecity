<small><h4 class="mensajeservidor" align="center">Agencia de Turismo Wine City</h4>


<!-- ------------------------------------------------------ EMAIL A BODEGAS -------------------------------------- -->
<!-- ------------------------------------------------------ EMAIL A BODEGAS -------------------------------------- -->
<!-- ------------------------------------------------------ EMAIL A BODEGAS -------------------------------------- -->
<!-- ------------------------------------------------------ EMAIL A BODEGAS -------------------------------------- -->
<!-- ------------------------------------------------------ EMAIL A BODEGAS -------------------------------------- -->
<!-- ------------------------------------------------------ EMAIL A BODEGAS -------------------------------------- -->


<div class="accordion" id="accordionemailbodega">
	<div class="card">
		<div class="card-header" id="headingenvioemail">
			<h5 class="mb-0">
				<button class="btn btn-block" type="button" data-toggle="collapse" data-target="#collapseenvioemail" aria-expanded="true" aria-controls="collapseenvioemail">
                	<small><p class="btn btn-warning btn-block mensajeservidor text-dark">ENVIO EMAIL A BODEGA</small>
            	</button>
          </h5>
		</div>

		<div id="collapseenvioemail" class="collapse" aria-labelledby="headingenvioemail" data-parent="#accordionreserva">
            <div class="card-body">
            	<!-- MANSO EMAIL -->
            	<div class="borde border border-success">
	            	<div class="row my-3">
		                <div class="col-sm-6"> <!-- panel izquierdo -->
		                    <br>
		                    <p class="mensajeservidor">Email a la bodega</p>
		                    <input type="text" id="emailcopiavpb" name="emailcopiavpb" placeholder="email con copia" class="form-control" maxlength="100" value="wgalimberti@winecity.com.ar" >

		                    <input type="text" id="titemailbvpb" name="titemailbvpb" placeholder="Titulo email" class="form-control" maxlength="100" value="Solicitud" >

		                    <input type="text" id="subtitemailbvpb" name="subtitemailbvpb" placeholder="Sub Titulo email" class="form-control" maxlength="100" value="Reserva" >
		                   	
		                </div>

	                   	<div class="col-sm-6"> <!-- panel derecho-->
		                    <p class="mensajeservidor">Vista previa de Email a la bodega</p>
		                    <div class="form-group green-border-focus">
			                        <input type="text" placeholder="Titulo del mensaje" id="titulovistapreviabodega" disabled="">

			                        <input type="text" placeholder="Sub Titulo del mensaje" id="subtitulovistapreviabodega" disabled="">
			                        
			                        <textarea class="form-control" placeholder="Mensaje vista previa" id="vistapreviabodega" rows="5" maxlength="255" ></textarea>
			                    </div>
		                </div>
		            </div>
		            <div class="row my-3">
		                <div class="col-sm-6">
		            		<input type="text" id="saludoemailbvpb" name="saludoemailbvpb" placeholder="Saludo del mensaje para bodega" class="form-control" maxlength="255" value=" Aguardo su confirmación, por favor responder a wgalimberti@winecity.com.ar" >
		            	</div>
		            	<div class="col-sm-2">
				    		<label class="w-100">email de la bodega</label>
						</div>	
		            	<div class="col-sm-4">
                   			<input class="w-100" type="text" id="emailbodegatraslada" value="" disabled="">
		            	</div>
	            	</div>
		            <div class="row my-3">
						<div class="col-sm-8">
							<button class="btn btn-info btn-block" id="vistaprevia">Vista previa</button>
						</div>
						<div class="col-sm-4">
							<button class="btn btn-info btn-block" id="emailbodega">Enviar mail a Bodega</button>
						</div>
				    </div>
				</div>
				<div class="row"></div>

				<div class="border border-success">
					<input class="btn-block" type="text" id="parte1" name="parte1" placeholder="Solicito por favor una reserva" value ="Solicito por favor una reserva " style="display: none;">
					<!-- ------------------------------  FILA 1 --------------------------------- -->
					<div class="row">
				    	<div class="col-sm-2">
				    		<label>Fecha desde</label>
						</div>	
						<div class="col-sm-2">
				    		<label>Fecha hasta</label>
						</div>
						<div class="col-sm-8">
				    		<label>Rango de fechas</label>
						</div>	
				    </div>
					<div class="row">
               			
               			<div class="col-sm-2">
							<input type="text" id="fechaactualdesde" value="" placeholder="desde" class="form-control">
							<div id="calendariodesde">

							</div>
						</div>
						<div class="col-sm-2">
							<input type="text" id="fechaactualhasta" value="" placeholder="hasta" class="form-control">
							<div id="calendariohasta">

							</div>
						</div>
						<div class="col-sm-4">
				   			<button class="btn btn-block" style="background-color: red;" id="botonparte2">entre</button>
				   		</div>
				   		<div class="col-sm-4">
				   			<button class="btn btn-block" style="background-color: red;" id="botonparte3">para</button>
				   		</div>
				    </div>
					<div class="row my-3">

						<input type="text" id="parte2" name="parte2" style="display: none;">
						<!-- ------------------------------  FILA 2 --------------------------------- -->
					    <input type="text" id="parte3" name="parte3" placeholder="para" value=" para "style="display: none;">
					    <input type="text" id="parte4" name="parte4" placeholder="a nombre de winecity por" value=" a nombre de Wine City por " style="display: none;">
						<input type="text" id="parte5" name="parte5" placeholder=" personas " value=" personas " style="display: none;">
			
						<input type="text" id="parte7" name="parte7" placeholder="a nombre de " value =" a nombre de " value=" procedentes de " style="display: none;">
						<input type="text" id="parte8" name="parte8" placeholder="paga " value=" paga " style="display: none;">
						<input type="text" id="cuerpoemailbvpb" style="display: none">
					</div>

					<div class="row">
				    	<div class="col-sm-2">
				    		<label>Hora reserva</label>
						</div>	
						<div class="col-sm-2">
				    		<label>Procedencia</label>
						</div>
						<div class="col-sm-8">
				    		<label>Quien paga</label>
						</div>	
				    </div>
					<div class="row">

                   		<div class="col-sm-2">
							<div id="relojemail" class="input-group clockpicker">
							    <input id="horaemail" type="text" placeholder="hora" class="form-control" value="">
							    <span class="input-group-addon">
							        <span class="glyphicon glyphicon-time"></span>
							    </span>
							</div>
						</div>
                   		<div class="col-sm-2">
                   			<input type="text" id="parte6" name="parte6" placeholder="procedencia" value="">
						</div>
                   		<div class="col-sm-4">
				   			<button class="btn btn-block" style="background-color: red;" id="botonpagapax">Pax</button>
				   		</div>
				   		<div class="col-sm-4">
				   			<button class="btn btn-block" style="background-color: red;" id="botonpagaagencia">Agencia</button>
				   		</div>
			   		</div>
                   		
                   	</div>

					<!-- ------------------------------  FILA 3 --------------------------------- -->
					<div class="row">
				    	<div class="col-sm-4">
				    		<label>Cantidad de personas</label>
						</div>	
						<div class="col-sm-4">
				    		<label>Consumo</label>
						</div>
						<div class="col-sm-4">
				    		<label>Nombre del cliente</label>
						</div>	
				    </div>
				    <div class="row">
				    	<div class="col-sm-4">
                   			<input class="w-100" type="text" id="personastraslado" value="">
						</div>	
						<div class="col-sm-4">
                   			<input class="w-100" type="text" id="consumotraslado" value="" disabled="">
						</div>
						<div class="col-sm-4">
                   			<input class="w-100" type="text" id="clientetraslado" value="" disabled="">
						</div>	
				    </div>
				    
			    </div>


		    </div>
	    </div>
    </div>
</div>
 
 <!-- --------------------------------------------- BLOQUE DATOS AGENDA  ------------------------------------------- -->
 <!-- --------------------------------------------- BLOQUE DATOS AGENDA  ------------------------------------------- -->
 <!-- --------------------------------------------- BLOQUE DATOS AGENDA  ------------------------------------------- -->
 <!-- --------------------------------------------- BLOQUE DATOS AGENDA  ------------------------------------------- -->
 <!-- --------------------------------------------- BLOQUE DATOS AGENDA  ------------------------------------------- -->
 <!-- --------------------------------------------- BLOQUE DATOS AGENDA  ------------------------------------------- -->

<div class="accordion" id="accordiondatos">
	<div class="card">
		<div class="card-header" id="headingGeneralDatos">
			<h5 class="mb-0">
	            <button class="btn btn-block" type="button" data-toggle="collapse" data-target="#collapseGeneralDatos" aria-expanded="true" aria-controls="collapseGeneralDatos">
	                <small><p class="btn btn-warning btn-block mensajeservidor text-dark">CREAR NUEVA RESERVA</small>
	            </button>
          </h5>
		</div>
		<div id="collapseGeneralDatos" class="collapse" aria-labelledby="headingGeneralDatos" data-parent="#accordiondatos">
            <div class="card-body">
            	
            	<!-- MANSO JUMBOTRON ----->
				<div class=" jumbotron-fluid" style="margin: 0px 5px 0px 5px">

					<div class="row" style="margin: 0px 5px 0px 5px">

						<div class="col-lg-4" align="center">

							<div class="row">
								<input type="text" id="fechaactual" value="" placeholder="fecha" class="form-control" disabled>
								
								<div id="calendario">

								</div>
							</div>
							<div class="row">

								<div id="relojagenda" class="input-group clockpicker">
								    <input id="horaseleccionada" type="text" placeholder="hora" class="form-control" value="" disabled>
								    <span class="input-group-addon">
								        <span class="glyphicon glyphicon-time"></span>
								    </span>
								</div>

							</div>
						</div>
						<div class="col-lg-2" align="center">
							<div class="row">
								<input type="text" id="montocliente" value="" placeholder="Monto" class="form-control" >
							</div>
							<div class="row">
								<input type="text" id="cantidadpersonas" value="" placeholder="Cantidad Personas" class="form-control" >
							</div>
							<br>
						</div>
						<div class="col-sm-6">
							<button class="btn btn-primary btn-lg btn-block" id="nuevasreservas" action="" type="submit"><small>Nueva Reserva</small></button>
						</div>
					</div>

					<div class="row" style="margin: 0px 5px 0px 5px">
						<!-- ----------------------- BODEGAS ------------------------------------ -->

						<div class="col-lg-6">

							<!-- -->

							<div class="accordion" id="accordionExample2"> <!--Acordeon -->
						        <div class="card">
							        <div class="card-header" id="headingTwo">
							          <h5 class="mb-0">
							            <button class="btn btn-block" type="button" data-toggle="collapse" data-target="#colapsobodega" aria-expanded="true" aria-controls="colapsobodega">
							                <p class="btn btn-info btn-block mensajeservidor text-dark">Bodegas</p>
							            </button>
							          
							            <div class="row">
					  						<div class="col-sm-8">
									            <input type="Text" id="idbodegaelegida"  width="80" style="display:none">
						  						<small><input type="Text" id="nombrebodegaelegida" class="form-control" placeholder="bodega elegida" disabled></small>
						  					</div>
					  						<div class="col-sm-2 offset-sm-2">
					  							<input id="vaciarbodega" value = '&#128396;' type='button' class = 'btn btn-sm btn-info'>
					  						</div>
				  						</div>
							          </h5>
							        </div>

							        <div id="colapsobodega" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample2">
							            <div class="card-body">
							                <!-- LO QUE SE VA A MOSTRAR EN LA TARJETA-->

							                <div class="row" style="display:none"> 
							                    <div class="offset-md-2 col-md-2">
							                        <input type="text" id="idbodega" name="idbodega" placeholder="Id" class="form-control"  value="<?php  if(isset($idbodega)) echo $idbodega ?>" >
							                    </div>
							                    <div class="offset-md-2 col-md-2">
							                        <input type="text" id="emailbodegaelegida" name="idbodega" placeholder="Id" class="form-control"  value="<?php  if(isset($emailbodegaelegida)) echo $emailbodegaelegida ?>" >
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
						<div class="col-lg-6">
							<!-- -----------------------LISTA DE CONSUMOS --------------------------------------- -->
					   		<div class="accordion" id="accordionExample1">
								<div class="card">
							        <div class="card-header" id="headingUno">
							          <h5 class="mb-0">
							            <button class="btn btn-block" type="button" data-toggle="collapse" data-target="#collapseDos" aria-expanded="true" aria-controls="collapseDos">
							                <p class="btn btn-info btn-block mensajeservidor text-dark">Consumos</p>
							            </button>
							      
							            <div class="row">
												<div class="col-sm-8">
									            <input type="Text" id="idconsumisionelegida" style="display:none">
													<small><input type="Text" id="nombreconsumisionelegida" class="form-control" placeholder="consumo elegido" disabled></small>
												</div>
												<div class="col-sm-2 offset-sm-2">
													<input id="vaciarconsumisiones" value = '&#128396;' type='button' class = 'btn btn-sm btn-info'>
												</div>
											</div>
							          </h5>
							        </div>


							        <div id="collapseDos" class="collapse" aria-labelledby="headingUno" data-parent="#accordionExample1">
							            <div class="card-body">
							                <!-- LO QUE SE VA A MOSTRAR EN LA TARJETA-->

							                <div class="row" style="display: none;">
							                    <div class="offset-md-3 col-md-2">
							                        <input type="text" id="idconsumo" name="idconsumo" placeholder="Id" class="form-control"  value="<?php  if(isset($idconsumo)) echo $idconsumo ?>" >
							                    </div>

							                    <div class="col-md-4">
							                        <form class="form-signin" action="">
							                            <button type="button"  class="btn btn-md btn-info btn-block" id="consultaconsumisiones_seleccionable_agenda"><small>Ver</small></button>
							                        </form>
							                    </div>
											</div>

							                <div class="table-responsive-sm">
							                    <table id="tabla_consumos" class="table table-sm w-auto table-bordered table-striped">
							   
							                        <thead>
							                            <tr class="btn-secondary">
                                    						<th scope="col"></th>
							                            	<th scope="col"></th>
							                                <th scope="col">#</th>
							                                <th scope="col">Descripción</th>
							                                <th scope="col" style="display: none;">Id empresa</th>
                											<th scope="col" style="display: none;">Id Tipo empresa</th>
                											<th scope="col">Nombre empresa</th>
                											<th scope="col">Precio Agencia</th>              
						                                    <th scope="col">Precio Público</th>
						                                    <th scope="col">Vigencia desde</th>
						                                    <th scope="col">Vigencia hasta</th>
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

					<div class="row" style="margin: 0px 5px 0px 5px">
						<!-- ------------------ LISTA DE SERVICIOS ---------------------------------------- -->

						<div class="col-lg-6">
							<div class="accordion" id="accordionExample4">
								<div class="card">
							        <div class="card-header" id="headingCuatro">
							          <h5 class="mb-0">
							            <button class="btn btn-block" type="button" data-toggle="collapse" data-target="#collapseCuatro" aria-expanded="true" aria-controls="collapseCuatro">
							                <p class="btn btn-info btn-block mensajeservidor text-dark">Hoteles</p>
							            </button>
							     
							            <div class="row">
								            <div class="col-sm-8">
									            <input type="Text" id="idhotelelegido" style="display:none">
						  						<small><input type="Text" id="nombrehotelelegido" class="form-control" placeholder="hotel elegido" disabled></small>
											</div>
					  						<div class="col-sm-2 offset-sm-2">
					  							<input id="vaciarhotel" value = '&#128396;' type='button' class = 'btn btn-sm btn-info'>
					  						</div>
				  						</div>
							          </h5>
							        </div>


							        <div id="collapseCuatro" class="collapse" aria-labelledby="headingCuatro" data-parent="#accordionExample4">
							            <div class="card-body">
							                <!-- LO QUE SE VA A MOSTRAR EN LA TARJETA-->
							                <div class="row"  style="display:none">
							                    <div class="offset-md-3 col-md-2">
							                        <input type="text" id="idhotel" name="idhotel" placeholder="Id" class="form-control"  value="<?php  if(isset($idhotel)) echo $idhotel ?>" >
							                    </div>

							                    <div class="col-md-4">
							                        <form class="form-signin" action="">
							                            <button type="button"  class="btn btn-md btn-info btn-block" id="consultahoteles_seleccionable"><small>Ver</small></button>
							                        </form>
							                    </div>
											</div>

							                <div class="table-responsive-sm">
							                    <table id="tabla_hoteles" class="table table-sm w-auto table-bordered table-striped">
							   
							                        <thead>
							                            <tr class="btn-secondary">
							                            	<th scope="col"></th>
							                                <th scope="col">#</th>
							                                <th scope="col">Nombre</th>
							                            </tr>
							                        </thead>
							                        <tbody id = "body_hoteles"> 


							                        </tbody>
							                    </table>
							                </div>
							            <!-- FIN DE MOSTRAR EN LA TARJETA-->
							            </div>
							        </div>
						      	</div>
							</div>
							
							

						</div> 
						<div class="col-lg-6">
							<!-- ------------------ LISTA DE HOTELES ---------------------------------- -->
							<div class="accordion" id="accordionExample3">
								<div class="card">
							        <div class="card-header" id="headingTres">
							          <h5 class="mb-0">
							            <button class="btn btn-block" type="button" data-toggle="collapse" data-target="#collapseTres" aria-expanded="true" aria-controls="collapseTres">
							                <p class="btn btn-info btn-block mensajeservidor text-dark">Servicios</p>
							            </button>
							         
							            <div class="row">
								            <div class="col-sm-8">
									            <input type="Text" id="idservicioelegido" style="display:none;">
						  						<small><input type="Text" id="nombreservicioelegido" class="form-control" placeholder="servicio elegido" disabled></small>
					  						</div>
								            <div class="col-sm-2 offset-sm-2">
					  							<input id="vaciarservicio" value = '&#128396;' type='button' class = 'btn btn-sm btn-info'>
					  						</div>
				  						</div>
							          </h5>
							        </div>


							        <div id="collapseTres" class="collapse" aria-labelledby="headingTres" data-parent="#accordionExample3">
							            <div class="card-body">
							                <!-- LO QUE SE VA A MOSTRAR EN LA TARJETA-->
							                <div class="row" style="display: none;">
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

					<br>
					<hr>
		<!-- --------------------------------------- CONTACTOS DE CLIENTES ----------------------------------------- -->
					<div class="row " style="margin: 0px 5px 0px 5px">
						<div class="col-lg-6">
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
							    		<div class="row">
											<div class="col-sm-8">
									            <input type="Text" id="idclienteelegido"  width="50" style="display:none">

												<input type="text" id="nombreclienteelegido" class="form-control" placeholder="nombre cliente" disabled  value="<?php  if(isset($nombreclienteelegido)) echo $nombreclienteelegido ?>" ><span id="faltanombrecliente" style="display:none">Ingrese un nombre</span>
												
												<input type="email" id="emailclienteelegido" class="form-control" placeholder="email cliente" disabled  value="<?php  if(isset($emailclienteelegido)) echo $emailclienteelegido ?>" ><span id="faltaemail" style="display:none">Ingrese un email</span>
											</div>
											<div class="col-sm-2 offset-sm-2">
					  							<input id="vaciarcliente" value = '&#128396;' type='button' class = 'btn btn-sm btn-info'>
					  						</div>
										</div>
							        </div>


									<div id="colapsoclientes" class="collapse" aria-labelledby="cabeceraClientes" data-parent="#idacorclientes">
					            		<div class="card-body">
							            	<div class="row">
							            		<div class="offset-md-1 col-md-4">
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
							                                <th scope="col">nombre</th>
							                                                             
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

	<!--  ------------------------------------- LISTAS DE CONTACTOS ------------------------------------->
						<div class="col-lg-6">
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
							    		<div class="row">
								    		<div class="col-sm-8">
									            <input type="Text" id="idcontactobodegaelegido"  width="50" style="display:none">

						  						<input type="Text" id="contactobodegaelegido" class="form-control" placeholder="contacto elegido"  disabled><span id="faltanombre" style="display:none"><small>	Ingrese un Nombre</small></span>
						  					</div>
					  						<div class="col-sm-2 offset-sm-2">
					  							<input id="vaciarcontacto" value = '&#128396;' type='button' class = 'btn btn-sm btn-info'>
					  						</div>
								        </div>
							        </div>
									
									<div id="colapsocontacto" class="collapse" aria-labelledby="cabeceraContactos" data-parent="#idacorcontacto">
					            		<div class="card-body">
							            	<div class="row">
							            		<div class="offset-md-1 col-md-4">
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

						</div>
				
					</div> <!--fin row dentro del jumbotron -->
					<br>
					<hr>
					<div class="row">
						<div class="col-sm-6">
							<small><p class="mensajeservidor">Observaciones</p></small>
						    <div class="form-group green-border-focus">
							  <textarea class="form-control" placeholder="Observaciones" id="observaciones" rows="3" maxlength="150"></textarea>
							</div>
						</div>
						<div class="col-sm-6">
							<p class="mensajeservidor">Verificador al Agregar item</p>
							<div class="row">
								<div class="offset-sm-2 col-sm-2" align="left">
									 <div class="form-check">
									    <input type="checkbox" class="form-check-input" id="chkHoteles" checked>
									    <label class="form-check-label" for="chkHoteles">Hoteles</label>
									  </div>
								</div>
								<div class="col-sm-2" align="left">
									 <div class="form-check">
									    <input type="checkbox" class="form-check-input" id="chkBodegas" checked>
									    <label class="form-check-label" for="chkBodegas">Bodegas</label>
									  </div>
								</div>
								<div class="col-sm-2" align="left">
									  <div class="form-check">
									    <input type="checkbox" class="form-check-input" id="chkConsumisiones" checked>
									    <label class="form-check-label" for="chkConsumisiones">Consumisiones</label>
									  </div>
								</div>
								<div class="col-sm-2" align="left">
									  <div class="form-check">
									    <input type="checkbox" class="form-check-input" id="chkServicios" checked>
									    <label class="form-check-label" for="chkServicios">Servicios</label>
									  </div>
								</div>
							</div>
						</div>

					</div>
					
					
				</div>
							
								
								
							
							
            	<!-- FIN MANSO JUMBOTRON -->

				
				<div class="row justify-content-center">
					<div class="offset-sm-1 col-sm-8">
						<button class="btn btn-primary btn-lg btn-block" id="agregarreserva" action="" type="submit" disabled><small>Agregar Item</small></button>
						<p id="mensaje" style="display: none" class='alert alert-warning mensajeservidor' role='alert'></p>
					</div>
				</div>

            </div>
        </div>
	</div>

</div>

<!-- -----------------------------------------------------BLOQUE DATOS RESERVA -------------------------------------- -->
<!-- -----------------------------------------------------BLOQUE DATOS RESERVA -------------------------------------- -->
<!-- -----------------------------------------------------BLOQUE DATOS RESERVA -------------------------------------- -->
<!-- -----------------------------------------------------BLOQUE DATOS RESERVA -------------------------------------- -->
<!-- -----------------------------------------------------BLOQUE DATOS RESERVA -------------------------------------- -->
<!-- -----------------------------------------------------BLOQUE DATOS RESERVA -------------------------------------- -->


<div class="accordion" id="accordionreserva">
	<div class="card">
		<div class="card-header" id="headingGeneralReserva">
			<h5 class="mb-0">
				<button class="btn btn-block" type="button" data-toggle="collapse" data-target="#collapseGeneralReserva" aria-expanded="true" aria-controls="collapseGeneralReserva">
                	<small><p class="btn btn-warning btn-block mensajeservidor text-dark">VER RESERVAS GUARDADAS</small>
            	</button>
          </h5>
		</div>
		<!-- ------------------------------------------- CAMPOS INFO RESERVA  ----------------------------------------- -->
		<div id="collapseGeneralReserva" class="collapse" aria-labelledby="headingGeneralReserva" data-parent="#accordionreserva">
            <div class="card-body">
            	<div class="row justify-content-center">
					<div class="col-sm-2">
						<input type="text" id="fechaactualver1" value="" placeholder="fecha" class="form-control">
						<div id="calendariover1">

						</div>
					</div>
					<div class="col-sm-2">
						<input type="text" id="fechaactualver2" value="" placeholder="fecha" class="form-control">
						<div id="calendariover2">

						</div>
					</div>
					<div class="col-sm-4">
						<button class="btn btn-success btn-lg btn-block" id="veragenda" action="" type="submit"><small>Ver Reservas</small></button>
					</div>
					<div class="col-sm-4">
						<button class="btn btn-primary btn-lg btn-block" id="agendar" action="" type="submit" disabled><small>Guardar Reserva</small></button>
					</div>
				</div>
            	<!-- MANSA RESERVA -->
				<div class="border border-success">
					<small><h5 class="mensajeservidor">RESERVAS</h5></small>
					<div  id="datosadicionales">
						
						<!-- fila de datos 1 -->
						
						<div class="row justify-content-center">
							<div class="col">
								<div class="row justify-content-center">
									<div class="col-xs-1"></div>

									<div class="col-xs-1">
										<input type="text" id="contactoeditado"  style="display: none" align="middle" disabled> Contacto 
									</div>
									<div class="col-xs-1">
										<input type="text" id="fechaeditada"  style="display: none" align="middle" disabled> Fecha carga 
									</div>
									<div class="col-xs-1">
										<input type="text" id="estadoeditado"  style="display: none" align="middle" disabled> Estado 
									</div>
									<div class="col-xs-1">
										<input id="botoneliminar" style="display: none" type='button' value = '&#10008;' class = 'quitar btn btn-sm btn-danger'> Eliminar registro 
									</div>
									<div class="col-xs-1"></div>

								</div>
							</div>
							<div class="col">
								<div class="row justify-content-center">
									<div class="col-xs-1">
										<input type="Text" align="center" id="id_agendado" style="display: none" align="middle" disabled>Id Seleccionado 
									</div>
									<input type="Text" id="id_estadoagendado" style="display: none" align="center" disabled>
								
									<div class="col-xs-1">
										<input type="Text" id="emailclienteenviar" style="display: none;color:blue;" align="middle" disabled> Email cliente 
									</div>
									<div class="col-xs-1">
										<input type="Text" id="nombreclienteenviar" style="display: none;color:blue;" align="middle" disabled> Nombre cliente 
									</div>
									<div class="col-xs-1">
										<input type="Text" id="id_clientemodificado" style="display: none" align="middle" disabled> id cliente
									</div>
									
									<div class="col-xs-1" id="botonclienteseditado"  style="display: none;color:blue;" >
										<input id="botoncliente" value = '&#x1F935;' type='button' class = 'btn btn-sm btn-info'> Cliente .
									</div>
									

									<div class="col-xs-1" id="botonactualizaclienteeditado" style="display: none;color:blue;">
										<input id="actualizaremail" type='button' value = '&#128190;' class = 'btn btn-sm btn-info'> Guardar .
									</div>						
								</div>						
							</div>
						</div>
					</div>
				</div>
				<br>
				<div  class="border border-success">
					<div class="col">
						<div  class="border border-success" style="margin: 0.5em;">

						<input type="Text" id="idreserva" style="display: none" disabled>

						<div class="row justify-content-center">
							<div class="col-xs-1">
								<button class="btn btn-success btn-block" id="confirmado"  style="display: none" disabled>Confirmar</button>
							</div>
							<div class="col-xs-1">
								<button class="btn btn-secondary btn-block" id="disponible"  style="display: none" disabled>Disponible</button>
							</div>
							<div class="col-xs-1">
								<button class="btn btn-danger btn-block" id="cancelado"  style="display: none" disabled>Cancelar</button>
							</div>
							<div class="col-xs-1">
								<button class="btn btn-info btn-block" id="emailcliente"  style="display: none" disabled>Enviar mail a Cliente</button>
							</div>
							
						</div>

						<div id="botones" style="display: none">
							<div class="col-xs-1">
								<div class="input-group">
						          <div class="input-group-prepend">
						            <div class="input-group-text">
						            <input type="radio" aria-label="Radio button for following text input" id="radioespaniol" name="radioespaniol" checked>
						            </div>
						          </div>
						          <input type="text" class="form-control" aria-label="Text input with radio button" value="Español" disabled>
						        </div>
					        </div>
							<div class="col-xs-1">
								<div class="input-group">
						          <div class="input-group-prepend">
						            <div class="input-group-text">
						            <input type="radio" aria-label="Radio button for following text input" id="radioingles" name="radioingles">
						            </div>
						          </div>
						          <input type="text" class="form-control" aria-label="Text input with radio button" value="Inglés" disabled>
						        </div>
							</div>
							<div class="col-xs-1">
								<div class="input-group">
						          <div class="input-group-prepend">
						            <div class="input-group-text">
						            <input type="radio" aria-label="Radio button for following text input" id="radioportugues" name="radioportugues">
						            </div>
						          </div>
						          <input type="text" class="form-control" aria-label="Text input with radio button" value="Portugues" disabled>
						        </div>
							</div>
						</div>
						
						</div>
						<!-- ------------------------------------ CAMPOS INVISIBLES ---------------------------------- -->
						<div class="row">	
							<input type="Text" style="display: none" id="emailbodegaenviar" >
							<input type="Text" style="display: none" id="estadoenviar" >
							<!-- ------------------------- texto para el email ------------------------- -->
							<input type="Text" style="display: none" id="titemailc" >
							<input type="Text" style="display: none" id="subtitemailc" >
							<input type="Text" style="display: none" id="cuerpoemailc" >
	
							<input type="Text" style="display: none" id="bodegareserva">
							<input type="Text" style="display: none" id="hotelreserva" >
							<input type="Text" style="display: none" id="fechareserva" >
							<input type="Text" style="display: none" id="horareserva" >
							<input type="Text" style="display: none" id="cantidadpersonasreserva" >
							<input type="Text" style="display: none" id="emailcopia">
						</div>
						
						<!-- -------------------------------- FIN CAMPOS INVISIBLES --------------------------------- -->

						<div class="row justify-content-center">
							<div class="col-xs-12" align="center">
								<label class="mensajeservidor" id="infoemail" style="display: none" disabled></label>
							</div>
						</div>
			
						<div class="table-responsive-md">

						    <table id="tabla_agenda" class="table w-auto table-bordered">

						        <thead>

						            <tr class="btn-secondary">

						                <th scope="col"></th>

						                <th scope="col">Id</th>

						                <th scope="col">fecha</th>

						                <th scope="col">hora</th>

						                <th scope="col" style="display:none;">id Hot</th>

						                <th scope="col">Hotel</th>

						                <th scope="col" style="display:none;">id Bod</th>

						                <th scope="col">Bodega</th>

						                <th scope="col" style="display:none;">id Consumo</th>

						                <th scope="col">Consumo</th>

						                <th scope="col" style="display:none;">id servicio</th>

						                <th scope="col">Servicio</th>

						                <th scope="col" style="display:none;">id cliente</th>

						                <th scope="col">Cliente</th>

						                <th scope="col">Nombre</th>

						                <th scope="col">Monto</th>

						                <th scope="col">Cantidad</th>
						                
						                <th scope="col">Observaciones</th>

						                <th scope="col" style="display:none;">id Contacto</th>

						                <th scope="col" style="display:none;">Contacto</th>

						                <th scope="col" style="display:none;">id Estado</th>

						                <th scope="col" style="display:none;">Estado</th>

						                <th scope="col" style="display:none;">Fecha carga</th>

						                
						            </tr>

						        </thead>

						        <tbody id = "body_agenda"> 



						        </tbody>

						    </table>
						</div>
					</div>
				</div>

				</div>

	        	<!-- FIN MANSA RESERVA -->
            </div>
        </div>
    </div>

<!-- ----------------------------------------------- BLOQUE DISPONIBILIDAD VEHICULOS ----------------------------------- -->
<!-- ----------------------------------------------- BLOQUE DISPONIBILIDAD VEHICULOS ----------------------------------- -->
<!-- ----------------------------------------------- BLOQUE DISPONIBILIDAD VEHICULOS ----------------------------------- -->
<!-- ----------------------------------------------- BLOQUE DISPONIBILIDAD VEHICULOS ----------------------------------- -->
<!-- ----------------------------------------------- BLOQUE DISPONIBILIDAD VEHICULOS ----------------------------------- -->
<!-- ----------------------------------------------- BLOQUE DISPONIBILIDAD VEHICULOS ----------------------------------- -->

	<div class="accordion" id="accordiondispo">
		<div class="card">
			<div class="card-header" id="headingGeneralDispo">
				<h5 class="mb-0">
					<button class="btn btn-block" type="button" data-toggle="collapse" data-target="#collapseGeneralDisp" aria-expanded="true" aria-controls="collapseGeneralDisp">
	                	<small><p class="btn btn-warning btn-block mensajeservidor text-dark">DATOS DISPONIBILIDAD</small>
	            	</button>
	          </h5>
			</div>
			<!-- ------------------------------------------- CAMPOS INFO RESERVA  ----------------------------------------- -->
			<div id="collapseGeneralDisp" class="collapse" aria-labelledby="headingGeneralDispo" data-parent="#accordiondispo">
	            <div class="card-body">
					<div  class="border border-success">
						<div class="col">
							<div class="table-responsive-md">

							    <!-- <table id="tabla_agenda" class="table w-auto table-bordered"> -->
							    <table id="tabla_disponibilidad" class="table w-auto table-bordered">

							        <thead>

							            <tr class="btn-secondary">

							                <th scope="col">Id</th>

							                <th scope="col">fecha</th>

							                <th scope="col" style="display:none;">id servicio</th>

							                <th scope="col">Servicio</th>

							                <th scope="col" style="display:none;">id cliente</th>

							                <th scope="col">Nombre</th>

							                <th scope="col">Cantidad</th>
							            </tr>
							        </thead>

							        <!-- <tbody id = "body_agenda">  -->
							        <tbody id = "body_disponibilidad"> 



							        </tbody>

							    </table>
							</div>
						</div>
					</div>

				</div>

		        	<!-- FIN MANSA DISPONIBILIDAD -->
	        </div>
	    </div>
    </div>
</div>

<script>
    /* ---------------------------------------------------- SCRIPTS ------------------------------------------------ */
    /* ---------------------------------------------------- SCRIPTS ------------------------------------------------ */
    /* ---------------------------------------------------- SCRIPTS ------------------------------------------------ */
    /* ---------------------------------------------------- SCRIPTS ------------------------------------------------ */
    /* ---------------------------------------------------- SCRIPTS ------------------------------------------------ */
    /* ---------------------------------------------------- SCRIPTS ------------------------------------------------ */
    /* ---------------------------------------------------- SCRIPTS ------------------------------------------------ */
    /* ---------------------------------------------------- SCRIPTS ------------------------------------------------ */

	function diadehoy()
	{
		var now = new Date();
		var day = ("0" + now.getDate()).slice(-2);
		var month = ("0" + (now.getMonth() + 1)).slice(-2);
		var today = (day)+"-"+(month)+"-"+now.getFullYear();
		return today;
	}

	function diahasta(dias)
	{
		var now = new Date();
		var day = ("0" + now.getDate() + 15).slice(-2);
		var dia = parseInt(day) + dias;
		var month = ("0" + (now.getMonth() + 1)).slice(-2);
		var today = now.getFullYear()+"-"+(month)+"-"+(dia);
		return today;
	}

	function formatearfecha(fecha)
	{
		var fechaEjemplo  = moment(fecha).format('DD/MM/YYYY');
		return fechaEjemplo;
	}
</script>
<script type="text/javascript">

$(document).ready(function()
{
	// -------------------- Formateo de fechas ---------------------------------
	$('#fechaactual').val(diadehoy());
	$('#fechaactual').change(function(){

		$('#fechaactual').val( formatearfecha( $('#fechaactual').val() )   );
	});


	//$('#fechaactualdesde').val(diadehoy()); //fechas para enviar email a bodega
	//$('#fechaactualhasta').val(diadehoy());
	//$('#fechaactualdesde').val( formatearfecha( $('#fechaactualdesde').val() )   );
	$('#fechaactualdesde').change(function(){
		$('#fechaactualdesde').val( formatearfecha( $('#fechaactualdesde').val() )   );
	});
	//$('#fechaactualhasta').val( formatearfecha( $('#fechaactualhasta').val() )   );
	$('#fechaactualhasta').change(function(){
		$('#fechaactualhasta').val( formatearfecha( $('#fechaactualhasta').val() )   );
	});


	$('#fechaactualver1').val(diadehoy()); //fechas para ver la agenda
	$('#fechaactualver2').val(diadehoy());
	$('#fechaactualver1').change(function(){
		$('#fechaactualver1').val( formatearfecha( $('#fechaactualver1').val() )   );
		
	});
	$('#fechaactualver2').change(function(){
		$('#fechaactualver2').val( formatearfecha( $('#fechaactualver2').val() )  );
	});




	$("#vaciarcontacto").click(function(){ //acordeon de hoteles
		$("#idcontactobodegaelegido").val("");
		$("#contactobodegaelegido").val("");
	});


	$("#vaciarcliente").click(function(){ //acordeon de hoteles
		$("#idclienteelegido").val("");
		$("#emailclienteelegido").val("");
		$("#nombreclienteelegido").val("");
	});

	$("#vaciarhotel").click(function(){ //acordeon de hoteles
		$("#idhotelelegido").val("");
		$("#nombrehotelelegido").val("");
	});

	$("#vaciarconsumisiones").click(function(){ //acordeon de hoteles
		$("#idconsumisionelegida").val("");
		$("#nombreconsumisionelegida").val("");
	});

	$("#vaciarbodega").click(function(){ //acordeon de hoteles
		$("#idbodegaelegida").val("");
		$("#nombrebodegaelegida").val("");
	});

	$("#vaciarservicio").click(function(){ //acordeon de hoteles
		$("#idservicioelegido").val("");
		$("#nombreservicioelegido").val("");
	});

	$("#accordionExample4").click(function(){ //acordeon de hoteles
		consulta_hoteles("seleccionable");
	});
	

	$("#accordionExample3").click(function(){ //acordeon de servicios
		consulta_servicios("seleccionable");
	});

	$("#accordionExample2").click(function(){ //acordeon de bodegas
		consulta("seleccionable");
	});

	$("#accordionExample1").click(function(){ //acordeon de consumisiones
		if($("#idbodegaelegida").val() == ""){
			consulta_consumisiones("seleccionable","consultadeagendabodega",0, 0);
		}
		else{
			consulta_consumisiones("seleccionable","consultadeagendabodega",1, $("#idbodegaelegida").val() );
		}
	});
	

	$("#actualizaremail").click(function(){
		actualizaremailclienteagenda( $("#id_agendado").val(), $("#id_clientemodificado").val() );
	});

	function elegirclientes(){			
		$("#collapseGeneralDatos").collapse("show");
		$("#colapsoclientes ").collapse("show");
	}
	
	$("#botoncliente").click(function(){

		elegirclientes();
	});

	function leeidagendado()
	{
		eliminarregistroagenda( $("#id_agendado").val());
	}

	$("#botoneliminar").click(function(){
		leeidagendado();
	});

	$("#nuevasreservas").click(function()
	{
		document.getElementById("horaseleccionada").disabled = false;
		document.getElementById("fechaactual").disabled = false;
        document.getElementById("agregarreserva").disabled = false;

		$("#collapseGeneralReserva").collapse("hide");
		$("#collapseGeneralDatos").collapse("show");

	});

	$("#veragenda").click(function()
	{
		consultaagenda();
		consultadisponibilidad(); 
		document.getElementById("horaseleccionada").disabled = true;
		document.getElementById("fechaactual").disabled = true;
        document.getElementById("agregarreserva").disabled = true;
        document.getElementById("agendar").disabled = true;

		$("#collapseGeneralReserva").collapse("show");
		$("#collapseGeneralDatos").collapse("hide");

	});

	$("#agregarreserva").click(function()
	{
		AgregaBotonEvento();
        document.getElementById("agendar").disabled = false;
		$("#collapseGeneralReserva").collapse("show");
	});
	
	$("#agendar").click(function(){

		guardaragenda();
	});


	$("#vistaprevia").click(function(){
    	vistapreviabodega();
	});

	/*cuando elige entre fechas*/
	$("#botonparte2").click(function(){
		$("#parte2").val(" entre fechas " + $("#fechaactualdesde").val() + " y " + $("#fechaactualhasta").val() + " ");
		document.getElementById("fechaactualhasta").style.display = "block";

		document.getElementById("botonparte2").style.backgroundColor = "#81F79F";
		document.getElementById("botonparte3").style.backgroundColor = "red";

	});
	
	/*cuando elige desde fecha*/
	$("#botonparte3").click(function(){
		$("#parte2").val(" para el " + $("#fechaactualdesde").val() + " ");
		document.getElementById("fechaactualhasta").style.display = "none";
		document.getElementById("botonparte2").style.backgroundColor = "red";
		document.getElementById("botonparte3").style.backgroundColor = "#81F79F";
	});

	$("#botonpagapax").click(function(){
		$("#parte8").val(" paga pax");
		document.getElementById("botonpagapax").style.backgroundColor = "#81F79F";
		document.getElementById("botonpagaagencia").style.backgroundColor = "red";
	});
	
	$("#botonpagaagencia").click(function(){
		$("#parte8").val(" paga agencia");
		document.getElementById("botonpagaagencia").style.backgroundColor = "#81F79F";
		document.getElementById("botonpagapax").style.backgroundColor = "red";
	});



	if($("#emailbodegatraslada").val() == "")
	{
		document.getElementById("emailbodegatraslada").style.backgroundColor = "#FA5858";
		document.getElementById("emailbodega").disabled = true;
	}else{
		document.getElementById("emailbodegatraslada").style.backgroundColor = "#81F79F";
		document.getElementById("emailbodega").disabled = false;

	}
	if($("#consumotraslado").val() == "")
	{
		document.getElementById("consumotraslado").style.backgroundColor = "#FA5858";
	}else{
		document.getElementById("consumotraslado").style.backgroundColor = "#81F79F";
	}
	if($("#clientetraslado").val() == "")
	{
		document.getElementById("clientetraslado").style.backgroundColor = "#FA5858";
	}else{
		document.getElementById("clientetraslado").style.backgroundColor = "#81F79F";
	}


	$("#personastraslado").focusout(function(){
		if($("#personastraslado").val() == "")
		{
    		document.getElementById("personastraslado").style.backgroundColor = "red";
    	}else{
    		document.getElementById("personastraslado").style.backgroundColor = "#81F79F";
    	}
	});
	if($("#personastraslado").val() == "")
	{
		document.getElementById("personastraslado").style.backgroundColor = "red";
	}else{
		document.getElementById("personastraslado").style.backgroundColor = "#81F79F";
	}

	if($("#horaemail").val() == "")
	{
		document.getElementById("horaemail").style.backgroundColor = "red";
	}else{
		document.getElementById("horaemail").style.backgroundColor = "#81F79F";
	}
	$("#horaemail").change(function(){
		if($("#horaemail").val() == "")
		{
    		document.getElementById("horaemail").style.backgroundColor = "red";
    	}else{
    		document.getElementById("horaemail").style.backgroundColor = "#81F79F";
    	}
	});

	if($("#fechaactualdesde").val() == "")
	{
		document.getElementById("fechaactualdesde").style.backgroundColor = "red";
	}else{
		document.getElementById("fechaactualdesde").style.backgroundColor = "#81F79F";
	}
	$("#fechaactualdesde").change(function(){
		if($("#fechaactualdesde").val() == "")
		{
    		document.getElementById("fechaactualdesde").style.backgroundColor = "red";
    	}else{
    		document.getElementById("fechaactualdesde").style.backgroundColor = "#81F79F";
    	}
	});

	if($("#fechaactualhasta").val() == "")
	{
		document.getElementById("fechaactualhasta").style.backgroundColor = "red";
	}else{
		document.getElementById("fechaactualhasta").style.backgroundColor = "#81F79F";
	}
	$("#fechaactualhasta").change(function(){
		if($("#fechaactualhasta").val() == "")
		{
    		document.getElementById("fechaactualhasta").style.backgroundColor = "red";
    	}else{
    		document.getElementById("fechaactualhasta").style.backgroundColor = "#81F79F";
    	}
	});

	if($("#parte6").val() == "")
	{
		document.getElementById("parte6").style.backgroundColor = "red";
	}else{
		document.getElementById("parte6").style.backgroundColor = "#81F79F";
	}
	$("#parte6").focusout(function(){
		if($("#parte6").val() == "")
		{
    		document.getElementById("parte6").style.backgroundColor = "red";
    	}else{
    		document.getElementById("parte6").style.backgroundColor = "#81F79F";
    	}
	});

	validarcliente();
	validarconsumo();
	validaremailbodega();
});
</script>



<?php

    include("funciones/agendafunciones.php");

	include("funciones/emailfunciones.php");

	include("funciones/clientesfunciones.php");

	include("funciones/contactosbodegasfunciones.php");

    include("funciones/bodegasfunciones.php");

    include("funciones/consumisionesfunciones.php");

    include("funciones/serviciosfunciones.php");

    include("funciones/hotelesfunciones.php");

?>