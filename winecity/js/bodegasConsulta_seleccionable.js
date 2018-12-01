function consulta_seleccionable()
{
    $('#tabla_bodegas tr').not(':first').remove(); //elimina todas las filas menos la primera

    var id = $("#idbodega").val(); 

    $.ajax({
        url:"controladores/consultabodegas.php",
        data: {id:id,tipo:"consulta",nombre:"",email:"",telefono:""},
        type: "post",

        success:function(data){

            if(data!="consultavacia")
            {
                datadecodificado = JSON.parse(data);

                $.each(datadecodificado,function(key,value)
                {
                     //var fila = "<tr><td>"+datadecodificado[key].id_bodega+"</td><td>"+datadecodificado[key].nombre_bodega+"</td><td>"+datadecodificado[key].email_bodega+"</td><td>"+datadecodificado[key].telefono_bodega+"</td><td><input type='button' value = 'NO' class = 'btn btn-sm btn-danger' onclick='noseleccionar(\"" +datadecodificado[key].id_bodega+ "\",\"" +datadecodificado[key].nombre_bodega+ "\",\"" +datadecodificado[key].email_bodega+ "\",\"" +datadecodificado[key].telefono_bodega+ "\")' /></td><td><input type='button' value = 'SI' class = 'btn btn-sm btn-info' onclick='seleccionar(\"" +datadecodificado[key].id_bodega+ "\",\"" +datadecodificado[key].nombre_bodega+ "\",\"" +datadecodificado[key].email_bodega+ "\",\"" +datadecodificado[key].telefono_bodega+ "\")' /></td></tr>";
                     var fila = "<tr><td><input type='button' value = 'NO' class = 'btn btn-sm btn-danger' onclick='noseleccionar(\"" +datadecodificado[key].id_bodega+ "\",\"" +datadecodificado[key].nombre_bodega+ "\",\"" +datadecodificado[key].email_bodega+ "\",\"" +datadecodificado[key].telefono_bodega+ "\")' /></td><td><input type='button' value = 'SI' class = 'btn btn-sm btn-info' onclick='seleccionar(\"" +datadecodificado[key].id_bodega+ "\",\"" +datadecodificado[key].nombre_bodega+ "\",\"" +datadecodificado[key].email_bodega+ "\",\"" +datadecodificado[key].telefono_bodega+ "\")' /></td><td>"+datadecodificado[key].id_bodega+"</td><td>"+datadecodificado[key].nombre_bodega+"</td><td>"+datadecodificado[key].email_bodega+"</td><td>"+datadecodificado[key].telefono_bodega+"</td></tr>";

                        $("#tabla_bodegas").append(fila);
                });
            }
        },

        error: function(e)
        {
            alert("Error en la consulta.");
        }
    });
}