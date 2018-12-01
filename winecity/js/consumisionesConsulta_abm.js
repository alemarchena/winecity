function consulta_consumisiones_abm()
    {
        $('#tabla_consumos tr').not(':first').remove(); //elimina todas las filas menos la primera

        var id = $("#idconsumo").val(); 

        $.ajax({
            url:"controladores/consultaconsumisiones.php",
            data: {id:id,tipo:"consulta",nombre:""},
            type: "post",

            success:function(data){

                if(data!="consultavacia")
                {
                    datadecodificado = JSON.parse(data);

                    $.each(datadecodificado,function(key,value)
                    {
                         var fila = "<tr><td>"+datadecodificado[key].id_consumision+"</td><td>"+datadecodificado[key].nombre_consumision+"</td><td><input type='button' value = 'Borrar' class = 'btn btn-sm btn-danger' onclick='eliminar(\"" +datadecodificado[key].id_consumision+ "\",\"" +datadecodificado[key].nombre_consumision+"\")' /></td><td><input type='button' value = 'Editar' class = 'btn btn-sm btn-info' onclick='editar(\"" +datadecodificado[key].id_consumision+ "\",\"" +datadecodificado[key].nombre_consumision+ "\")' /></td></tr>";

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