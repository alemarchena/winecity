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
            //alert("Escriba un nombre");
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
                //console.log("Data devolvio:" + data);
                if(data!="consultavacia")
                {
                    
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
        consulta("abm");
        nuevo();
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
                }
            })

            .fail(function() {

                alert('Error al procesar la solicitud.');

            });
        }
        consulta("abm");

    }

    function seleccionarbodegas(id,nombre,email,telefono)

    {
        $("#idbodegaelegida").val(id);
        $("#emailbodegaelegida").val(email);
        $("#emailbodegatraslada").val(email);
        $("#nombrebodegaelegida").val(nombre);

        $("#idempresa").val(id);
        $("#nombodegapaq").val(nombre);
        
        $("#colapsobodega").collapse("hide");
        $("#collapsePaq").collapse("show");

        validaremailbodega();
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
                         var fila = "<tr><td></span><input type='button' value = '&#10004;' class = 'btn btn-sm btn-info' onclick='seleccionarbodegas(\"" +datadecodificado[key].id_bodega+ "\",\"" +datadecodificado[key].nombre_bodega+ "\",\"" +datadecodificado[key].email_bodega+ "\",\"" +datadecodificado[key].telefono_bodega+ "\")' /></td><td>"+datadecodificado[key].id_bodega+"</td><td>"+datadecodificado[key].nombre_bodega+"</td><td>"+datadecodificado[key].email_bodega+"</td><td>"+datadecodificado[key].telefono_bodega+"</td></tr>";
                        }else 

                        if(tipo==="abm")

                        { //agrego botones BORRAR y EDITAR

                            var fila = "<tr><td></span><input type='button' value = '&#10004;' class = 'btn btn-sm btn-info' onclick='seleccionarbodegas(\"" +datadecodificado[key].id_bodega+ "\",\"" +datadecodificado[key].nombre_bodega+ "\",\"" +datadecodificado[key].email_bodega+ "\",\"" +datadecodificado[key].telefono_bodega+ "\")' /></td><td><input type='button' value = '&#10008;' class = 'btn btn-sm btn-danger' onclick='eliminarbodega(\"" +datadecodificado[key].id_bodega+ "\",\"" +datadecodificado[key].nombre_bodega+ "\",\"" +datadecodificado[key].email_bodega+ "\",\"" +datadecodificado[key].telefono_bodega+ "\")' /></td><td><input type='button' value = '&#9998;' class = 'btn btn-sm btn-info' onclick='editarbodega(\"" +datadecodificado[key].id_bodega+ "\",\"" +datadecodificado[key].nombre_bodega+ "\",\"" +datadecodificado[key].email_bodega+ "\",\"" +datadecodificado[key].telefono_bodega+ "\")' /></td><td>"+datadecodificado[key].id_bodega+"</td><td>"+datadecodificado[key].nombre_bodega+"</td><td>"+datadecodificado[key].email_bodega+"</td><td>"+datadecodificado[key].telefono_bodega+"</td></tr>";

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

    function validaremailbodega()
    {
        if($("#emailbodegatraslada").val() == "")
        {
            document.getElementById("emailbodegatraslada").style.backgroundColor = "#FA5858";
            document.getElementById("emailbodega").disabled = true;

        }else{
            document.getElementById("emailbodegatraslada").style.backgroundColor = "#81F79F";
            document.getElementById("emailbodega").disabled = false;
        }
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