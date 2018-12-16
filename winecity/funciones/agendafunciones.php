<script>



	$("#calendario").load("calendariosimple.php");



	function noseleccionaitem()

	{

		$(document).on('click', '.quitar', function (event) 

		{

		    event.preventDefault();



		    $(this).closest('tr').remove();

		});	



	}

function nuevaagenda()

{
	$('#tabla_agenda tr').not(':first').remove(); 

}

function confirmaragendado(id,nombre,estado)

    {

        var opcion = confirm("Desea Eliminar?");

        if (opcion == true) {

            $.ajax({

                url:"controladores/agendar.php",

                data: {id:id,tipo:"alta",nombre:nombre,estado:estado},

                type: "post",                     

                success:function(data)

                {

                    consultaagenda("cabm");

                }

            })



            .fail(function() {



                alert('Error al procesar la solicitud.');



            });

        }

    }


function consultaagenda()
{

	 $('#tabla_agenda tr').not(':first').remove(); 

	id_agendado="";
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
						var fila = "<tr><td><input type='button' value = 'X' class = 'quitar btn btn-sm btn-info' onclick='noseleccionaitem()' /></td><td>"+datade[key].fechaagendado+"</td><td>"+datade[key].horaagendado+"</td><td style='display:none;'>"+datade[key].id_bodega+"</td><td>"+datade[key].nombre_bodega+"</td><td style='display:none;'>"+datade[key].id_consumision+"</td><td>"+datade[key].nombreconsumision+"</td><td style='display:none;'>"+datade[key].id_cliente+"</td><td>"+datade[key].emailcliente+"</td><td>"+datade[key].monto+"</td><td>"+datade[key].cantidad+"</td><td>"+datade[key].observaciones+"</td><td style='display:none;'>"+datade[key].id_contactobodega+"</td><td>"+datade[key].nombrecontactobodega+"</td><td style='display:none;'>"+datade[key].id_estadoagendado+"</td><td>"+datade[key].nombreestado+"</td><td>"+datade[key].fechahoraoperativa+"</td></tr>";

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
	id_agendado="";
	var filas = $("#body_agenda").find("tr");
	var resultado = "";
	if(filas.length>0)
	{
		//RECORRE EL LISTADO DE LA AGENDA
	
		for(i=0; i<filas.length; i++){ //Recorre las filas 1 a 1
			var celdas = $(filas[i]).find("td"); //devolverá las celdas de una fila
			fechaagendado = $(celdas[1]).text();
			horaagendado= $(celdas[2]).text();

			id_bodega= $(celdas[3]).text();
			nombrebodega= $(celdas[4]).text();
			id_consumision = $(celdas[5]).text();
			nombreconsumo= $(celdas[6]).text();
			id_cliente= $(celdas[7]).text();
			emailcliente= $(celdas[8]).text();
			monto= $(celdas[9]).text();
			cantidad=$(celdas[10]).text();
			observaciones=$(celdas[11]).text();
			id_contactobodega=$(celdas[12]).text();
			nombrecontacto=$(celdas[13]).text();
			id_estadoagendado=$(celdas[14]).text();
			estado=$(celdas[15]).text();
			

			resultado += fechaagendado + "-" + horaagendado + "-" + id_bodega + "-" + nombrebodega + "-" + id_consumision + "-" + nombreconsumo + "-" +id_cliente + "-" + emailcliente + "-" + monto + "-" + cantidad + "-" + observaciones + "-" + id_contactobodega + "-" + nombrecontacto + "-" + id_estadoagendado + "-" + estado + "\n";
			
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

                    //consultaagenda("cabm");

                    nuevaagenda();

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

					var fechaelegida = $("#fechaactual").val();

					var horaelegida = $("#horaseleccionada").val();

					//var fechaelegidaInv = $("#aniofecha").val() + '-' + $("#mesfecha").val() + "-" + $("#diafecha").val();

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

			
					var fila = "<tr><td><input type='button' value = 'X' class = 'quitar btn btn-sm btn-info' onclick='noseleccionaitem()' /></td><td>"+fechaelegida+"</td><td>"+horaelegida+"</td><td style='display:none;'>"+idbodegae+"</td><td>"+nombrebodegae+"</td><td style='display:none;'>"+idconsumisione+"</td><td>"+nombreconsumisione+"</td><td style='display:none;'>"+idcliente+"</td><td>"+emailcliente+"</td><td>"+montocliente+"</td><td>"+cantidad+"</td><td>"+observaciones+"</td><td style='display:none;'>"+idcontactobodegae+"</td><td>"+contactobodegae+"</td><td style='display:none;'>"+idestado+"</td><td>"+estado+"</td></tr>";

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