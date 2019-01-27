<script>



   //declaracion global de la funcion



    function nuevoconsumision()

    {

        $("#idconsumision").val("");
        $("#nombrenuevoconsumision").val("");

        $("#idtipoempresa").val(0);
        $("#idempresa").val(0);
       

    }

    function guardarconsumision(idempresapasado,idtipoempresapasado,pagencia,ppublico,vigdesde,vighasta)
    {

        if($( "#nombrenuevoconsumision" ).val().length<=0) 
        {
            $("#faltanombreconsumision").css("display","inline").fadeOut(2000);
            alert("Escriba un nombre");
        }else{
            var id = $("#idconsumision").val();
            var nombre = $("#nombrenuevoconsumision").val();
            
            var idtipoempresa = idtipoempresapasado;
            var idempresa = idempresapasado;
            var precioagencia = pagencia;
            var preciopublico = ppublico;
            var vigenciadesde = vigdesde;
            var vigenciahasta = vighasta;

            
            $.ajax({
                url:"controladores/consultaconsumisiones.php",
                data: {id:id,tipo:"alta",nombre:nombre,idempresa:idempresa,idtipoempresa:idtipoempresa,precioagencia:precioagencia,preciopublico:preciopublico,vigenciadesde:vigenciadesde,vigenciahasta:vigenciahasta},
                type: "post",
            success:function(data){
                //console.log("Data devolvio:" + data);

                if(data!="consultavacia")
                {
                    //alert(data); //muestra un mensaje con el texto devuelto por el controlador
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



    function eliminarconsumision(id,nombre,idempresapasado,idtipoempresapasado,tipoconsulta)
    {
        var opcion = confirm("Desea Eliminar el consumo ?");
        var idtipoempresa = idtipoempresapasado;
        var idempresa = idempresapasado;
        var tipo = "baja";

        if (opcion == true) {

            $.ajax({

                url:"controladores/consultaconsumisiones.php",
               
                data: {id:id,tipo:tipo,nombre:nombre,idempresa:idempresa,idtipoempresa:idtipoempresa},

                type: "post",                     

                success:function(data)
                {

                    

                }
            })

            .fail(function() {
                alert('Error al procesar la solicitud.');
            });
        }
        
        $("#accordionExample1").collapse("hide");
        $("#accordionExampleabm").collapse("hide");
        $("#accordionExample").collapse("hide");

/*


        if(tipoconsulta=="abm")
        {  

            consulta_consumisiones("abm","consultadeagendabodega",0,0);
        }else if(tipoconsulta=="seleccionable"){


            consulta_consumisiones("seleccionable","consultadeagendabodega",1,0);
        }
        */
    }

    

    function editarconsumision(id,nombre,idempresa,idtipoempresa)
    {
        $("#idconsumision").val(id);
        $("#nombrenuevoconsumision").val(nombre);

        $("#idempresa").val(idempresa);
        $("#idtipoempresa").val(idtipoempresa);

        $("#collapseOneC").collapse("show");
        $("#collapseTwo").collapse("hide");

    }



     function seleccionar_consumision(id,nombre,idempresa,idtipoempresa){

        $("#idconsumisionelegida").val(id);

        $("#nombreconsumisionelegida").val(nombre);
        $("#consumotraslado").val(nombre);
    
        validarconsumo();
        
        $("#collapseDos").collapse("hide");
    }


    function consulta_consumisiones(tipo,tipoconsultaenviado,idtipoempresaenviado,idempresaenviado)
    {
       
        $('#tabla_consumos tr').not(':first').remove(); //elimina todas las filas menos la primera

        var idempresa = idempresaenviado;
        
        var idtipoempresa = idtipoempresaenviado;
        var id = $("#idconsumo").val(); 
        var tipoconsulta = tipoconsultaenviado;

        var precioagencia = 0;
        var preciopublico = 0;
        var vigenciadesde = "";
        var vigenciahasta = "";

            $.ajax({
     
                url:"controladores/consultaconsumisiones.php",

                data: {id:id,tipo:tipoconsulta,nombre:"",idempresa:idempresa,idtipoempresa:idtipoempresa,precioagencia:precioagencia,preciopublico:preciopublico,vigenciadesde:vigenciadesde,vigenciahasta:vigenciahasta},

                type: "post",



                success:function(data){



                    if(data!="consultavacia")

                    {
                        //alert("consulta:" + data);
                        datadecodificado = JSON.parse(data);



                        $.each(datadecodificado,function(key,value)

                        {
                            vernombre = datadecodificado[key].nombre_bodega;
                            if(vernombre==null){ vernombre = "";}

                            if(tipo==="seleccionable")
                            {
                               var fecdesde= conviertefecha(datadecodificado[key].vigenciadesde);
                               var fechasta= conviertefecha(datadecodificado[key].vigenciahasta);

                                if(fecdesde=="Invalid Date"){fecdesde=""}
                                if(fechasta=="Invalid Date"){fechasta=""}
                                tipoconsulta = "seleccionable";

                                var fila = "<tr><td><input type='button' value = '&#10008;' class = 'btn btn-sm btn-danger' onclick='eliminarconsumision(\"" +datadecodificado[key].id_consumision+ "\",\"" +datadecodificado[key].nombre_consumision + "\",\"" +datadecodificado[key].id_empresa + "\",\"" +datadecodificado[key].id_tipoempresa + "\",\"" + tipoconsulta + "\")' /></td><td><input type='button' value = '&#10004;' class = 'btn btn-sm btn-info' onclick='seleccionar_consumision(\"" +datadecodificado[key].id_consumision+ "\",\"" +datadecodificado[key].nombreconsumision + "\",\"" +datadecodificado[key].id_empresa + "\",\"" +datadecodificado[key].id_tipoempresa + "\")' /></td><td>"+datadecodificado[key].id_consumision+"</td><td>"+datadecodificado[key].nombreconsumision + "</td><td>"+ vernombre +"</td><td>"+ datadecodificado[key].precioagencia +"</td><td>"+ datadecodificado[key].preciopublico +"</td>><td>"+ fecdesde +"</td>><td>"+ fechasta +"</td></tr>";
                            

                            }else{
                                tipoconsulta = "abm";

                                var fila = "<tr><td><input type='button' value = '&#10008;' class = 'btn btn-sm btn-danger' onclick='eliminarconsumision(\"" +datadecodificado[key].id_consumision+ "\",\"" +datadecodificado[key].nombre_consumision + "\",\"" +datadecodificado[key].id_empresa + "\",\"" +datadecodificado[key].id_tipoempresa + "\",\"" + tipoconsulta + "\")' /></td><td><input type='button' value = '&#9998;' class = 'btn btn-sm btn-info' onclick='editarconsumision(\"" +datadecodificado[key].id_consumision+ "\",\"" +datadecodificado[key].nombreconsumision + "\",\"" +datadecodificado[key].id_empresa + "\",\"" +datadecodificado[key].id_tipoempresa + "\")' /></td><td>"+datadecodificado[key].id_consumision+"</td><td>"+datadecodificado[key].nombreconsumision+"</td></tr>";
                            

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

    function validarconsumo()
    {
        if($("#consumotraslado").val() == "")
        {
            document.getElementById("consumotraslado").style.backgroundColor = "#FA5858";
        }else{
            document.getElementById("consumotraslado").style.backgroundColor = "#81F79F";
        }
    }  
</script> 



<script>

$(document).ready(function()

{
    $("#nuevo").click(function()
    {
        nuevoconsumision();
    });

  /*
    $("#consultaconsumisiones_abm").click(function(e) //llama desde consumisiones
    {
        consulta_consumisiones("abm","consulta",1,0);
    });


    $("#consultaconsumisiones_seleccionable").click(function(e)
    {
        alert("va a mandar ");
        consulta_consumisiones('seleccionable','consultadeagendabodega',1,0);
    });
  
    $("#consultaconsumisiones_seleccionable_agenda").click(function(e) //llama desde la agenda
    {
        
        consulta_consumisiones('seleccionable','consultadeagendabodega',1,0);
    });
    */

    $("#guardar").click(function() //guarda desde consumisiones sin bodega
    {
        guardarconsumision($("#idempresa").val(),$("#idtipoempresa").val(),0,0,"","");
        //parametros : idempresapasado,idtipoempresapasado,precioagencia,preciopublico,vigdesde,vighasta
        consulta_consumisiones("abm","consultadeagendabodega",0,0);
        nuevoconsumision();
    });


    $( "#nombrenuevoconsumision" ).focus(function()
    {
        verificanombre(); 
    });


    function verificanombre()
    {
        if($( "#nombrenuevoconsumision" ).val().length<=0) 
        {
            $("#faltanombreconsumision").css("display","inline").fadeOut(2000);
        } 
    }
   

    $( "#guardar").click(function(){
        if($( "#nombrenuevoconsumision" ).val().length<=0) 
        {
            $("#faltanombreconsumision").css("display","inline").fadeOut(2000);
            return false;
        }   
    });
});

</script>

<?php
    include("funciones/convertidorfecha.php");  
?>