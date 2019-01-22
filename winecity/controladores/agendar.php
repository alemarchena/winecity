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

    $fechaguionver1 = str_replace('/', '-', $_POST['fechaagendado1']); //el mysql no se banca las barras invertidas asi que le mando guion
    $fechaver1 = strtotime($fechaguionver1);
    $fechaagendadover1 = date("Y-m-d",$fechaver1);

    $fechaguionver2 = str_replace('/', '-', $_POST['fechaagendado2']); //el mysql no se banca las barras invertidas asi que le mando guion
    $fechaver2 = strtotime($fechaguionver2);
    $fechaagendadover2 = date("Y-m-d",$fechaver2);

    $horaagendado = $_POST['horaagendado'];

    $id_hotel = $_POST['id_hotel'];
    $id_bodega = $_POST['id_bodega'];

    $id_cliente = $_POST['id_cliente'];
    $emailcliente = $_POST['emailcliente'];
    $nombrecliente = $_POST['nombrecliente'];

    $id_consumision = $_POST['id_consumision'];
    $id_servicio = $_POST['id_servicio'];
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
               

                $sql = "Select agendados.id_agendado,agendados.fechahoraoperativa, agendados.fechaagendado,agendados.horaagendado,agendados.cantidad,hoteles.id_hotel,hoteles.nombrehotel,bodegas.id_bodega,bodegas.nombre_bodega, bodegas.email_bodega,consumisiones.id_consumision, consumisiones.nombreconsumision,servicios.id_servicio,servicios.nombreservicio,clientes.id_cliente,clientes.nombrecliente,clientes.emailcliente,agendados.monto,agendados.cantidad,agendados.observaciones,bodegascontactos.id_contactobodega,bodegascontactos.nombrecontactobodega,estadosagendados.id_estadoagendado,estadosagendados.nombreestado from ( ( ( ( ( ( (agendados 
                LEFT JOIN hoteles ON agendados.id_hotel = hoteles.id_hotel) 
                LEFT JOIN bodegas ON agendados.id_bodega = bodegas.id_bodega) 
                LEFT JOIN consumisiones ON agendados.id_consumision = consumisiones.id_consumision) 
                LEFT JOIN servicios ON agendados.id_servicio = servicios.id_servicio) 
                LEFT JOIN clientes ON agendados.id_cliente = clientes.id_cliente) 
                LEFT JOIN bodegascontactos ON agendados.id_contactobodega = bodegascontactos.id_contactobodega) 
                LEFT JOIN estadosagendados ON agendados.id_estadoagendado = estadosagendados.id_estadoagendado)  
                where agendados.fechaagendado >= '" . $fechaagendadover1 . "' and agendados.fechaagendado <= '" . $fechaagendadover2 . "' order by fechaagendado,horaagendado asc";
                
                
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
            $sql = "insert into agendados(fechahoraoperativa,fechaagendado,horaagendado,id_hotel,id_bodega,id_consumision,id_servicio,id_contactobodega,id_cliente,id_estadoagendado,monto,cantidad,observaciones) values('$fechahoraoperativa','$fechaagendado','$horaagendado','$id_hotel','$id_bodega','$id_consumision','$id_servicio','$id_contactobodega','$id_cliente','$id_estadoagendado',$monto,$cantidad,'$observaciones')";
           //echo "console.log($sql)";
            $resultado  = $cnx->query($sql);
            echo "Registros creados en la agenda !!!";
        }
    }else if($tipo == "baja")
    {
        $sql = "delete from agendados where agendados.id_agendado= $id";

        $resultado  = $cnx->query($sql);
        echo "Registo de agenda Eliminado !!!";
    }else if($tipo == "modificar")
    {

        $sql = "Select * from agendados where id_agendado=" . $id;
        $resultado  = $cnx->query($sql);
        
        
        if( $resultado->num_rows > 0)
        {
            $sql = "update agendados set agendados.id_cliente='$id_cliente' where agendados.id_agendado= $id";
            $resultado  = $cnx->query($sql);
             //echo "console.log($sql)";
            echo "Email actualizado !!!";
            
        }
    }
?>