<?php

    $cnx = new MySQLi("localhost","winecity_admin","Picapiedra","winecity_plataforma");

    $id = $_POST['id'];
    $tipo = $_POST['tipo'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    //Consulta
    if($tipo == "consulta")
    {
        if($id=="")
        {
            $sql = "Select * from bodegas";
        }else
        {
            $sql = "Select * from bodegas where id_bodega=" . $id;
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
        $sql = "Select * from bodegas where id_bodega=" . $id;
        $resultado  = $cnx->query($sql);
        

        if( $resultado->num_rows > 0)
        {
            $sql = "update bodegas set nombre_bodega ='$nombre', email_bodega = '$email',telefono_bodega = '$telefono' where id_bodega= $id";
            $resultado  = $cnx->query($sql);
            echo "Bodega $nombre actualizada !!!";
            
        }else{
            $sql = "insert into bodegas(nombre_bodega,email_bodega,telefono_bodega) values('$nombre','$email','$telefono')";
            $resultado  = $cnx->query($sql);
            echo "Bodega $nombre creada !!!";
        }
    }else if($tipo == "baja")
    {
        $sql = "delete from bodegas where id_bodega = '$id'";

        $resultado  = $cnx->query($sql);
        echo "Bodega $nombre Eliminada !!!";
    }
?>