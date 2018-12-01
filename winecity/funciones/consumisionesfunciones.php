    
<head>
<meta charset="utf-8">
<link href="css/estilo.css" rel="stylesheet">

</head>

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
                    consulta_consumisiones("abm");
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
                    consulta_consumisiones("abm");
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

        $("#collapseOneC").collapse("show");
    }

     function seleccionar(id,nombre){

    }

    function noseleccionar(id,nombre){

    }
    function consulta_consumisiones(tipo)
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
                        if(tipo==="seleccionable")
                        {
                         var fila = "<tr><td>"+datadecodificado[key].id_consumision+"</td><td>"+datadecodificado[key].nombre_consumision+"</td><td><input type='button' value = 'NO' class = 'btn btn-sm btn-danger' onclick='noseleccionar(\"" +datadecodificado[key].id_consumision+ "\",\"" +datadecodificado[key].nombre_consumision+"\")' /></td><td><input type='button' value = 'SI' class = 'btn btn-sm btn-info' onclick='seleccionar(\"" +datadecodificado[key].id_consumision+ "\",\"" +datadecodificado[key].nombre_consumision+ "\")' /></td></tr>";
                        }else{
                        var fila = "<tr><td>"+datadecodificado[key].id_consumision+"</td><td>"+datadecodificado[key].nombre_consumision+"</td><td><input type='button' value = 'Borrar' class = 'btn btn-sm btn-danger' onclick='eliminar(\"" +datadecodificado[key].id_consumision+ "\",\"" +datadecodificado[key].nombre_consumision+"\")' /></td><td><input type='button' value = 'Editar' class = 'btn btn-sm btn-info' onclick='editar(\"" +datadecodificado[key].id_consumision+ "\",\"" +datadecodificado[key].nombre_consumision+ "\")' /></td></tr>";
                        }
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
</script> 

<script>
$(document).ready(function()
{
    $("#nuevo").click(function()
    {
        nuevo();
    });

    $("#consultaconsumisiones_abm").click(function(e)
    {
        consulta_consumisiones("abm");
    });

    $("#consultaconsumisiones_seleccionable").click(function(e)
    {
        consulta_consumisiones("seleccionable");
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

