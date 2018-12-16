<script>

    function nuevocliente()

    {

        $("#idclienteelegido").val("");

        $("#emailclienteelegido").val("");

        $("#emailclienteelegido").prop("disabled", false);

    }



    function guardarcliente()
    {
        if($( "#emailclienteelegido" ).val().length<=0) 

        {

            $("#faltaemail").css("display","inline").fadeOut(2000);

            alert("Escriba un email");

        }else{

            var id = $("#idclienteelegido").val();

            var email = $("#emailclienteelegido").val();

            $.ajax({

                url:"controladores/consultaclientes.php",

                data: {id:id,tipo:"alta",email:email},

                type: "post",

            success:function(data){

                //console.log("Data devolvio:" + data);

                if(data!="consultavacia")
                {
                    consultaclientes("cabm");

                    nuevocliente();

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

            //$("#collapseTwo").collapse("show");
        }
    }



    function eliminarcliente(id,email)
    {
        var opcion = confirm("Desea Eliminar?");

        if (opcion == true) {

            $.ajax({

                url:"controladores/consultaclientes.php",

                data: {id:id,tipo:"baja",email:email},

                type: "post",                     

                success:function(data)
                {
                    consultaclientes("cabm");
                }
            })

            .fail(function() {

                alert('Error al procesar la solicitud.');

            });
        }
    }

    function seleccionarcliente(id,email)
    {

        $("#idclienteelegido").val(id);

        $("#emailclienteelegido").val(email);

        $("#emailclienteelegido").prop("disabled", true);
        $("#colapsoclientes").collapse("hide");
    }


    function noseleccionarcontactobodega(id,email)
    {



    }



    function editarcliente(id,email)

    {

        $("#idclienteelegido").val(id);

        $("#emailclienteelegido").val(email);

        $("#emailclienteelegido").prop("disabled", false);

        //$("#collapseOneB").collapse("show");

    }



    function consultaclientes(tipo)
    {
        $("#emailclienteelegido").prop("disabled", true);

        $('#tabla_clientes tr').not(':first').remove(); //elimina todas las filas menos la primera

        var id = $("#idcontactocliente").val(); 

        $.ajax({

            url:"controladores/consultaclientes.php",

            data: {id:id,tipo:"consulta",email:""},

            type: "post",



            success:function(data){

                if(data!="consultavacia")

                {

                    datadecodificado = JSON.parse(data);

                    $.each(datadecodificado,function(key,value)
                    {
                        if(tipo==="seleccionable")
                        {//agrego botones SI 
                        
                         var fila = "<tr><td></i><input type='button' value = '&#10004;' class = 'btn btn-sm btn-info' onclick='seleccionarcliente(\"" +datadecodificado[key].id_cliente+ "\",\"" +datadecodificado[key].emailcliente+ "\")'/></td><td>"+datadecodificado[key].id_cliente+"</td><td>"+datadecodificado[key].emailcliente+"</td></tr>";
                       
                        }else 

                        if(tipo==="abm")

                        { //agrego botones BORRAR y EDITAR

                            var fila = "<tr><td><input type='button' value = '&#10008;' class = 'btn btn-sm btn-danger' onclick='eliminarcliente(\"" +datadecodificado[key].id_cliente+ "\",\"" +datadecodificado[key].emailcliente+ "\"><td><input type='button' value = '&#9998;' class = 'btn btn-sm btn-info' onclick='editarcliente(\"" +datadecodificado[key].id_cliente+ "\",\"" +datadecodificado[key].emailcliente+ "\")'/></td> <td>"+datadecodificado[key].id_cliente+"</td><td>"+datadecodificado[key].emailcliente+"</td></tr>";
                        }else 
                        if(tipo==="cabm")

                        { //agrego botones CONSULTAR, EDITAR Y BORRAR


                            var fila = "<tr><td><input type='button' value = '&#10004;' class = 'btn btn-sm btn-success' onclick='seleccionarcliente(\"" +datadecodificado[key].id_cliente+ "\",\"" +datadecodificado[key].emailcliente+ "\")'/></td><td><input type='button' value = '&#9998;' class = 'btn btn-sm btn-info' onclick='editarcliente(\"" +datadecodificado[key].id_cliente+ "\",\"" +datadecodificado[key].emailcliente+ "\")'/></td> <td><input type='button' value = '&#10008;' class = 'btn btn-sm btn-danger' onclick='eliminarcliente(\"" +datadecodificado[key].id_cliente+ "\",\"" +datadecodificado[key].emailcliente+ "\")'></td> <td>"+datadecodificado[key].id_cliente+"</td><td>"+datadecodificado[key].emailcliente+"</td></tr>";
                 
                        }
                        $("#tabla_clientes").append(fila);

                    });
                    
                }

            },

            error: function(e)

            {

                alert("Error en la consulta.");

            }

        });

    }       

   

</script>



<script>

    $(document).ready(function()

    {

        $("#nuevocliente").click(function()

        {

            nuevocliente();

        });



        $("#consultaclientes_abm").click(function(e)

        {

            consultaclientes("cabm");

        });



        $("#botonclientes_seleccionable").click(function(e)
        {
            consultaclientes("cabm");

        });



       

        $( "#emailclienteelegido" ).focus(function()

        {

            verificanombrecliente(); 

        });



        function verificanombrecliente()

        {

            if($( "#emailclienteelegido" ).val().length<=0) 
            {
                $("#faltaemail").css("display","inline").fadeOut(2000);
            } 
        }
 

       $( "#nuevocliente").click(function(){
                nuevocliente();
        });

        $( "#botonguardarcliente").click(function(){
                guardarcliente();
        });

    });

</script>