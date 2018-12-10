<?php

    $cnx = new MySQLi("localhost","winecity_admin","Picapiedra","winecity_plataforma");
    
    
    $id = $_POST['id_agendado'];
    $tipo = $_POST['tipo'];
 	
 	$fechaguion = str_replace('/', '-', $_POST['fechaagendado']); //el mysql no se banca las barras invertidas asi que le mando guion
   	$fecha = strtotime($fechaguion);
	$fechaagendado = date("Y-m-d",$fecha);


    $horaagendado = $_POST['horaagendado'];
    $id_bodega = $_POST['id_bodega'];

    $emailcliente = $_POST['emailcliente'];

    $id_consumision = $_POST['id_consumision'];
    $id_contactobodega = $_POST['id_contactobodega'];
    $id_estadoagendado = $_POST['id_estadoagendado'];
    $monto= $_POST['monto'];

   	if($tipo == "consulta")
    {
        if($id=="")
        {
            $sql = "Select * from agendados  order by fechaagendado";
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
            $sql = "update agendados set fechaagendado ='$fechaagendado', horaagendado = '$horaagendado',id_agendado = $id_agendado, id_bodega=id_bodega, id_consumision=id_consumision,id_contactobodega=id_contactobodega,id_estadoagendado=id_estadoagendado,monto=$monto where id_agendado= $id";
            $resultado  = $cnx->query($sql);
            echo "Agenda actualizada !!!";
            
        }else{
            $sql = "insert into agendados(fechaagendado,horaagendado,id_bodega,id_consumision,id_contactobodega,id_estadoagendado,monto) values('$fechaagendado','$horaagendado','$id_bodega','$id_consumision','$id_contactobodega','$id_estadoagendado',$monto)";
            echo "console.log($sql);";
            $resultado  = $cnx->query($sql);
            echo "Registros creados en la agenda !!!";
        }
    }else if($tipo == "baja")
    {
        $sql = "delete from agendados where id_agendado = '$id'";

        $resultado  = $cnx->query($sql);
        echo "Registo de agenda Eliminado !!!";
    }
?>