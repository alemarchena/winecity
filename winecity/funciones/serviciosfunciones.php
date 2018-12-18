<script>
   //declaracion global de la funcion
    function nuevoservicio()
    {
        $("#id").val("");
        $("#nombrenuevo").val("");
    }

    function guardarservicio()
    {
        if($( "#nombrenuevo" ).val().length<=0) 
        {
            $("#faltanombre").css("display","inline").fadeOut(2000);
            alert("Escriba un nombre");
        }else{
            var id = $("#id").val();
            var nombre = $("#nombrenuevo").val();

            $.ajax({
                url:"controladores/consultaservicios.php",
                data: {id:id,tipo:"alta",nombre:nombre},
                type: "post",
            success:function(data){

                console.log("Data devolvio:" + data);

                if(data!="consultavacia")
                {
                    consulta_servicios("abm");
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

    function eliminarservicio(id,nombre)
    {
        var opcion = confirm("Desea Eliminar?");
        if (opcion == true) {
            $.ajax({
                url:"controladores/consultaservicios.php",
                data: {id:id,tipo:"baja",nombre:nombre},
                type: "post",                     
                success:function(data)
                {
                    consulta_servicios("abm");
                }
            })

            .fail(function() {

                alert('Error al procesar la solicitud.');
            });
        }
    }

    function editarservicio(id,nombre)
    {
        $("#id").val(id);
        $("#nombrenuevo").val(nombre);
        $("#collapseOneS").collapse("show");
    }

     function seleccionar_servicio(id,nombre)
     {
        $("#idservicioelegido").val(id);
        $("#nombreservicioelegido").val(nombre);
        $("#collapseTres").collapse("hide");
    }



    function noseleccionar_consumision(id,nombre){



    }

    function consulta_servicios(tipo)
    {
        $('#tabla_servicios tr').not(':first').remove(); //elimina todas las filas menos la primera
        var id = $("#idservicio").val(); 

        $.ajax({
            url:"controladores/consultaservicios.php",
            data: {id:id,tipo:"consulta",nombre:""},
            type: "post",

            success:function(data){

                if(data!="consultavacia")
                {
                    datadecodificado = JSON.parse(data);

                    $.each(datadecodificado,function(key,value)
                    {
                        if(tipo==="seleccionable")
                        {
                         var fila = "<tr><td><input type='button' value = '&#10004;' class = 'btn btn-sm btn-info' onclick='seleccionar_servicio(\"" +datadecodificado[key].id_servicio+ "\",\"" +datadecodificado[key].nombreservicio+ "\")' /></td><td>"+datadecodificado[key].id_servicio+"</td><td>"+datadecodificado[key].nombreservicio+"</td></tr>";

                        }else{

                        var fila = "<tr><td><input type='button' value = '&#10008;' class = 'btn btn-sm btn-danger' onclick='eliminarservicio(\"" +datadecodificado[key].id_servicio+ "\",\"" +datadecodificado[key].nombreservicio+"\")' /></td><td><input type='button' value = '&#9998;' class = 'btn btn-sm btn-info' onclick='editarservicio(\"" +datadecodificado[key].id_servicio+ "\",\"" +datadecodificado[key].nombreservicio+ "\")' /></td><td>"+datadecodificado[key].id_servicio+"</td><td>"+datadecodificado[key].nombreservicio+"</td></tr>";
                        }
                        $("#tabla_servicios").append(fila);
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
    $("#nuevoservicio").click(function()
    {
        nuevoservicio();
    });

    $("#consultaservicios_abm").click(function(e)
    {
        consulta_servicios("abm");
    });

    $("#consultaservicios_seleccionable").click(function(e)
    {
        consulta_servicios("seleccionable");
    });

    $("#guardarservicio").click(function()
    {
        guardarservicio();
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

    $( "#guardarservicio").click(function(){
        if($( "#nombrenuevo" ).val().length<=0) 
        {
            $("#faltanombre").css("display","inline").fadeOut(2000);
            return false;
        }   
    });
});

</script>



