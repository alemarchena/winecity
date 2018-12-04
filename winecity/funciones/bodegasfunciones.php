
<script>
    function nuevo()
    {
        $("#id").val("");
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
                    consulta("abm");
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

    


    function eliminarbodega(id,nombre,email,telefono)
    {
        var opcion = confirm("Desea Eliminar?");
        if (opcion == true) {
            $.ajax({

                url:"controladores/consultabodegas.php",

                data: {id:id,tipo:"baja",nombre:nombre,email:email,telefono:telefono},
                type: "post",                     
                success:function(data)
                {
                    consulta("abm");
                }
            })

            .fail(function() {
                alert('Error al procesar la solicitud.');
            });
        }
    }

    function seleccionarbodegas(id,nombre,email,telefono)
    {
        

        $("#idbodegaelegida").val(id);
        $("#nombrebodegaelegida").val(nombre);
        $("#colapsobodega").collapse("hide");
    }

    function noseleccionarbodegas(id,nombre,email,telefono)
    {

    }

    function editarbodega(id,nombre,email,telefono)
    {
   
        $("#id").val(id);
        $("#nombrenuevo").val(nombre);
        $("#email").val(email);
        $("#telefono").val(telefono)

        $("#collapseOneB").collapse("show");
       
    }

    function consulta(tipo)
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
                        if(tipo==="seleccionable")
                        {//agrego botones SI 
                         var fila = "<tr><td><span style='font-size: 20px; color: Dodgerblue;'><i class='fas fa-check-circle'></i></span><input type='button' value = '' class = 'btn btn-sm btn-info' onclick='seleccionarbodegas(\"" +datadecodificado[key].id_bodega+ "\",\"" +datadecodificado[key].nombre_bodega+ "\",\"" +datadecodificado[key].email_bodega+ "\",\"" +datadecodificado[key].telefono_bodega+ "\")' /></td><td>"+datadecodificado[key].id_bodega+"</td><td>"+datadecodificado[key].nombre_bodega+"</td><td>"+datadecodificado[key].email_bodega+"</td><td>"+datadecodificado[key].telefono_bodega+"</td></tr>";
                        }else 
                        if(tipo==="abm")
                        { //agrego botones BORRAR y EDITAR
                            var fila = "<tr><td><input type='button' value = 'Borrar' class = 'btn btn-sm btn-danger' onclick='eliminarbodega(\"" +datadecodificado[key].id_bodega+ "\",\"" +datadecodificado[key].nombre_bodega+ "\",\"" +datadecodificado[key].email_bodega+ "\",\"" +datadecodificado[key].telefono_bodega+ "\")' /></td><td><input type='button' value = 'Editar' class = 'btn btn-sm btn-info' onclick='editarbodega(\"" +datadecodificado[key].id_bodega+ "\",\"" +datadecodificado[key].nombre_bodega+ "\",\"" +datadecodificado[key].email_bodega+ "\",\"" +datadecodificado[key].telefono_bodega+ "\")' /></td><td>"+datadecodificado[key].id_bodega+"</td><td>"+datadecodificado[key].nombre_bodega+"</td><td>"+datadecodificado[key].email_bodega+"</td><td>"+datadecodificado[key].telefono_bodega+"</td></tr>";
                        }

                        $("#tabla_bodegas").append(fila);
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
        
        
        $("#nuevo").click(function()
        {
            nuevo();
        });

        $("#consultabodegas_abm").click(function(e)
        {
            consulta("abm");
        });

        $("#consultabodegas_seleccionable").click(function(e)
        {
            consulta("seleccionable");
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