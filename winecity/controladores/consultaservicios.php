<?php



    $cnx = new MySQLi("localhost","winecity_admin","Picapiedra","winecity_plataforma");



    $id = $_POST['id'];

    $tipo = $_POST['tipo'];

    $nombre = $_POST['nombre'];

    



    //Consulta

    if($tipo == "consulta")

    {

        if($id=="")

        {

            $sql = "Select * from servicios  order by nombreservicio";

        }else

        {

            $sql = "Select * from servicios where id_servicio=" . $id;

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

        $sql = "Select * from servicios where id_servicio=" . $id;

        $resultado  = $cnx->query($sql);

        



        if( $resultado->num_rows > 0)

        {

            $sql = "update servicios set nombre_servicio ='$nombre' where id_servicio= $id";

            $resultado  = $cnx->query($sql);

            echo "Servicio $nombre actualizado !!!";

            

        }else{

            $sql = "insert into servicios(nombreservicio) values('$nombre')";

            $resultado  = $cnx->query($sql);

            echo "Servicio $nombre creado !!!";

        }

    }else if($tipo == "baja")

    {

        $sql = "delete from servicios where id_servicio = '$id'";



        $resultado  = $cnx->query($sql);

        echo "Servicio $nombre Eliminado !!!";

    }

?>