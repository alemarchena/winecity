<?php

    $cnx = new MySQLi("localhost","winecity_admin","Picapiedra","winecity_plataforma");

    $titulocliente=$_POST['titulocliente'];
    $subtitulocliente=$_POST['subtitulocliente'];
    $cuerpocliente=$_POST['cuerpocliente'];

    $titulobodega=$_POST['titulobodega'];
    $subtitulobodega=$_POST['subtitulobodega'];
    $cuerpobodega=$_POST['cuerpobodega'];

    $idioma=$_POST['idioma'];

    $tipo=$_POST['tipo'];


    //Consulta
    if($tipo == "consulta")
    {
        $sql = "Select * from parametrosemail  where idioma = '$idioma'";
        
        $resultado  = $cnx->query($sql);
        
        $data = array();
        if($resultado)
        {
            $resultado->data_seek(0);
            
            while($fila = $resultado->fetch_assoc())
            {
                array_push($data,  $fila );
            }
            echo json_encode($data);
        }else
        {
            echo "consultavacia";
        }
    }else if($tipo == "alta")
    {
        $sql = "Select * from parametrosemail where idioma = '$idioma'";
        $resultado  = $cnx->query($sql);
        

        if( $resultado->num_rows > 0)
        {
            $sql = "update parametrosemail set titulocliente ='$titulocliente', subtitulocliente = '$subtitulocliente',cuerpocliente = '$cuerpocliente',titulobodega = '$titulobodega', subtitulobodega = '$subtitulobodega',cuerpobodega='$cuerpobodega' where idioma= '$idioma'";
            $resultado  = $cnx->query($sql);
            echo "Parametros de email del idioma $idioma actualizados !!!";
            
        }else{
            $sql = "insert into parametrosemail(titulocliente,subtitulocliente,cuerpocliente,titulobodega,subtitulobodega,cuerpobodega,idioma) values('$titulocliente','$subtitulocliente','$cuerpocliente','$titulobodega','$subtitulobodega','$cuerpobodega','$idioma')";
            $resultado  = $cnx->query($sql);
            echo "Parámetros del idioma $idioma creados !!!";
        }
    }else if($tipo == "baja")
    {
        $sql = "delete from parametrosemail where idioma = '$idioma'";

        $resultado  = $cnx->query($sql);
        echo "Parámetros del idioma $idioma Eliminados !!!";
    }
?>