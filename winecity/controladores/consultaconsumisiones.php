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

            $sql = "Select * from consumisiones  order by nombreconsumision";

        }else

        {

            $sql = "Select * from consumisiones where id_consumision=" . $id;

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

        $sql = "Select * from consumisiones where id_consumision=" . $id;

        $resultado  = $cnx->query($sql);

        



        if( $resultado->num_rows > 0)

        {

            $sql = "update consumisiones set nombre_consumision ='$nombre' where id_consumision= $id";

            $resultado  = $cnx->query($sql);

            echo "Consumo $nombre actualizado !!!";

            

        }else{

            $sql = "insert into consumisiones(nombreconsumision) values('$nombre')";

            $resultado  = $cnx->query($sql);

            echo "consumo $nombre creado !!!";

        }

    }else if($tipo == "baja")

    {

        $sql = "delete from consumisiones where id_consumision = '$id'";



        $resultado  = $cnx->query($sql);

        echo "consumo $nombre Eliminado !!!";

    }

?>