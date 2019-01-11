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

    $("#titulovistapreviabodega").val($("#titemailb").val());
    $("#subtitulovistapreviabodega").val($("#subtitemailb").val());
    $("#saludoemailb").val($("#saludoemailb").val());
    var mensajeentrefechas = " Reserva entre fechas ../../.... a ../../.... a las ..:.. hs. para una cantidad de .. persona/s. ";

    $("#vistapreviabodega").val( $("#cuerpoemailb").val() + mensajeentrefechas + $("#saludoemailb").val() );
    
    
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