<?php
    include("funciones/serviciosfunciones.php");
?>

<div class="border border-success">
    <h2 class="mensajeservidor" align="center">SERVICIOS</h2>
                                                        <!--  ACORDEON -->
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
              <h5 class="mb-0">
                                                    <!-- ID - BOTON Y LISTA-->
                <button class="btn btn-info btn-block" type="button" data-toggle="collapse" data-target="#collapseOneS" aria-expanded="true" aria-controls="collapseOneS">
                  <p class="mensajeservidor" align="center">Alta de Servicios</p>
                </button>
              </h5>
            </div>

            <div id="collapseOneS" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
              <div class="card-body">
                <!-- LO QUE SE VA A MOSTRAR EN LA TARJETA-->
                <div class="row" align="center">
                        <input type="text" id="id" name="id" class="form-control" placeholder="id Automática" disabled><br>
                        <div class="col">
                          <input type="text" id="nombrenuevo" name="nombrenuevo" class="form-control" placeholder="Nombre" value="<?php  if(isset($nombrenuevo)) echo $nombrenuevo ?>"  required autofocus><span id="faltanombre" style="display:none">Ingrese un Nombre</span>
                        </div>
                    </div>
                                                    <!-- CONTENEDOR DE MENSAJES -->
                    <div class="contenedorrespuesta" align="center">
                        <div class="contenedorrespuesta" align="center">
                            <?php  if($respuesta !="") echo "<p class='alert alert-warning mensajeservidor' role='alert'>$respuesta</p>"; ?>
                        </div>
                    </div>
                    <br>
                    <br>                                            <!-- BOTONES-->
                    <div class="row">
                        <div class="offset-md-4 col-md-4">
                            <form class="form-signin" action="">
                                <button type="button"  class="btn btn-md btn-primary btn-block" id="guardarservicio" name="guardar"> Guardar</button>
                            </form>
                        </div>
                        <div class="col-md-2">
                            <form class="form-signin" action="">
                                <button type="button"  class="btn btn-md btn-info btn-block" id="nuevoservicio" name="nuevo"> Nuevo</button>
                            </form>
                        </div>
                    </div>
                    <br>
                <!-- FIN DE MOSTRAR EN LA TARJETA-->
              </div>
            </div>
      </div>

      <div class="card">
        <div class="card-header" id="headingTwo">
          <h5 class="mb-0">
            <button class="btn btn-info btn-block" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <p class="mensajeservidor text-danger">Lista de servicios</p>
            </button>
          </h5>
        </div>

        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
                <!-- LO QUE SE VA A MOSTRAR EN LA TARJETA-->
                <div class="row">
                    <div class="offset-md-3 col-md-1">
                        <input type="text" id="idservicio" name="idservicio" placeholder="Id" class="form-control"  value="<?php  if(isset($idservicio)) echo $idservicio ?>" >
                    </div>
                    <div class="col-md-4">
                        <form class="form-signin" action="">
                            <button type="button"  class="btn btn-md btn-info btn-block" id="consultaservicios_abm"> Ver</button>
                        </form>
                    </div>
                </div>
                <div class="table-responsive-md">
                    <table id="tabla_servicios" class="table w-auto table-bordered table-striped">
                        <thead>
                            <tr class="btn-info">
                                <th scope="col"></th>
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
                                                    <!-- FIN ACORDEON -->



