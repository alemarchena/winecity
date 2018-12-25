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
}

function vistaprevia()
{
    $("#titulovistapreviacliente").val($("#titemailc").val());
    $("#subtitulovistapreviacliente").val($("#subtitemailc").val());
    $("#vistapreviacliente").val($("#cuerpoemailc").val());

    $("#titulovistapreviabodega").val($("#titemailb").val());
    $("#subtitulovistapreviabodega").val($("#subtitemailb").val());
    $("#vistapreviabodega").val($("#cuerpoemailb").val());
}

function consultaparametros(idioma)
{

	$('#titemailc').val("");
	$('#subtitemailc').val("");
	$('#cuerpoemailc').val("");

	$('#titemailb').val("");
	$('#subtitemailb').val("");
	$('#cuerpoemailb').val("");

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
		var cuerpobodega	 =$('#cuerpoemailb').val();
		
		var idioma=idioma;

        $.ajax({

            url:"controladores/consultaemail.php",

            data: {titulocliente:titulocliente,subtitulocliente:subtitulocliente,cuerpocliente:cuerpocliente,titulobodega:titulobodega,subtitulobodega:subtitulobodega,cuerpobodega:cuerpobodega,idioma:idioma,tipo:"alta"},

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