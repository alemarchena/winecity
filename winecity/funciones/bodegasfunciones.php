    
<head>
<meta charset="utf-8">
<link href="css/estilo.css" rel="stylesheet">

<script src="js/bodegasConsulta_abm.js"></script>
<script src="js/bodegasConsulta_seleccionable.js"></script>

</head>

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
                    consulta_abm();
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

    
    function seleccionar(id,nombre,email,telefono){

    }

    function noseleccionar(id,nombre,email,telefono){

    }

    function eliminar(id,nombre,email,telefono)
    {
        var opcion = confirm("Desea Eliminar?");
        if (opcion == true) {
            $.ajax({

                url:"controladores/consultabodegas.php",

                data: {id:id,tipo:"baja",nombre:nombre,email:email,telefono:telefono},
                type: "post",                     
                success:function(data)
                {
                    consulta_abm();
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
        $("#email").val(email);
        $("#telefono").val(telefono)

        $("#collapseOneB").collapse("show");
    }

$(document).ready(function()
{
    $("#nuevo").click(function()
    {
        nuevo();
    });

    $("#consultabodegas_abm").click(function(e)
    {
        consulta_abm();
    });

    $("#consultabodegas_seleccionable").click(function(e)
    {
        consulta_seleccionable();
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