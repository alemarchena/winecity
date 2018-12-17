<script>



	$("#calendario").load("calendariosimple.php");



function eliminarregistroagenda(id_agendado)
{
	var opcion = confirm("ATENCIÓN seguro desea eliminar?");

	if(opcion==true){
		
		/*$(document).on('click', '.quitar', function (event) 
		{
		    event.preventDefault();
		    $(this).closest('tr').remove();
		});*/
		$.ajax({

            url:"controladores/agendar.php",

            data: {id_agendado:id_agendado,tipo:"baja"},

            type: "post",                     

            success:function(data)
            {
            	if(data!="consultavacia")
                {
                	alert(data);
            		nuevaagenda();
            		consultaagenda();
            	}
            }
        })

        .fail(function() {

            alert('Error al procesar la solicitud.');

        });
	}
}

function nuevaagenda()

{
	$('#tabla_agenda tr').not(':first').remove(); 

}

 function editaritem(iditem,id_estadoagendadoactual)
{

    $("#id_agendado").val(iditem);
    $("#id_estadoagendado").val(id_estadoagendadoactual);

 	habilitadeshabilitaagendado("si");
}

function cambiarestado(id_agendado,id_estadoagendado)
{
	if(id_estadoagendado==2){
		var opcion = confirm("Desea Cambiar el estado a Confirmado ?");
	}else if(id_estadoagendado==3){
		var opcion = confirm("Desea Cambiar el estado a Disponible ?");
	}else if(id_estadoagendado==4){
		var opcion = confirm("Desea Cambiar el estado a Cancelado ?");
	}

    if (opcion == true) {

        $.ajax({

            url:"controladores/agendar.php",

            data: {id_agendado:id_agendado,tipo:"alta",id_estadoagendado:id_estadoagendado},

            type: "post",                     

            success:function(data)
            {
            	if(data!="consultavacia")
                {
                	alert(data);
            		nuevaagenda();
            		consultaagenda();
            	}
            }
        })

        .fail(function() {

            alert('Error al procesar la solicitud.');

        });
    }
}

function habilitadeshabilitaagendado(habilita){

	if(habilita=="si"){
	 	document.getElementById("id_agendado").style.display = "block";
	 	document.getElementById("labelid").style.display = "block";
 		
		

	 	if ($("#id_estadoagendado").val() == 1){
	 		document.getElementById("confirmado").style.display = "block";
	 		document.getElementById("disponible").style.display = "block";
	 		document.getElementById("cancelado").style.display = "block";
			document.getElementById("confirmado").disabled = false;
			document.getElementById("disponible").disabled = false;
			document.getElementById("cancelado").disabled = false;
		}else if ($("#id_estadoagendado").val() == 2){
			document.getElementById("confirmado").style.display = "none";
	 		document.getElementById("disponible").style.display = "block";
	 		document.getElementById("cancelado").style.display = "block";
			document.getElementById("confirmado").disabled = true;
			document.getElementById("disponible").disabled = false;
			document.getElementById("cancelado").disabled = false;
		}else if ($("#id_estadoagendado").val() == 3){
			document.getElementById("confirmado").style.display = "none";
	 		document.getElementById("disponible").style.display = "none";
	 		document.getElementById("cancelado").style.display = "block";
			document.getElementById("confirmado").disabled = true;
			document.getElementById("disponible").disabled = true;
			document.getElementById("cancelado").disabled = false;
		}else if ($("#id_estadoagendado").val() == 4){
			document.getElementById("confirmado").style.display = "block";
	 		document.getElementById("disponible").style.display = "block";
	 		document.getElementById("cancelado").style.display = "block";
			document.getElementById("confirmado").disabled = true;
			document.getElementById("disponible").disabled = true;
			document.getElementById("cancelado").disabled = true;
		}
	}else{
	 	document.getElementById("id_agendado").style.display = "none";
	 	document.getElementById("labelid").style.display = "none";
	 	document.getElementById("confirmado").style.display = "none";
	 	document.getElementById("disponible").style.display = "none";
	 	document.getElementById("cancelado").style.display = "none";
		document.getElementById("confirmado").disabled = true;
		document.getElementById("disponible").disabled = true;
		document.getElementById("cancelado").disabled = true;
	}
}

function consultaagenda()
{
	//blanqueo el id de agendado
	$('#tabla_agenda tr').not(':first').remove(); 
 	$("#id_agendado").val("");

	habilitadeshabilitaagendado(false);
	
	document.getElementById("agregarreserva").disabled = true;
	document.getElementById("agendar").disabled = true;
	document.getElementById("nuevasreservas").disabled = false;

	id_agendado=$("#id_agendado").val();
	fechaagendado = $("#fechaactual").val();

	//alert(fechaagendado);
	$.ajax({

		url:"controladores/agendar.php",
		data:{id_agendado:id_agendado,tipo:"consulta",fechaagendado:fechaagendado},
		type:"post",
		success:function(data){
 				if(data!="consultavacia")
                {
                    datade= JSON.parse(data);

                    $.each(datade,function(key,value)
                    {
                    	//datade[key].nombreestado



					var fila = "<tr><td><input type='button' value = '&#10008;' class = 'quitar btn btn-sm btn-danger' onclick='eliminarregistroagenda(\"" +datade[key].id_agendado+ "\")' /></td><td>"+datade[key].id_agendado+"</td><td>"+datade[key].fechaagendado+"</td><td>"+datade[key].horaagendado+"</td><td style='display:none;'>"+datade[key].id_bodega+"</td><td>"+datade[key].nombre_bodega+"</td><td style='display:none;'>"+datade[key].id_consumision+"</td><td>"+datade[key].nombreconsumision+"</td><td style='display:none;'>"+datade[key].id_cliente+"</td><td>"+datade[key].emailcliente+"</td><td>"+datade[key].monto+"</td><td>"+datade[key].cantidad+"</td><td>"+datade[key].observaciones+"</td><td style='display:none;'>"+datade[key].id_contactobodega+"</td><td>"+datade[key].nombrecontactobodega+"</td><td style='display:none;'>"+datade[key].id_estadoagendado+"</td><td>"+datade[key].nombreestado+"</td><td>"+datade[key].fechahoraoperativa+"</td><td><input type='button' value = '&#9998;' class = 'btn btn-sm btn-info' onclick='editaritem(\"" +datade[key].id_agendado+ "\","+datade[key].id_estadoagendado+")'/></td></tr>";

						$("#tabla_agenda").append(fila);

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

function guardaragenda()
{
	
	var filas = $("#body_agenda").find("tr");
	var resultado = "";
	if(filas.length>0)
	{
		//RECORRE EL LISTADO DE LA AGENDA
	
		for(i=0; i<filas.length; i++){ //Recorre las filas 1 a 1
			var celdas = $(filas[i]).find("td"); //devolverá las celdas de una fila
			id_agendado = $(celdas[1]).text();
			fechaagendado = $(celdas[2]).text();
			horaagendado= $(celdas[3]).text();

			id_bodega= $(celdas[4]).text();
			nombrebodega= $(celdas[5]).text();
			id_consumision = $(celdas[6]).text();
			nombreconsumo= $(celdas[7]).text();
			id_cliente= $(celdas[8]).text();
			emailcliente= $(celdas[9]).text();
			monto= $(celdas[10]).text();
			cantidad=$(celdas[11]).text();
			observaciones=$(celdas[12]).text();
			id_contactobodega=$(celdas[13]).text();
			nombrecontacto=$(celdas[14]).text();
			id_estadoagendado=$(celdas[15]).text();
			estado=$(celdas[16]).text();
			

			resultado += id_agendado +  "-" + fechaagendado + "-" + horaagendado + "-" + id_bodega + "-" + nombrebodega + "-" + id_consumision + "-" + nombreconsumo + "-" +id_cliente + "-" + emailcliente + "-" + monto + "-" + cantidad + "-" + observaciones + "-" + id_contactobodega + "-" + nombrecontacto + "-" + id_estadoagendado + "-" + estado + "\n";
			
		}

//alert(resultado);


        $.ajax({

            url:"controladores/agendar.php",

            data: {id_agendado:id_agendado,fechaagendado:fechaagendado,horaagendado:horaagendado,id_bodega:id_bodega,tipo:"alta",id_consumision:id_consumision,id_contactobodega:id_contactobodega,id_estadoagendado:id_estadoagendado,id_cliente:id_cliente,emailcliente:emailcliente,monto:monto,cantidad:cantidad,observaciones:observaciones},

            type: "post",

            success:function(data){

                //console.log("Data devolvio:" + data);

                if(data!="consultavacia")

                {
					nuevaagenda();
					consultaagenda();             
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
    }else{
                alert("Agregue datos a la agenda");

    }   

}	

	function AgregaBotonEvento()

	{
		//blanqueo el id de agendado
 		document.getElementById("id_agendado").style.display = "none";
 		document.getElementById("labelid").style.display = "none";
		$("#id_agendado").val("");


		if($("#fechaactual").val() == "" || $("#horaseleccionada").val() == ""){

			$("#mensaje").html("Indique una fecha y hora en el calendario").show();

			$("#mensaje").html("Indique una fecha y hora en el calendario").fadeOut(3000);

		}else{

			$("#mensaje").html("").hide();

			if($("#idbodegaelegida").val() == ""){

				$("#mensaje").html("Indique una bodega").show();

				$("#mensaje").html("Indique una bodega").fadeOut(3000);

			}else{

				$("#mensaje").html("").hide();

				if($("#idconsumisionelegida").val() == ""){

					$("#mensaje").html("Indique un consumo").show();

					$("#mensaje").html("Indique un consumo").fadeOut(3000);
				}else{

					$("#mensaje").html("").hide();

					var id_agendado = "";

					var fechaelegida = $("#fechaactual").val();

					var horaelegida = $("#horaseleccionada").val();

					var idbodegae = $("#idbodegaelegida").val();

					var nombrebodegae = $("#nombrebodegaelegida").val();

					var idconsumisione = $("#idconsumisionelegida").val();

					var nombreconsumisione = $("#nombreconsumisionelegida").val();

					var idcliente = $("#idclienteelegido").val();

					var emailcliente = $("#emailclienteelegido").val();

					var montocliente = $("#montocliente").val();

					var cantidad = $("#cantidadpersonas").val();

					var observaciones = $("#observaciones").val();

					var idcontactobodegae = $("#idcontactobodegaelegido").val();

					var contactobodegae = $("#contactobodegaelegido").val();

					var idestado = 1;

					var estado = "Pendiente";

			
					var fila = "<tr><td></td><td>"+id_agendado+"</td><td>"+fechaelegida+"</td><td>"+horaelegida+"</td><td style='display:none;'>"+idbodegae+"</td><td>"+nombrebodegae+"</td><td style='display:none;'>"+idconsumisione+"</td><td>"+nombreconsumisione+"</td><td style='display:none;'>"+idcliente+"</td><td>"+emailcliente+"</td><td>"+montocliente+"</td><td>"+cantidad+"</td><td>"+observaciones+"</td><td style='display:none;'>"+idcontactobodegae+"</td><td>"+contactobodegae+"</td><td style='display:none;'>"+idestado+"</td><td>"+estado+"</td><td></td></tr>";

					$("#tabla_agenda").append(fila);
				}
			}
		}
	}


	//Script que controla el reloj
	$('.clockpicker').clockpicker({
	    placement: 'bottom',
	    align: 'center',
	    donetext: 'Seleccionar'
	});

$("#confirmado").click(function(event){
    cambiarestado($("#id_agendado").val(),2);

});

$("#disponible").click(function(event){
    
    cambiarestado($("#id_agendado").val(),3);
    
});

$("#cancelado").click(function(event){
    cambiarestado($("#id_agendado").val(),4);
    
    
});
	

	$("#nuevasreservas").click(function()
	{
		$('#tabla_agenda tr').not(':first').remove(); 
	 	$("#id_agendado").val("");
		document.getElementById("agregarreserva").disabled = false;
		document.getElementById("agendar").disabled = false;
		document.getElementById("nuevasreservas").disabled = true;
	

		habilitadeshabilitaagendado("no");
	});

	function diadehoy()
	{
		var now = new Date();
		var day = ("0" + now.getDate()).slice(-2);
		var month = ("0" + (now.getMonth() + 1)).slice(-2);
		var today = (day)+"-"+(month)+"-"+now.getFullYear();
		return today;
	}

	function formatearfecha(fecha)
	{
		var fechaEjemplo  = moment(fecha).format('DD/MM/YYYY');
		//console.log("Fecha:" + fecha + ",fechaEjemplo:" + fechaEjemplo);
		return fechaEjemplo;
	}
</script>