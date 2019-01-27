<div class="border border-success">
    <h2 class="mensajeservidor" align="center">BODEGAS</h2>

                                                        <!--  ACORDEON -->

    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
              <h5 class="mb-0">
                                                    <!-- ID - BOTON Y LISTA-->

                <button class="btn btn-info btn-block" type="button" data-toggle="collapse" data-target="#collapseOneB" aria-expanded="true" aria-controls="collapseOneB">
                  <p class="mensajeservidor" align="center">Alta de Bodegas</p>
                </button>
              </h5>
            </div>

            <div id="collapseOneB" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
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
                                                                <!-- CAMPOS -->
                    <label for="email" class="sr-only">email</label>
                    <input type="email"  name="email" id="email" class="form-control" placeholder="Email" value="<?php  if(isset($email)) echo $email ?>" required autofocus>
                    <br>
                    <input type="text" id="telefono" name="telefono" class="form-control" placeholder="Teléfono" value="<?php  if(isset($telefono)) echo $telefono ?>"><span id="faltatelefono" style="display:none">Escribe un teléfono</span>

                    <br>                                            <!-- BOTONES-->
                    <div class="row">
                        <div class="offset-md-4 col-md-4">
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
        <!-- ------------------------------------------TARJETA LISTA DE BODEGAS ----------------------------------------- -->
        


        <div class="card">
            <div class="card-header" id="headingTwo">
              <h5 class="mb-0">
                <button class="btn btn-info btn-block" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <p class="mensajeservidor text-danger">Lista de Bodegas</p>
                </button>
              </h5>
            </div>

            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    <!-- LO QUE SE VA A MOSTRAR EN LA TARJETA-->
                    <div class="row" style="display: none;">
                        <div class="offset-md-3 col-md-1">
                            <input type="text" id="idbodega" name="idbodega" placeholder="Id" class="form-control"  value="<?php  if(isset($idbodega)) echo $idbodega ?>" >
                        </div>
                        <div class="col-md-4">
                            <form class="form-signin" action="">
                                <button type="button"  class="btn btn-md btn-info btn-block" id="consultabodegas_abm"> Ver</button>
                            </form>
                        </div>
                    </div>

                    <div class="table-responsive-md">
                        <table id="tabla_bodegas" class="table  table-sm w-auto table-bordered table-striped">
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
        </div>

        <!-- ------------------------------------------ LISTA DE CONSUMOS ------------------------------------------->

        <div class="card">
            <div class="card-header" id="headingPaq">
              <h5 class="mb-0">
                <button class="btn btn-info btn-block" type="button" data-toggle="collapse" data-target="#collapsePaq" aria-expanded="true" aria-controls="collapsePaq">
                    <p class="mensajeservidor">Consumos</p>
                </button>
              </h5>
            </div>

            <div id="collapsePaq" class="collapse" aria-labelledby="headingPaq" data-parent="#accordionExample">
                <div class="card-body">
                    <!-- LO QUE SE VA A MOSTRAR EN LA TARJETA-->
                    <div class="row my-3">
                        <div class="col-sm-1 ">
                            <label>Tipo de empresa</label>
                        </div>
                        <div class="col-sm-1 ">
                            <label>Id de la bodega</label>
                        </div>
                        <div class="col-sm-3 ">
                            <label>Nombre de la bodega</label>
                        </div>
                        <div class="col-sm-7 ">
                            <label>Descripción del paquete</label>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-sm-1 ">
                            <input class="w-100" type="text" id="idtipoempresa" value="1" disabled="">
                        </div>
                        <div class="col-sm-1 ">
                            <input class="w-100" type="text" id="idempresa" value="" disabled="">
                        </div>
                        
                        <div class="col-sm-3 ">
                            <input class="w-100" type="text" id="nombodegapaq" value="" disabled="">
                        </div>
                        <div class="col-sm-7 ">
                            <input class="w-100" type="text" id="nombrenuevoconsumision" value="" placeholder="Descripción del Paquete">
                        </div> 
                    </div>
                    
                    <div class="row my-3">
                        <div class="col-sm-3 ">
                            <label>Vigencia desde</label>
                        </div>
                        <div class="col-sm-3 ">
                            <label>Vigencia hasta</label>
                        </div> 
                        <div class="col-sm-3 ">
                            <label>Precio agencia</label>
                        </div>
                        <div class="col-sm-3 ">
                            <label>Precio público</label>
                        </div>  
                    </div>
                    <div class="row my-3">
                        <div class="col-sm-3">
                            <input class="w-100" type="text" id="fechaavigdesde" value="" placeholder="desde" class="form-control">
                            <div id="calendario">

                            </div>
                        </div>
                        <div class="col-sm-3">
                            <input class="w-100" type="text" id="fechavighasta" value="" placeholder="desde" class="form-control">
                            <div id="calendario">

                            </div>
                        </div>
                        <div class="col-sm-3 w-100">
                            <input type="text" id="preciopaqag" value="" placeholder="Precio Agencia">
                        </div>    
                        <div class="col-sm-3">
                            <input class="w-100" type="text" id="preciopaqpu" value="" placeholder="Precio Público">
                        </div>
                        
                    </div>

                    <div class="row my-3">
                        
                        <div class="offset-md-1 col-md-5">
                            <form class="form-signin" action="">
                                <button type="button"  class="btn btn-md btn-info btn-block" id="consultapaquetes"> Ver</button>
                            </form>
                        </div>
                        <div class="col-md-5">
                            <form class="form-signin" action="">
                                <button type="button"  class="btn btn-md btn-primary btn-block" id="guardarpaq" name="guardarpaq"> Guardar</button>
                            </form>
                        </div>
                    </div>

                    <div class="table-responsive-md">
                        <table id="tabla_consumos" class="table  table-sm w-auto table-bordered table-striped">
                            <thead>
                                <tr class="btn-info">
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col">#</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Bodega</th>
                                    <th scope="col">Precio Agencia</th>                                        
                                    <th scope="col">Precio Público</th>
                                    <th scope="col">Vigencia desde</th>
                                    <th scope="col">Vigencia hasta</th>
                                </tr>
                            </thead>
                            <tbody id = "body_paquetes"> 
                            </tbody>
                        </table>
                    </div>
                <!-- FIN DE MOSTRAR EN LA TARJETA-->
                </div>
            </div>
        </div>
    </div>
                                                    <!-- FIN ACORDEON -->
<?php
    include("funciones/bodegasfunciones.php");
    include("funciones/consumisionesfunciones.php");
?>

<script type="text/javascript">

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

    $("#calendario").load("calendariosimple.php");

    function limpiarconsumo(){
         $("#nombrenuevoconsumision").val("");
         $("#preciopaqag").val("");
         $("#preciopaqpu").val("");


    }

    $("#guardarpaq").click(function(){
            guardarconsumision( $("#idempresa").val() ,1,$("#preciopaqag").val(),$("#preciopaqpu").val(),$("#fechaavigdesde").val(),$("#fechavighasta").val() ); //pasa un 1 por ser tipo de empresa : bodega
            $('#tabla_consumos tr').not(':first').remove(); 
            
            limpiarconsumo();
            consulta_consumisiones("seleccionable","consultadeagendabodega",1,$("#idempresa").val());
    });

    $("#accordionExample").click(function(){ //acordeon de hoteles
        consulta("abm");
    });

    $("#consultapaquetes").click(function(){ //acordeon de hoteles
        consulta_consumisiones("seleccionable","consultadeagendabodega",1, $("#idempresa").val() );
    });

    $('#fechaavigdesde').val(diadehoy());
    $('#fechaavigdesde').change(function(){
        $('#fechaavigdesde').val( formatearfecha( $('#fechaavigdesde').val() )   );
    });

    $('#fechavighasta').val(diadehoy());
    $('#fechavighasta').change(function(){
        $('#fechavighasta').val( formatearfecha( $('#fechavighasta').val() )   );
    });

/*
    if($("#idempresa").val() == "")
    {
        document.getElementById("guardarpaq").disabled = true;
    }else{
        document.getElementById("guardarpaq").disabled = false;
    }
    $("#idempresa").change(function(){
        if($("#idempresa").val() == "")
        {
            document.getElementById("guardarpaq").disabled = true;
        }else{
            document.getElementById("guardarpaq").disabled = false;
        }
    });
    */
</script>

