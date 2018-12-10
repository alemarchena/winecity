<script>

    function nuevocontactobodega()

    {

        $("#idcontactobodegaelegido").val("");

        $("#contactobodegaelegido").val("");

        $("#contactobodegaelegido").prop("disabled", false);

    }



    function guardarcontactobodega()
    {
        if($( "#contactobodegaelegido" ).val().length<=0) 

        {

            $("#faltanombre").css("display","inline").fadeOut(2000);

            alert("Escriba un nombre");

        }else{

            var id = $("#idcontactobodegaelegido").val();

            var nombre = $("#contactobodegaelegido").val();

            $.ajax({

                url:"controladores/consultacontactosbodegas.php",

                data: {id:id,tipo:"alta",nombre:nombre},

                type: "post",

            success:function(data){

                //console.log("Data devolvio:" + data);

                if(data!="consultavacia")

                {

                    consultacontactobodega("cabm");

                    nuevocontactobodega();

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



    function eliminarcontactobodega(id,nombre)

    {

        var opcion = confirm("Desea Eliminar?");

        if (opcion == true) {

            $.ajax({

                url:"controladores/consultacontactosbodegas.php",

                data: {id:id,tipo:"baja",nombre:nombre},

                type: "post",                     

                success:function(data)

                {

                    consultacontactobodega("cabm");

                }

            })



            .fail(function() {



                alert('Error al procesar la solicitud.');



            });

        }

    }



    function seleccionarcontactobodega(id,nombre)

    {

        $("#idcontactobodegaelegido").val(id);

        $("#contactobodegaelegido").val(nombre);

        $("#contactobodegaelegido").prop("disabled", true);
        $("#colapsocontacto").collapse("hide");

    }



    function noseleccionarcontactobodega(id,nombre)

    {



    }



    function editarcontactobodega(id,nombre)

    {

        $("#idcontactobodegaelegido").val(id);

        $("#contactobodegaelegido").val(nombre);

        $("#contactobodegaelegido").prop("disabled", false);

        //$("#collapseOneB").collapse("show");

    }



    function consultacontactobodega(tipo)
    {
        $("#contactobodegaelegido").prop("disabled", true);

        $('#tabla_contactos tr').not(':first').remove(); //elimina todas las filas menos la primera

        var id = $("#idcontactobodega").val(); 

        $.ajax({

            url:"controladores/consultacontactosbodegas.php",

            data: {id:id,tipo:"consulta",nombre:""},

            type: "post",



            success:function(data){

                if(data!="consultavacia")

                {

                    datadecodificado = JSON.parse(data);

                    $.each(datadecodificado,function(key,value)
                    {
                        if(tipo==="seleccionable")
                        {//agrego botones SI 
                        
                            var fila = "<tr><td><span style='font-size: 20px; color: Dodgerblue;'><i class='fas fa-check-circle'></i></span><input type='button' value = '' class = 'btn btn-sm btn-info' onclick='seleccionarcontactobodega(\"" +datadecodificado[key].id_contactobodega+ "\",\"" +datadecodificado[key].nombrecontactobodega+ "\")'/></td><td>"+datadecodificado[key].id_contactobodega+"</td><td>"+datadecodificado[key].nombrecontactobodega+"</td></tr>";
        
                        }else 

                        if(tipo==="abm")

                        { //agrego botones BORRAR y EDITAR

                            var fila = "<tr><td><input type='button' value = 'X' class = 'btn btn-sm btn-danger' onclick='eliminarcontactobodega(\"" +datadecodificado[key].id_contactobodega+ "\",\"" +datadecodificado[key].nombrecontactobodega+ "\"><td><input type='button' value = 'Editar' class = 'btn btn-sm btn-info' onclick='editarcontactobodega(\"" +datadecodificado[key].id_contactobodega+ "\",\"" +datadecodificado[key].nombrecontactobodega+ "\")'/></td> <td>"+datadecodificado[key].id_contactobodega+"</td><td>"+datadecodificado[key].nombrecontactobodega+"</td></tr>";
                        }else 
                        if(tipo==="cabm")

                        { //agrego botones CONSULTAR, EDITAR Y BORRAR

                            var fila = "<tr> <td><span style='font-size: 20px; color: Dodgerblue;'><i class='fas fa-check-circle'></i></span><input type='button' value = '' class = 'btn btn-sm btn-info' onclick='seleccionarcontactobodega(\"" +datadecodificado[key].id_contactobodega+ "\",\"" +datadecodificado[key].nombrecontactobodega+ "\")'/></td><td><input type='button' value = 'Editar' class = 'btn btn-sm btn-info' onclick='editarcontactobodega(\"" +datadecodificado[key].id_contactobodega+ "\",\"" +datadecodificado[key].nombrecontactobodega+ "\")'/></td> <td><input type='button' value = 'X' class = 'btn btn-sm btn-danger' onclick='eliminarcontactobodega(\"" +datadecodificado[key].id_contactobodega+ "\",\"" +datadecodificado[key].nombrecontactobodega+ "\")'></td> <td>"+datadecodificado[key].id_contactobodega+"</td><td>"+datadecodificado[key].nombrecontactobodega+"</td></tr>";
                        }
                        $("#tabla_contactos").append(fila);

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

        $("#contactonuevo").click(function()

        {

            nuevocontactobodega();

        });



        $("#consultacontactosbodegas_abm").click(function(e)

        {

            consultacontactobodega("cabm");

        });



        $("#botoncontactosbodegas_seleccionable").click(function(e)
        {
            consultacontactobodega("cabm");

        });



       

        $( "#nombrenuevo" ).focus(function()

        {

            verificanombrecontactobodega(); 

        });



        function verificanombrecontactobodega()

        {

            if($( "#contactobodegaelegido" ).val().length<=0) 
            {
                $("#faltanombre").css("display","inline").fadeOut(2000);
            } 
        }
 

       $( "#nuevocontacto").click(function(){
                nuevocontactobodega();
        });

        $( "#botonguardarcontacto").click(function(){
                guardarcontactobodega();
        });

    });

</script>