    
<head>
<meta charset="utf-8">
<link href="css/estilo.css" rel="stylesheet">

<script src="js/consumisionesConsulta_abm.js"></script>
<script src="js/consumisionesConsulta_seleccionable.js"></script>

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
                    consulta_consumisiones_abm();
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
                    consulta_consumisiones_abm();
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
        consulta_consumisiones_abm();
    });

    $("#consultaconsumisiones_seleccionable").click(function(e)
    {
        consulta_consumisiones_seleccionable();
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

