<script>

function nuevoemail(){

	$("#titulovistapreviacliente").val("");
	$("#titemailc").val("");

    $("#subtitulovistapreviacliente").val("");
    $("#subtitemailc").val("");

    $("#vistapreviacliente").val("");
    $("#cuerpoemailc").val("");

    $("#titulovistapreviabodega").val("");
    $("#titemailb").val("");

    $("#subtitulovistapreviabodega").val("");
    $("#subtitemailb").val("");

    $("#vistapreviabodega").val("");
    $("#cuerpoemailb").val("");
    $("#saludoemailb").val("");
}

function vistaprevia()
{
    $("#titulovistapreviacliente").val($("#titemailc").val());
    $("#subtitulovistapreviacliente").val($("#subtitemailc").val());
    $("#vistapreviacliente").val($("#cuerpoemailc").val());

}

function vistapreviabodega()
{
    $("#titulovistapreviabodega").val($("#titemailbvpb").val());
    $("#subtitulovistapreviabodega").val($("#subtitemailbvpb").val());
    $("#saludoemailb").val($("#saludoemailbvpb").val());

    /*arma el mensaje con las partes*/
    $("#cuerpoemailbvpb").val("");
    $("#cuerpoemailbvpb").val($("#cuerpoemailbvpb").val() + $("#parte1").val()); /* solicito */
    $("#cuerpoemailbvpb").val($("#cuerpoemailbvpb").val() + $("#parte2").val()); /* entre o fecha */
    $("#cuerpoemailbvpb").val($("#cuerpoemailbvpb").val() + " - " + $("#horaemail").val() + " hs "); /* hora */
    $("#cuerpoemailbvpb").val($("#cuerpoemailbvpb").val() + $("#parte3").val()); /* para */
    $("#cuerpoemailbvpb").val($("#cuerpoemailbvpb").val() + $("#consumotraslado").val()); /* consumision */

    
    $("#cuerpoemailbvpb").val($("#cuerpoemailbvpb").val() + $("#parte4").val()); /* a nombre de wine city por */
    $("#cuerpoemailbvpb").val($("#cuerpoemailbvpb").val() + $("#personastraslado").val()); /* cantidad de personas */


    $("#cuerpoemailbvpb").val($("#cuerpoemailbvpb").val() + $("#parte5").val()); /* personas */

    $("#cuerpoemailbvpb").val($("#cuerpoemailbvpb").val() + $("#parte6").val()); /* del pais .....*/
    $("#cuerpoemailbvpb").val($("#cuerpoemailbvpb").val() + $("#parte7").val()); /* a nombre de  */

    $("#cuerpoemailbvpb").val($("#cuerpoemailbvpb").val() + $("#clientetraslado").val()); /* nombre del cliente */
    
    $("#cuerpoemailbvpb").val($("#cuerpoemailbvpb").val() + "-"); /* guion */


    $("#cuerpoemailbvpb").val($("#cuerpoemailbvpb").val() + $("#parte8").val()); /* paga pax o agencia */
    
    $("#cuerpoemailbvpb").val($("#cuerpoemailbvpb").val() + "-"); /* guion */

    $("#vistapreviabodega").val( $("#cuerpoemailbvpb").val() + $("#saludoemailbvpb").val() );
}

function consultaparametros(idioma)
{

	$('#titemailc').val("");
	$('#subtitemailc').val("");
	$('#cuerpoemailc').val("");

	$('#titemailb').val("");
	$('#subtitemailb').val("");
    $('#cuerpoemailb').val("");
	$('#saludoemailb').val("");

    $('#emailcopia').val("");

	$.ajax({

		url:"controladores/consultaemail.php",
		data:{idioma:idioma,tipo:"consulta"},
		type:"post",
		success:function(data){
 				if(data!="consultavacia")
                {
                    datade= JSON.parse(data);

                    $.each(datade,function(key,value)
                    {
                		$('#titemailc').val(datade[key].titulocliente);
						$('#subtitemailc').val(datade[key].subtitulocliente);
						$('#cuerpoemailc').val(datade[key].cuerpocliente);

						$('#emailcopia').val(datade[key].emailcopia);
						vistaprevia();
					});
				}else{
					console.log("Data devolvio:" + data);
				}
		},
		error:function(e){
			alert("Error en la consulta");
		}
	});
}


function consultaparametrosemailbodega(idioma)
{

    $('#titemailb').val("");
    $('#subtitemailb').val("");
    $('#cuerpoemailb').val("");
    $('#saludoemailb').val("");

    $('#emailcopia').val("");

    $.ajax({

        url:"controladores/consultaemail.php",
        data:{idioma:idioma,tipo:"consulta"},
        type:"post",
        success:function(data){
                if(data!="consultavacia")
                {
                    datade= JSON.parse(data);

                    $.each(datade,function(key,value)
                    {
                        $('#titemailb').val(datade[key].titulobodega);
                        $('#subtitemailb').val(datade[key].subtitulobodega);
                        $('#cuerpoemailb').val(datade[key].cuerpobodega);
                        $('#saludoemailb').val(datade[key].saludoabodega);
                        
                        $('#emailcopia').val(datade[key].emailcopia);
                        vistaprevia();
                    });
                }else{
                    console.log("Data devolvio:" + data);
                }
        },
        error:function(e){
            alert("Error en la consulta");
        }
    });
}
function guardarparametros(idioma)
{
	alert("Guarda " + idioma);
		var titulocliente	= $('#titemailc').val();
		var subtitulocliente= $('#subtitemailc').val();
		var cuerpocliente	= $('#cuerpoemailc').val();

		var titulobodega	= $('#titemailb').val();
		var subtitulobodega	= $('#subtitemailb').val();
        var cuerpobodega     =$('#cuerpoemailb').val();
        var saludoabodega     =$('#saludoemailb').val();

		var emailcopia	 =$('#emailcopia').val();
		
		var idioma=idioma;

        $.ajax({

            url:"controladores/consultaemail.php",

            data: {emailcopia:emailcopia,titulocliente:titulocliente,subtitulocliente:subtitulocliente,cuerpocliente:cuerpocliente,titulobodega:titulobodega,subtitulobodega:subtitulobodega,cuerpobodega:cuerpobodega,idioma:idioma,saludoabodega:saludoabodega,tipo:"alta"},

            type: "post",

            success:function(data){

                //console.log("Data devolvio:" + data);

                if(data!="consultavacia")
                {
					nuevoemail();             
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
   

}

</script>