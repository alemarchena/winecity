<script>



$("#calendario").load("calendariosimple.php");



function eliminarregistroagenda(id_agendado)
{
	var opcion = confirm("ATENCIÓN seguro desea eliminar? Registro " + id_agendado);

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

 function editaritem(iditem,id_estadoagendadoactual,estadoagendado,cantidad,vercliente,bodega,emailbodega,hotel,idreserva,fechareserva,horareserva,fechaeditada,contactoeditado)
{

	var posicionscroll = $("#collapseGeneralReserva").offset().top
	$("html, body").animate({scrollTop:posicionscroll }, 800);

    $("#id_agendado").val(iditem);
    $("#id_estadoagendado").val(id_estadoagendadoactual);
    $("#emailclienteenviar").val(vercliente);
    $("#estadoenviar").val(estadoagendado);
    $("#bodegareserva").val(bodega);
    $("#hotelreserva").val(hotel);
    $("#idreserva").val(idreserva);
    $("#fechareserva").val(fechareserva);
    $("#horareserva").val(horareserva);
    $("#emailbodegaenviar").val(emailbodega);
    $("#cantidadpersonasreserva").val(cantidad);

    $("#contactoeditado").val(contactoeditado);
    $("#fechaeditada").val(fechaeditada);
    $("#estadoeditado").val(estadoagendado);

	
	document.getElementById("botoneliminar").style.display = "block";

	document.getElementById("datosadicionales").style.display = "block";
 	document.getElementById("emailclienteenviar").style.display = "block";

	document.getElementById("contactoeditado").style.display = "block";
	document.getElementById("fechaeditada").style.display = "block";
	document.getElementById("estadoeditado").style.display = "block";

	document.getElementById("botonclienteseditado").style.display = "block";
	document.getElementById("botonactualizaclienteeditado").style.display = "block";
	

    if(id_estadoagendadoactual===1) // si el estado es pendiente, osea el estado inicial de una reserva la cual debe ser pedida a la bodega
    {
    	consultaparametros("espaniol");

		document.getElementById("id_agendado").style.display = "block";

		document.getElementById("confirmado").style.display = "block";
		document.getElementById("confirmado").disabled = false;

		

	 	document.getElementById("disponible").style.display = "none";
	 	document.getElementById("cancelado").style.display = "none";

	 	document.getElementById("emailcliente").style.display = "none";
	 	document.getElementById("estadoenviar").style.display = "none";
		
		document.getElementById("botones").style.display = "none";
		
		document.getElementById("emailbodega").style.display = "block";

		if(emailbodega=="")
		{
			document.getElementById("infoemail").style.display = "block";		
			$("#infoemail").html("La bodega no tiene dirección de email");
			document.getElementById("emailbodega").disabled = true;
		}else
		{
			document.getElementById("infoemail").style.display = "none";		
			$("#infoemail").html("");
			document.getElementById("emailbodega").disabled = false;
		}


    }else{

	    if(vercliente!="") //si no tiene email no permite enviar correo
	    {
		    if(bodega!="" || hotel!=""){
		 		habilitadeshabilitaagendado("si","SI","SI"); 
		 		//el primer parametro es para ver si habilita todos los botones de confirmado, el segundo 	parametro es para indicar si tiene o no hotel o bodega, el tercer parametro es si tiene email
			}else{
				habilitadeshabilitaagendado("si","NO","SI");
			}
		}else{
				habilitadeshabilitaagendado("si","","NO");
		}

		if($("#radioingles").prop('checked')){
	    	consultaparametros("ingles");
	    }else if($("#radioportugues").prop('checked')){
	    	consultaparametros("portugues");
	    }else if($("#radioespaniol").prop('checked')){
	        consultaparametros("espaniol");
	    }else{
	        consultaparametros("espaniol");
	    }
 	}
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

function habilitadeshabilitaagendado(habilita,tienehotelobodega,tieneemail){

	document.getElementById("infoemail").style.display = "none";

	document.getElementById("confirmado").style.display = "block";
	document.getElementById("disponible").style.display = "block";
	document.getElementById("cancelado").style.display = "block";

	document.getElementById("emailcliente").style.display = "block";
	document.getElementById("emailbodega").style.display = "none";

	document.getElementById("datosadicionales").style.display = "block";

	document.getElementById("emailclienteenviar").style.display = "block";
	document.getElementById("botonactualizaclienteeditado").style.display = "block";


	if(habilita=="si"){
	 	document.getElementById("id_agendado").style.display = "block";

	 	if ($("#id_estadoagendado").val() == 1){ //estado pendiente, no se puede mandar email al cliente
	 		
	 		document.getElementById("botones").style.display = "none";

			document.getElementById("confirmado").disabled = false;
			document.getElementById("disponible").disabled = false;
			document.getElementById("cancelado").disabled = false;
			document.getElementById("emailcliente").disabled = true;
			document.getElementById("emailcliente").style.display = "none";

			
		}else if ($("#id_estadoagendado").val() == 2){ //Estado confirmado
		
	 		document.getElementById("botones").style.display = "block";

			document.getElementById("confirmado").disabled = true;
			document.getElementById("confirmado").style.display = "none";

			document.getElementById("disponible").disabled = false;
			document.getElementById("cancelado").disabled = false;
			if(tieneemail=="SI"){
				if(tienehotelobodega=="SI"){
					document.getElementById("emailcliente").disabled = false;
	 	
				}else{
					document.getElementById("emailcliente").disabled = true;
					document.getElementById("botones").style.display = "none";


					$("#infoemail").html("La reserva no tiene hotel o bodega");
		 			document.getElementById("infoemail").style.display = "block";	
				}
			}else
			{
				document.getElementById("emailcliente").disabled = true;
				document.getElementById("emailcliente").style.display = "none";
				document.getElementById("botones").style.display = "none";

				$("#infoemail").html("El cliente no tiene una dirección de email");
		 		document.getElementById("infoemail").style.display = "block";	
			}
		}else if ($("#id_estadoagendado").val() == 3){ //estado disponible

			document.getElementById("botones").style.display = "none";

			document.getElementById("confirmado").disabled = true;
			document.getElementById("confirmado").style.display = "none";
			
			document.getElementById("disponible").disabled = true;
			document.getElementById("disponible").style.display = "none";

			document.getElementById("cancelado").disabled = false;
			document.getElementById("emailcliente").disabled = true;
			document.getElementById("emailcliente").style.display = "none";

			$("#infoemail").html("El estado de la reserva es DISPONIBLE por lo tanto no permite el envío de email a clientes");
		 	document.getElementById("infoemail").style.display = "block";	

		}else if ($("#id_estadoagendado").val() == 4){ //estado cancelado

			document.getElementById("botones").style.display = "block";

			document.getElementById("confirmado").disabled = true;
			document.getElementById("confirmado").style.display = "none";

			document.getElementById("disponible").disabled = true;
			document.getElementById("disponible").style.display = "none";
			
			document.getElementById("cancelado").disabled = true;
			document.getElementById("cancelado").style.display = "none";
			
			if(tieneemail=="SI"){
				if(tienehotelobodega=="SI"){
					document.getElementById("emailcliente").disabled = false;
				}else{
					document.getElementById("emailcliente").disabled = true;
					document.getElementById("botones").style.display = "none";

					$("#infoemail").html("La reserva no tiene hotel o bodega");
		 			document.getElementById("infoemail").style.display = "block";	
				}
			}else
			{
				document.getElementById("emailcliente").disabled = true;
				document.getElementById("emailcliente").style.display = "none";
				document.getElementById("botones").style.display = "none";

				$("#infoemail").html("El cliente no tiene una dirección de email");
		 		document.getElementById("infoemail").style.display = "block";	
			}
			
		}
	}else{
		document.getElementById("botoneliminar").style.display = "none";

	 	document.getElementById("id_agendado").style.display = "none";
	 	document.getElementById("confirmado").style.display = "none";
	 	document.getElementById("disponible").style.display = "none";
	 	document.getElementById("cancelado").style.display = "none";
	 	document.getElementById("emailcliente").style.display = "none";
	 	document.getElementById("emailclienteenviar").style.display = "none";
		document.getElementById("botonactualizaclienteeditado").style.display = "none";

	 	document.getElementById("estadoenviar").style.display = "none";
		document.getElementById("botonclienteseditado").style.display = "none";
		
		
		document.getElementById("datosadicionales").style.display = "none";
		
		document.getElementById("contactoeditado").style.display = "none";
		document.getElementById("fechaeditada").style.display = "none";
		document.getElementById("estadoeditado").style.display = "none";

		document.getElementById("botones").style.display = "none";

		document.getElementById("confirmado").disabled = true;
		document.getElementById("disponible").disabled = true;
		document.getElementById("cancelado").disabled = true;
		document.getElementById("emailcliente").disabled = true;
		document.getElementById("emailclienteenviar").disabled = true;
		document.getElementById("estadoenviar").disabled = true;
	}
}

function emailacliente(emailcliente,titulo,subtitulo,cuerpo)
{
	var opcion = confirm("Desea enviar el email ?");
	var idreserva = $("#idreserva").val();
	
    if (opcion == true) {
	
		$.ajax({

			url:"controladores/emailacliente.php",
			data:{idreserva:idreserva,emailcliente:emailcliente,titulo:titulo,subtitulo:subtitulo,cuerpo:cuerpo},
			type:"post",
			success:function(data){
	 				if(data!="consultavacia")
	                {
	                    alert(data);
					}else{
						console.log("Data devolvio:" + data);
					}
			},
			error:function(e){
				alert("Error en la consulta");
			}
		});
	}
}

function emailabodega(emailcopia,emailbodega,titulo,subtitulo,cuerpo)
{
	var opcion = confirm("Desea enviar el email ?");
	var idreserva = $("#idreserva").val();
	
    if (opcion == true) {
	
		$.ajax({

			url:"controladores/emailabodega.php",
			data:{idreserva:idreserva,emailcopia:emailcopia,emailbodega:emailbodega,titulo:titulo,subtitulo:subtitulo,cuerpo:cuerpo},
			type:"post",
			success:function(data){
	 				if(data!="consultavacia")
	                {
	                    alert(data);
					}else{
						console.log("Data devolvio:" + data);
					}
			},
			error:function(e){
				alert("Error en la consulta");
			}
		});
	}
}

function consultaagenda()
{
	//blanqueo el id de agendado
	$('#tabla_agenda tr').not(':first').remove(); 
 	$("#id_agendado").val("");

	habilitadeshabilitaagendado("no");
	
	document.getElementById("agregarreserva").disabled = true;
	document.getElementById("agendar").disabled = true;
	document.getElementById("nuevasreservas").disabled = false;

	id_agendado=$("#id_agendado").val();
	fechaagendado = $("#fechaactual").val();
	fechaagendado1 = $("#fechaactualver1").val();
	fechaagendado2 = $("#fechaactualver2").val();


	//alert(fechaagendado);
	$.ajax({

		url:"controladores/agendar.php",
		data:{id_agendado:id_agendado,tipo:"consulta",fechaagendado:fechaagendado,fechaagendado1:fechaagendado1,fechaagendado2:fechaagendado2},
		type:"post",
		success:function(data){
 				if(data!="consultavacia")
                {
                    datade= JSON.parse(data);

                    $.each(datade,function(key,value)
                    {
                    	//datade[key].nombreestado
						var fechaage = conviertefecha(datade[key].fechaagendado);
						
						verhotel = datade[key].nombrehotel;
                		if(verhotel==null) {verhotel="";}

                		verbodega = datade[key].nombre_bodega;
                		if(verbodega==null) {verbodega="";}

						veremailbodega = datade[key].email_bodega;
                		if(veremailbodega==null) {veremailbodega="";}

                		verconsumision = datade[key].nombreconsumision;
                		if(verconsumision==null) {verconsumision="";}

                		verservicio = datade[key].nombreservicio;
                		if(verservicio==null) {verservicio="";}

                		vercontacto = datade[key].nombrecontactobodega;
                		if(vercontacto==null) {vercontacto="";}

                		vercliente = datade[key].emailcliente;
                		if(vercliente==null) {vercliente="";}

                		var clase=datade[key].nombreestado;

                		var fechaop= conviertefecha(datade[key].fechahoraoperativa);

					var fila = "<tr class='"+ clase +"'><td><input type='button' value = '&#9998;' class = 'btn btn-sm btn-info' onclick='editaritem(\"" +datade[key].id_agendado+ "\","+datade[key].id_estadoagendado+",\"" +datade[key].nombreestado+ "\","+datade[key].cantidad+",\"" +vercliente+"\",\""+verbodega+"\",\""+veremailbodega+"\",\""+verhotel+"\",\""+ datade[key].id_agendado +"\",\""+ datade[key].fechaagendado +"\",\""+ datade[key].horaagendado +"\",\""+datade[key].fechahoraoperativa+"\",\""+vercontacto+"\")'/></td><td>"+datade[key].id_agendado+"</td><td>"+fechaage+"</td><td>"+datade[key].horaagendado+"</td><td style='display:none;'>"+datade[key].id_hotel+"</td><td>"+verhotel+"</td><td style='display:none;'>"+datade[key].id_bodega+"</td><td>"+verbodega+"</td><td style='display:none;'>"+datade[key].id_consumision+"</td><td>"+verconsumision+"</td><td style='display:none;'>"+datade[key].id_servicio+"</td><td>"+verservicio+"</td><td style='display:none;'>"+datade[key].id_cliente+"</td><td>"+vercliente+"</td><td>"+datade[key].monto+"</td><td>"+datade[key].cantidad+"</td><td>"+datade[key].observaciones+"</td><td style='display:none;'>"+datade[key].id_contactobodega+"</td><td style='display:none;'>"+vercontacto+"</td><td style='display:none;'>"+datade[key].id_estadoagendado+"</td><td style='display:none;'>"+datade[key].nombreestado+"</td><td style='display:none;'>"+fechaop+"</td></tr>";

						
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
			var id_agendado = $(celdas[1]).text();
			
			var fechaagendado = $(celdas[2]).text();
			var horaagendado= $(celdas[3]).text();

			var id_hotel= $(celdas[4]).text();
			if(id_hotel==""){id_hotel=-1;}//si el id_bodega = "" coloca -1

			var nombrehotel= $(celdas[5]).text();

			var id_bodega= $(celdas[6]).text();
			if(id_bodega==""){id_bodega=-1;}//si el id_bodega = "" coloca -1

			var nombrebodega= $(celdas[7]).text();

			var id_consumision = $(celdas[8]).text();
			if(id_consumision==""){id_consumision=-1;}
			var nombreconsumo= $(celdas[9]).text();

			var id_servicio = $(celdas[10]).text();
			if(id_servicio==""){id_servicio=-1;}
			var nombreservicio= $(celdas[11]).text();

			var id_cliente= $(celdas[12]).text();
			if(id_cliente==""){id_cliente=-1;}

			var emailcliente= $(celdas[13]).text();

			var monto= $(celdas[14]).text();
			if(monto==""){monto=0;}

			var cantidad=$(celdas[15]).text();
			if(cantidad==""){cantidad=0;}

			var observaciones=$(celdas[16]).text();

			var id_contactobodega=$(celdas[17]).text();
			if(id_contactobodega==""){id_contactobodega=-1;}

			var nombrecontacto=$(celdas[18]).text();

			var id_estadoagendado=$(celdas[19]).text();
			if(id_estadoagendado==""){id_estadoagendado=-1;}

			var estado=$(celdas[20]).text();
			

			resultado += id_agendado +  "-" + fechaagendado + "-" + horaagendado + "-" + id_hotel + "-" + id_bodega + "-" + nombrebodega + "-" + id_consumision + "-" + nombreconsumo + "-" + "-" + id_servicio + "-" + nombreservicio + "-" + id_cliente + "-" + emailcliente + "-" + monto + "-" + cantidad + "-" + observaciones + "-" + id_contactobodega + "-" + nombrecontacto + "-" + id_estadoagendado + "-" + estado + "\n";
			
		}

			//alert(resultado);


        $.ajax({

            url:"controladores/agendar.php",

            data: {id_agendado:id_agendado,fechaagendado:fechaagendado,horaagendado:horaagendado,id_hotel:id_hotel,id_bodega:id_bodega,tipo:"alta",id_consumision:id_consumision,id_servicio,id_contactobodega:id_contactobodega,id_estadoagendado:id_estadoagendado,id_cliente:id_cliente,emailcliente:emailcliente,monto:monto,cantidad:cantidad,observaciones:observaciones},

            type: "post",

            success:function(data){

                //console.log("Data devolvio:" + data);

                if(data!="consultavacia")

                {
					nuevaagenda();
					consultaagenda();             
                    alert(data); //muestra un mensaje con el texto devuelto por el controlador
                    document.getElementById("horaseleccionada").disabled = true;
                    document.getElementById("fechaactual").disabled = true;
                    document.getElementById("agregarreserva").disabled = true;

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

		$("#id_agendado").val("");

		if($("#idhotelelegido").val() == "" && $("#idbodegaelegida").val() == "" && $("#idconsumisionelegida").val() == "" && $("#idservicioelegido").val() == "")
		{
			$("#mensaje").html("").hide();
			$("#mensaje").html("Agendar al menos hotel, bodega, consumisión o servicio").show();
			$("#mensaje").html("Agendar al menos hotel, bodega, consumisión o servicio").fadeOut(6000);
			return false;
		}
			
		if($("#chkHoteles").prop('checked'))
		{

			$("#mensaje").html("").hide();
			if($("#idhotelelegido").val() == ""){

				$("#mensaje").html("Elija un hotel").show();

				$("#mensaje").html("Elija un hotel").fadeOut(3000);

				return false;
			}
		}

		if($("#chkBodegas").prop('checked'))
		{

			$("#mensaje").html("").hide();
			if($("#idbodegaelegida").val() == ""){

				$("#mensaje").html("Elija una bodega").show();

				$("#mensaje").html("Elija una bodega").fadeOut(3000);

				return false;
			}
		}
		
		if($("#chkConsumisiones").prop('checked'))
		{
			$("#mensaje").html("").hide();

			if($("#idconsumisionelegida").val() == ""){

				$("#mensaje").html("Elija un consumo").show();

				$("#mensaje").html("Elija un consumo").fadeOut(3000);

				return false;
			}
		}
		

		if($("#chkServicios").prop('checked'))
		{
			$("#mensaje").html("").hide();

			if($("#idservicioelegido").val() == ""){

				$("#mensaje").html("Elija un servicio").show();

				$("#mensaje").html("Elija un servicio").fadeOut(3000);

				return false;
			}
		}

		if($("#fechaactual").val() == "" || $("#horaseleccionada").val() == ""){

			$("#mensaje").html("Elija una fecha y hora en el calendario").show();

			$("#mensaje").html("Elija una fecha y hora en el calendario").fadeOut(3000);

		}else{

			$("#mensaje").html("").hide();

			var id_agendado = "";

			var fechaelegida = $("#fechaactual").val();

			var horaelegida = $("#horaseleccionada").val();

			var idhotele = $("#idhotelelegido").val();

			var nombrehotele = $("#nombrehotelelegido").val();

			var idbodegae = $("#idbodegaelegida").val();

			var nombrebodegae = $("#nombrebodegaelegida").val();

			var idconsumisione = $("#idconsumisionelegida").val();

			var nombreconsumisione = $("#nombreconsumisionelegida").val();

			var idservicioe = $("#idservicioelegido").val();

			var nombreservicioe = $("#nombreservicioelegido").val();

			var idcliente = $("#idclienteelegido").val();

			var emailcliente = $("#emailclienteelegido").val();

			var montocliente = $("#montocliente").val();

			var cantidad = $("#cantidadpersonas").val();

			var observaciones = $("#observaciones").val();

			var idcontactobodegae = $("#idcontactobodegaelegido").val();

			var contactobodegae = $("#contactobodegaelegido").val();

			var idestado = 1;

			var estado = "Pendiente";

	
			var fila = "<tr><td></td><td>"+id_agendado+"</td><td>"+fechaelegida+"</td><td>"+horaelegida+"</td><td style='display:none;'>"+idhotele+"</td><td>"+nombrehotele+"</td><td style='display:none;'>"+idbodegae+"</td><td>"+nombrebodegae+"</td><td style='display:none;'>"+idconsumisione+"</td><td>"+nombreconsumisione+"</td><td style='display:none;'>"+idservicioe+"</td><td>"+nombreservicioe+"</td><td style='display:none;'>"+idcliente+"</td><td>"+emailcliente+"</td><td>"+montocliente+"</td><td>"+cantidad+"</td><td>"+observaciones+"</td><td style='display:none;'>"+idcontactobodegae+"</td><td>"+contactobodegae+"</td><td style='display:none;'>"+idestado+"</td><td>"+estado+"</td><td></td></tr>";

			$("#tabla_agenda").append(fila);
			
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
	
	function armamensajecliente(){

		var mensaje;
		var reserva;
		var hora;
		var estado;
		var valorestado;
		var bodega;
		var hotel;

		if($("#radioingles").prop('checked')){
	    	reserva = " Reservation ";
	    	hora = " Hour ";
	    	estado = " Status ";
	    	if($("#estadoenviar").val() === "Confirmado")
	    	{
	    		valorestado = " Confirmed ";
	    	}
	    	if($("#estadoenviar").val() === "Cancelado")
	    	{
	    		valorestado = " Cancelled ";
	    	}
	    	if($("#bodegareserva").val() != "")
	    	{
	    		bodega = " Wine Cellar : " + $("#bodegareserva").val();
	    	}else{
	    		bodega = "";
	    	}


	    	if($("#hotelreserva").val() != "")
	    	{
	    		hotel = " Hotel : " + $("#hotelreserva").val();
	    	}else{
	    		hotel="";
	    	}
	    }else if($("#radioportugues").prop('checked')){
	    	reserva = " Reservar ";
	    	hora = " Hora ";
	    	estado = " Estado ";
			if($("#estadoenviar").val() === "Confirmado")
	    	{
	    		valorestado = " Confirmou ";
	    	}
	    	if($("#estadoenviar").val() === "Cancelado")
	    	{
	    		valorestado = " Cancelado ";
	    	}
	    	if($("#bodegareserva").val() != "")
	    	{
	    		bodega = " Wine Cellar : " + $("#bodegareserva").val();
	    	}else{
	    		bodega = "";
	    	}
	    	if($("#hotelreserva").val() != "")
	    	{
	    		hotel = " Adega : " + $("#hotelreserva").val();
	    	}else{
	    		hotel="";
	    	}
	    }else if($("#radioespaniol").prop('checked')){
	     	reserva = " Reserva ";   
	    	hora = " Hora ";
	    	estado = " Estado ";
	    	if($("#estadoenviar").val() === "Confirmado")
	    	{
	    		valorestado = " Confirmado ";
	    	}
	    	if($("#estadoenviar").val() === "Cancelado")
	    	{
	    		valorestado = " Cancelado ";
	    	}
	    	if($("#bodegareserva").val() != "")
	    	{
	    		bodega = " Bodega : " + $("#bodegareserva").val();
	    	}else{
	    		bodega = "";
	    	}
	    	if($("#hotelreserva").val() != "")
	    	{
	    		hotel = " Hotel : " + $("#hotelreserva").val();
	    	}else{
	    		hotel="";
	    	}
	    }else{
	    	reserva = " Reserva ";
	    	hora = " Hora ";
	    	estado = " Estado ";
	    	if($("#estadoenviar").val() === "Confirmado")
	    	{
	    		valorestado = " Confirmado ";
	    	}
	    	if($("#estadoenviar").val() === "Cancelado")
	    	{
	    		valorestado = " Cancelado ";
	    	}
	    	if($("#bodegareserva").val() != "")
	    	{
	    		bodega = " Bodega : " + $("#bodegareserva").val();
	    	}else{
	    		bodega = "";
	    	}
	    	if($("#hotelreserva").val() != "")
	    	{
	    		hotel = " Hotel : " + $("#hotelreserva").val();
	    	}else{
	    		hotel="";
	    	}
	    }


	    var fecha = conviertefecha($("#fechareserva").val());

	    //var fecha = $("#fechareserva").val();
	    
	    mensaje = " * " + reserva + " : " + fecha + " , " + hora + " : " + $("#horareserva").val() + " - " + estado + " : " + valorestado + "." + bodega + " - " + hotel + " * ";
		
		return mensaje;
	}


	

	function armamensajebodega(){

			var mensaje;
			var reserva;
			var hora;
			var cantidadpersonas;

 			var fecha = conviertefecha($("#fechareserva").val());

	    	reservafecha = " Reserva para el " + fecha;
	    	hora = " a las " + $("#horareserva").val() + " hs. " ;
	    	cantidadpersonas = "para una cantidad de " + $("#cantidadpersonasreserva").val() + " persona/s";

		    mensaje = " * " + reservafecha + hora + cantidadpersonas + " * ";
			
			return mensaje;
		}

	$("#emailcliente").click(function(event){
		
	    var mensaje = armamensajecliente();

	    emailacliente($("#emailclienteenviar").val(),$("#titemailc").val(),$("#subtitemailc").val(),$("#cuerpoemailc").val() + mensaje);
	});

	$("#emailbodega").click(function(event){
		
	    var mensaje = armamensajebodega();

	    emailabodega($("#emailcopia").val(),$("#emailbodegaenviar").val(),$("#titemailb").val(),$("#subtitemailb").val(),$("#cuerpoemailb").val() + mensaje);
	});
	
	$("#nuevasreservas").click(function()
	{
		$('#tabla_agenda tr').not(':first').remove(); 
	 	$("#id_agendado").val("");

			$("#idhotelelegido").val("");
			$("#nombrehotelelegido").val("");
			$("#idbodegaelegida").val("");
			$("#nombrebodegaelegida").val("");
			$("#idconsumisionelegida").val("");
			$("#nombreconsumisionelegida").val("");
			$("#idservicioelegido").val("");
			$("#nombreservicioelegido").val("");
			$("#idclienteelegido").val("");
			$("#emailclienteelegido").val("");
			$("#montocliente").val("");
			$("#cantidadpersonas").val("");
			$("#observaciones").val("");
			$("#idcontactobodegaelegido").val("");
			$("#contactobodegaelegido").val("");

			// ----------------------- limpieza de campos invisibles ----------------
			$("#emailcopia").val("");
			$("#emailclienteenviar").val("");
			$("#emailbodegaenviar").val("");
			$("#estadoenviar").val("");
			$("#titemailc").val("");
			$("#subtitemailc").val("");
			$("#cuerpoemailc").val("");
			$("#titemailb").val("");
			$("#subtitemailb").val("");
			$("#cuerpoemailb").val("");
			$("#bodegareserva").val("");
			$("#hotelreserva").val("");
			$("#fechareserva").val("");
			$("#horareserva").val("");
			$("#infoemail").val("");
			//----------------------- fin campos invisibles -------------------------

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
	$("input[name=radioingles]").click(function () {    
        setsoloingles();
        consultaparametros("ingles");
    });
    $("input[name=radioportugues]").click(function () {
       setsoloportugues();
       consultaparametros("portugues");
    });

    $("input[name=radioespaniol]").click(function () {    
       setsoloespaniol();
       consultaparametros("espaniol");
    });

    function setsoloingles (){
        
        $("#radioespaniol").prop("checked", false);
        $("#radioportugues").prop("checked", false);
    }

    function setsoloportugues (){
        
        $("#radioespaniol").prop("checked", false);
        $("#radioingles").prop("checked", false);
    }

    function setsoloespaniol (){
        
        $("#radioingles").prop("checked", false);
        $("#radioportugues").prop("checked", false);
    }
</script>

<?php
	include("funciones/emailfunciones.php");	
	include("funciones/convertidorfecha.php");	
	
?>