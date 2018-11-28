<head>
	<meta charset="utf-8">
    <link href="css/estilo.css" rel="stylesheet">

</head>

<div class="border border-success">
                                                        <!--  ACORDEON -->
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
              <h5 class="mb-0">
                                                    <!-- ID - BOTON Y LISTA-->
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <p class="mensajeservidor" align="center">ALTA DE CONSUMOS</p>
                </button>
              </h5>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
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
                                <button type="button"  class="btn btn-md btn-primary btn-block" id="guardar" name="guardar"> Guardar</button>
                            </form>
                        </div>
                        <div class="col-md-2">
                            <form class="form-signin" action="">
                                <button type="button"  class="btn btn-md btn-primary btn-block" id="nuevo" name="nuevo"> Nuevo</button>
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
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <p class="mensajeservidor">LISTA DE CONSUMOS</p>
            </button>
          </h5>
        </div>

        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
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
                                                    <!-- FIN ACORDEON -->
<script>

   //declaracion global de la funcion

    function nuevo()
    {
        $("#id").val("");
        $("#nombrenuevo").val("");
        
    }

    function guardar()
    {

        if($( "#nombrenuevo" ).val().length<=0) 
        {
            $("#faltanombre").css("display","inline").fadeOut(2000);

            alert("Escriba un nombre");

        }else{
            var id = $("#id").val();
            var nombre = $("#nombrenuevo").val();
            

            $.ajax({

                url:"controladores/consultaconsumisiones.php",
                data: {id:id,tipo:"alta",nombre:nombre},
                type: "post",

            success:function(data){

                console.log("Data devolvio:" + data);

                if(data!="consultavacia")
                {
                    consulta();
                    nuevo();
                    alert(data); //muestra un mensaje con el texto devuelto por el controlador

                }else{

                    alert("Error al crear el registro");
                }
            },

            error: function(e)
            {
                alert("Error en el alta.");
            }

            });
            $("#collapseTwo").collapse("show");
        }
    }

    function consulta()
    {
        $('#tabla_consumos tr').not(':first').remove(); //elimina todas las filas menos la primera

        var id = $("#idconsumo").val(); 

        $.ajax({
            url:"controladores/consultaconsumisiones.php",
            data: {id:id,tipo:"consulta",nombre:""},
            type: "post",

            success:function(data){

                if(data!="consultavacia")
                {
                    datadecodificado = JSON.parse(data);

                    $.each(datadecodificado,function(key,value)
                    {
                         var fila = "<tr><td>"+datadecodificado[key].id_consumision+"</td><td>"+datadecodificado[key].nombre_consumision+"</td><td><input type='button' value = 'Borrar' class = 'btn btn-sm btn-danger' onclick='eliminar(\"" +datadecodificado[key].id_consumision+ "\",\"" +datadecodificado[key].nombre_consumision+"\")' /></td><td><input type='button' value = 'Editar' class = 'btn btn-sm btn-info' onclick='editar(\"" +datadecodificado[key].id_consumision+ "\",\"" +datadecodificado[key].nombre_consumision+ "\")' /></td></tr>";

                            $("#tabla_consumos").append(fila);
                    });
                }
            },

            error: function(e)
            {
                alert("Error en la consulta.");
            }
        });
    }

    function eliminar(id,nombre)
    {
        var opcion = confirm("Desea Eliminar?");
        if (opcion == true) {
            $.ajax({

                url:"controladores/consultaconsumisiones.php",

                data: {id:id,tipo:"baja",nombre:nombre},
                type: "post",                     
                success:function(data)
                {
                    consulta();
                }
            })

            .fail(function() {
                alert('Error al procesar la solicitud.');
            });
        }
    }

    function editar(id,nombre)
    {
        $("#id").val(id);
        $("#nombrenuevo").val(nombre);

        $("#collapseOne").collapse("show");
    }
</script> 

<script>
$(document).ready(function()
{
    $("#nuevo").click(function()
    {
        nuevo();
    });

    $("#consultaconsumisiones").click(function(e)
    {
        consulta();
    });


    $("#guardar").click(function()
    {
        guardar();
    });


    
    $( "#nombrenuevo" ).focus(function()
    {
        verificanombre(); 
    });

    function verificanombre()
    {
        if($( "#nombrenuevo" ).val().length<=0) 
        {
            $("#faltanombre").css("display","inline").fadeOut(2000);
        } 
    }

   
    $( "#guardar").click(function(){
        if($( "#nombrenuevo" ).val().length<=0) 
        {
            $("#faltanombre").css("display","inline").fadeOut(2000);
            return false;
        }   
    });
});
</script>

