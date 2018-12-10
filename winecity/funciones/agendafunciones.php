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

function guardaragenda()
{
	id_agendado="";
	var filas = $("#body_agenda").find("tr");
		var resultado = "";

		//RECORRE EL LISTADO DE LA AGENDA
	for(i=0; i<filas.length; i++){ //Recorre las filas 1 a 1
		var celdas = $(filas[i]).find("td"); //devolverá las celdas de una fila
		fechaagendado = $(celdas[1]).text();
		horaagendado= $(celdas[2]).text();

		id_bodega= $(celdas[3]).text();
		nombrebodega= $(celdas[4]).text();
		id_consumision = $(celdas[5]).text();
		nombreconsumo= $(celdas[6]).text();
		emailcliente= $(celdas[7]).text();
		monto= $(celdas[8]).text();
		id_contactobodega=$(celdas[9]).text();
		nombrecontacto=$(celdas[10]).text();
		id_estadoagendado=$(celdas[11]).text();
		estado=$(celdas[11]).text();
		

		resultado += fechaagendado + "-" + horaagendado + "-" + id_bodega + "-" + nombrebodega + "-" + id_consumision + "-" + nombreconsumo + "-" + emailcliente + "-" + monto + "-" + id_contactobodega + "-" + nombrecontacto + "-" + id_estadoagendado + "-" + estado + "\n";
		
	}

//alert(resultado);


            $.ajax({

                url:"controladores/agendar.php",

                data: {id_agendado:id_agendado,fechaagendado:fechaagendado,horaagendado:horaagendado,id_bodega:id_bodega,tipo:"alta",id_consumision:id_consumision,id_contactobodega:id_contactobodega,id_estadoagendado:id_estadoagendado,emailcliente:emailcliente,monto:monto},

                type: "post",

            success:function(data){

                //console.log("Data devolvio:" + data);

                if(data!="consultavacia")

                {

                    consultacontactobodega("cabm");

                    nuevocontactobodega();

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



            //$("#collapseTwo").collapse("show");

       

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



					var fechaelegidaInv = $("#aniofecha").val() + '-' + $("#mesfecha").val() + "-" + $("#diafecha").val();



					var idbodegae = $("#idbodegaelegida").val();



					var nombrebodegae = $("#nombrebodegaelegida").val();



					var idconsumisione = $("#idconsumisionelegida").val();



					var nombreconsumisione = $("#nombreconsumisionelegida").val();



					var emailcliente = $("#emailcliente").val();

					

					var montocliente = $("#montocliente").val();

					var idcontactobodegae = $("#idcontactobodegaelegido").val();

					var contactobodegae = $("#contactobodegaelegido").val();

					var idestado = 1;

					var estado = "Pendiente"

					var fila = "<tr><td><input type='button' value = 'X' class = 'quitar btn btn-sm btn-info' onclick='noseleccionaitem()' /></td><td>"+fechaelegida+"</td><td>"+horaelegida+"</td><td style='display:none;'>"+idbodegae+"</td><td>"+nombrebodegae+"</td><td style='display:none;'>"+idconsumisione+"</td><td>"+nombreconsumisione+"</td><td>"+emailcliente+"</td><td>"+montocliente+"</td><td style='display:none;'>"+idcontactobodegae+"</td><td>"+contactobodegae+"</td><td style='display:none;'>"+idestado+"</td><td>"+estado+"</td></tr>";



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



		console.log("Fecha:" + fecha + ",fechaEjemplo:" + fechaEjemplo);

		return fechaEjemplo;

	}



</script>