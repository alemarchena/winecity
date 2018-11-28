<head>
    <link href="css/estilo.css" rel="stylesheet">
</head>

    


                                                <!-- ID - BOTON Y LISTA-->


<div class="border border-success">
    <br>
                                                        <!--  ACORDEON -->
    <div class="accordion" id="accordionExample">

        <div class="card">
            <div class="card-header" id="headingOne">
              <h5 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <p class="mensajeservidor" align="center">REGISTO DE BODEGAS</p>
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
                <p class="mensajeservidor">LISTA DE BODEGAS</p>
            </button>
          </h5>
        </div>

        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
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
      </div>
    </div>

                                                    <!-- FIN ACORDEON -->
<script>
   //declaracion global de la funcion
    
    function nuevo(){

        $("#id").val("");
        $("#nombrenuevo").val("");
        $("#nombrenuevo").val("");
        $("#email").val("");
        $("#telefono").val("")
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
            var email = $("#email").val();
            var telefono = $("#telefono").val();
            $.ajax({
                url:"controladores/consultabodegas.php",
                data: {id:id,tipo:"alta",nombre:nombre,email:email,telefono:telefono},
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

            error: function(e){
                alert("Error en el alta.");
            }
            });
        }
    }

    function consulta()
    {
        $('#tabla_bodegas tr').not(':first').remove(); //elimina todas las filas menos la primera

        var id = $("#idbodega").val(); 
        
        $.ajax({
            url:"controladores/consultabodegas.php",
            data: {id:id,tipo:"consulta",nombre:"",email:"",telefono:""},
            type: "post",
            success:function(data){

                if(data!="consultavacia")
                {
                    datadecodificado = JSON.parse(data);

                    $.each(datadecodificado,function(key,value)
                    {
                         var fila = "<tr><td>"+datadecodificado[key].id_bodega+"</td><td>"+datadecodificado[key].nombre_bodega+"</td><td>"+datadecodificado[key].email_bodega+"</td><td>"+datadecodificado[key].telefono_bodega+"</td><td><input type='button' value = 'Borrar' class = 'btn btn-sm btn-danger' onclick='eliminar(\"" +datadecodificado[key].id_bodega+ "\",\"" +datadecodificado[key].nombre_bodega+ "\",\"" +datadecodificado[key].email_bodega+ "\",\"" +datadecodificado[key].telefono_bodega+ "\")' /></td><td><input type='button' value = 'Editar' class = 'btn btn-sm btn-info' onclick='editar(\"" +datadecodificado[key].id_bodega+ "\",\"" +datadecodificado[key].nombre_bodega+ "\",\"" +datadecodificado[key].email_bodega+ "\",\"" +datadecodificado[key].telefono_bodega+ "\")' /></td></tr>";
        
                        $("#tabla_bodegas").append(fila);
                        
                    });
                }
            },

            error: function(e){
                alert("Error en la consulta.");
            }
        });
    }
    function eliminar(id,nombre,email,telefono){
       
        var opcion = confirm("Desea Eliminar?");
        if (opcion == true) {
            $.ajax({
                url:"controladores/consultabodegas.php",
                data: {id:id,tipo:"baja",nombre:nombre,email:email,telefono:telefono},
                type: "post",                     
                success:function(data){
                    consulta();
                }
            })
           
            .fail(function() {
                alert('Error al procesar la solicitud.');
            });
        }
    }

    function editar(id,nombre,email,telefono)
    {
        $("#id").val(id);
        $("#nombrenuevo").val(nombre);
        $("#nombrenuevo").val(nombre);
        $("#email").val(email);
        $("#telefono").val(telefono)

        $("#collapseOne").collapse("show");
    }
</script> 

<script>
$(document).ready(function()
{
    $("#nuevo").click(function(){
        nuevo();
    })

    $("#consultabodegas").click(function(e)
    {
        consulta();
    });

    $("#guardar").click(function(){
        guardar();
    })

    //esta funcion quita las filas seleccionadas con el checkbox
    $("#elimina").click(function(){
        $("#tabla_usuarios tbody").find('input[name="registro"]').each(function(){
            if($(this).is(":checked")){
                $(this).parents("tr").remove();
            }
        });
    });

    $( "#nombrenuevo" ).focus(function(){
        verificanombre(); 
    });

    function verificanombre()
    {
        if($( "#nombrenuevo" ).val().length<=0) 
        {
            $("#faltanombre").css("display","inline").fadeOut(2000);
        } 
    }

    $( "#telefono" ).focus(function(){
        if($( "#telefono" ).val().length<=0) 
        {
            $("#faltatelefono").css("display","inline").fadeOut(2000);
        }   
    });

    $( "#guardar").click(function(){
        if($( "#nombrenuevo" ).val().length<=0) 
        {
            $("#faltanombre").css("display","inline").fadeOut(2000);
            return false;
        }   
    });
});
</script>