<script>
   //declaracion global de la funcion
    function nuevohotel()
    {
        $("#id").val("");
        $("#nombrenuevo").val("");
    }

    function guardarhotel()
    {
        if($( "#nombrenuevo" ).val().length<=0) 
        {
            $("#faltanombre").css("display","inline").fadeOut(2000);
            alert("Escriba un nombre");
        }else{
            var id = $("#id").val();
            var nombre = $("#nombrenuevo").val();

            $.ajax({
                url:"controladores/consultahoteles.php",
                data: {id:id,tipo:"alta",nombre:nombre},
                type: "post",
            success:function(data){

                console.log("Data devolvio:" + data);

                if(data!="consultavacia")
                {
                    consulta_hoteles("abm");
                    nuevohotel();
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

    function eliminarhotel(id,nombre)
    {
        var opcion = confirm("Desea Eliminar?");
        if (opcion == true) {
            $.ajax({
                url:"controladores/consultahoteles.php",
                data: {id:id,tipo:"baja",nombre:nombre},
                type: "post",                     
                success:function(data)
                {
                    consulta_hoteles("abm");
                }
            })

            .fail(function() {

                alert('Error al procesar la solicitud.');
            });
        }
    }

    function editarhotel(id,nombre)
    {
        $("#id").val(id);
        $("#nombrenuevo").val(nombre);
        $("#collapseOneS").collapse("show");
    }

     function seleccionar_hotel(id,nombre)
     {
        $("#idhotelelegido").val(id);
        $("#nombrehotelelegido").val(nombre);
        $("#collapseCuatro").collapse("hide");
    }



    function noseleccionar_consumision(id,nombre){



    }

    function consulta_hoteles(tipo)
    {
        $('#tabla_hoteles tr').not(':first').remove(); //elimina todas las filas menos la primera
        var id = $("#idhotel").val(); 

        $.ajax({
            url:"controladores/consultahoteles.php",
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
                         var fila = "<tr><td><input type='button' value = '&#10004;' class = 'btn btn-sm btn-info' onclick='seleccionar_hotel(\"" +datadecodificado[key].id_hotel+ "\",\"" +datadecodificado[key].nombrehotel+ "\")' /></td><td>"+datadecodificado[key].id_hotel+"</td><td>"+datadecodificado[key].nombrehotel+"</td></tr>";

                        }else{

                        var fila = "<tr><td><input type='button' value = '&#10008;' class = 'btn btn-sm btn-danger' onclick='eliminarhotel(\"" +datadecodificado[key].id_hotel+ "\",\"" +datadecodificado[key].nombrehotel+"\")' /></td><td><input type='button' value = '&#9998;' class = 'btn btn-sm btn-info' onclick='editarhotel(\"" +datadecodificado[key].id_hotel+ "\",\"" +datadecodificado[key].nombrehotel+ "\")' /></td><td>"+datadecodificado[key].id_hotel+"</td><td>"+datadecodificado[key].nombrehotel+"</td></tr>";
                        }
                        $("#tabla_hoteles").append(fila);
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
    $("#nuevohotel").click(function()
    {
        nuevohotel();
    });

    $("#consultahoteles_abm").click(function(e)
    {
        consulta_hoteles("abm");
    });

    $("#consultahoteles_seleccionable").click(function(e)
    {
        consulta_hoteles("seleccionable");
    });

    $("#guardarhotel").click(function()
    {
        guardarhotel();
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

    $( "#guardarhotel").click(function(){
        if($( "#nombrenuevo" ).val().length<=0) 
        {
            $("#faltanombre").css("display","inline").fadeOut(2000);
            return false;
        }   
    });
});

</script>



