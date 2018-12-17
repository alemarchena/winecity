<?php

    $cnx = new MySQLi("localhost","winecity_admin","Picapiedra","winecity_plataforma");
    
    date_default_timezone_set('America/Argentina/Mendoza');
    
    $fho = new DateTime();
    $fechahoraoperativa= $fho->format('Y-m-d H:i:sP');
    

    $id = $_POST['id_agendado'];
    $tipo = $_POST['tipo'];
 	
 	$fechaguion = str_replace('/', '-', $_POST['fechaagendado']); //el mysql no se banca las barras invertidas asi que le mando guion
   	$fecha = strtotime($fechaguion);
	$fechaagendado = date("Y-m-d",$fecha);


    $horaagendado = $_POST['horaagendado'];
    $id_bodega = $_POST['id_bodega'];

    $id_cliente = $_POST['id_cliente'];
    $emailcliente = $_POST['emailcliente'];

    $id_consumision = $_POST['id_consumision'];
    $id_contactobodega = $_POST['id_contactobodega'];
    $id_estadoagendado = $_POST['id_estadoagendado'];
    $monto= $_POST['monto'];
    $cantidad= $_POST['cantidad'];
    $observaciones= $_POST['observaciones'];

    //echo "console.log($id)";

   	if($tipo == "consulta")
    {
        if($id=="")
        {
            //$sql = "Select * from agendados  order by fechaagendado";

            $sql = "Select agendados.id_agendado,agendados.fechahoraoperativa, agendados.fechaagendado,agendados.horaagendado,bodegas.id_bodega,bodegas.nombre_bodega, bodegas.email_bodega,consumisiones.id_consumision, consumisiones.nombreconsumision,clientes.id_cliente,clientes.nombrecliente,clientes.emailcliente,agendados.monto,agendados.cantidad,agendados.observaciones,bodegascontactos.id_contactobodega,bodegascontactos.nombrecontactobodega,estadosagendados.id_estadoagendado,estadosagendados.nombreestado 
                from (((((agendados 
                INNER JOIN bodegas ON agendados.id_bodega = bodegas.id_bodega) 
                INNER JOIN consumisiones ON agendados.id_consumision = consumisiones.id_consumision) 
                INNER JOIN clientes ON agendados.id_cliente = clientes.id_cliente) 
                INNER JOIN bodegascontactos ON agendados.id_contactobodega = bodegascontactos.id_contactobodega) 
                INNER JOIN estadosagendados ON agendados.id_estadoagendado = estadosagendados.id_estadoagendado)  
                where agendados.fechaagendado = '" . $fechaagendado . "' order by fechaagendado";
                
                //echo "console.log($sql)";
                
        }else
        {
            $sql = "Select * from agendados where id_agendado=" . $id;
        }
        
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
        $sql = "Select * from agendados where id_agendado=" . $id;
        $resultado  = $cnx->query($sql);
        
        
        if( $resultado->num_rows > 0)
        {
            $sql = "update agendados set agendados.fechahoraoperativa='$fechahoraoperativa',agendados.id_estadoagendado=$id_estadoagendado where agendados.id_agendado= $id";
            $resultado  = $cnx->query($sql);
             //echo "console.log($sql)";
            echo "Agenda actualizada !!!";
            
        }else{
            $sql = "insert into agendados(fechahoraoperativa,fechaagendado,horaagendado,id_bodega,id_consumision,id_contactobodega,id_cliente,id_estadoagendado,monto,cantidad,observaciones) values('$fechahoraoperativa','$fechaagendado','$horaagendado','$id_bodega','$id_consumision','$id_contactobodega','$id_cliente','$id_estadoagendado',$monto,$cantidad,'$observaciones')";
           
            $resultado  = $cnx->query($sql);
            echo "Registros creados en la agenda !!!";
        }
    }else if($tipo == "baja")
    {
        $sql = "delete from agendados where agendados.id_agendado= $id";

        $resultado  = $cnx->query($sql);
        echo "Registo de agenda Eliminado !!!";
    }
?>