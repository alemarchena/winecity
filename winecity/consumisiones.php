<?php
    include("funciones/consumisionesfunciones.php");
?>

<div class="border border-success">
    <h2 class="mensajeservidor" align="center">CONSUMISIONES</h2>

                                                        <!--  ACORDEON -->
    <div class="accordion" id="accordionExampleabm">
        <div class="card">
            <div class="card-header" id="headingOne">
              <h5 class="mb-0">
                                                    <!-- ID - BOTON Y LISTA-->
                <button class="btn btn-info btn-block" type="button" data-toggle="collapse" data-target="#collapseOneC" aria-expanded="true" aria-controls="collapseOneC">
                  <p class="mensajeservidor" align="center">Alta de Consumos</p>
                </button>
              </h5>
            </div>

            <div id="collapseOneC" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExampleabm">
                <div class="card-body">
                    <!-- LO QUE SE VA A MOSTRAR EN LA TARJETA-->
                    
                    <div class="row" align="center">
                        <div class="col-sm-1 ">
                            <input class="w-100" type="text" id="idempresa" value="0" disabled="" style="display: none;">
                        </div>
                        <div class="col-sm-1 ">
                            <input class="w-100" type="text" id="idtipoempresa" value="0" disabled="" style="display: none;">
                        </div>
                        <div class="col-sm-1 ">
                            <input type="text" id="idconsumision" name="idconsumision" class="form-control" placeholder="id Automática" disabled>
                        </div>
                        <br>
                        <div class="col-sm-5">
                          <input type="text" id="nombrenuevoconsumision" name="nombrenuevoconsumision" class="form-control" placeholder="Nombre" value="<?php  if(isset($nombrenuevoconsumision)) echo $nombrenuevoconsumision ?>"  required autofocus><span id="faltanombreconsumision" style="display:none">Ingrese un Nombre</span>
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
                            <div class="offset-sm-3 col-sm-5">
                                <form class="form-signin" action="">
                                    <button type="button"  class="btn btn-md btn-primary btn-block" id="guardar" name="guardar"> Guardar</button>
                                </form>
                            </div>
                            <div class="col-md-2">
                                <form class="form-signin" action="">
                                    <button type="button"  class="btn btn-md btn-info btn-block" id="nuevo" name="nuevo"> Nuevo</button>
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
                <p class="mensajeservidor text-danger">Lista de consumos</p>
            </button>
          </h5>
        </div>

        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExampleabm">
            <div class="card-body">
                <!-- LO QUE SE VA A MOSTRAR EN LA TARJETA-->
                
                <div class="row" style="display: none;">
                    <div class="offset-md-3 col-md-1">
                        <input type="text" id="idconsumo" name="idconsumo" placeholder="Id" class="form-control"  value="<?php  if(isset($idconsumo)) echo $idconsumo ?>">
                    </div>
                    <div class="col-md-4">
                        <form class="form-signin" action="">
                            <button type="button"  class="btn btn-md btn-info btn-block" id="consultaconsumisiones_abm"> Ver</button>
                        </form>
                    </div>
                </div>
            
                <div class="table-responsive-md">
                    <table id="tabla_consumos" class="table w-auto table-bordered table-striped">
                        <thead>
                            <tr class="btn-info">
                                <th scope="col"></th>
                                <th scope="col"></th> 
                                <th scope="col">#</th>
                                <th scope="col">Nombre consumisión</th> 
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
                                                    <!-- FIN ACORDEON -->



<script type="text/javascript">
    $("#accordionExampleabm").click(function(){ //acordeon de hoteles
        consulta_consumisiones("abm","consultadeagendabodega",0,0); 
        //parametros: tipo de consulta para objetos elim-editar,tipo consulta para bdd,tipo empresa, empresa
    });
</script>