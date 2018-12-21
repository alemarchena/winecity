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

            $sql = "Select * from hoteles  order by nombrehotel";

        }else

        {

            $sql = "Select * from hoteles where id_hotel=" . $id;

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

        $sql = "Select * from hoteles where id_hotel=" . $id;

        $resultado  = $cnx->query($sql);

        



        if( $resultado->num_rows > 0)

        {

            $sql = "update hoteles set nombrehotel ='$nombre' where id_hotel= $id";

            $resultado  = $cnx->query($sql);

            echo "Hotel $nombre actualizado !!!";

            

        }else{

            $sql = "insert into hoteles(nombrehotel) values('$nombre')";

            $resultado  = $cnx->query($sql);

            echo "Hotel $nombre creado !!!";

        }

    }else if($tipo == "baja")

    {

        $sql = "delete from hoteles where id_hotel = '$id'";



        $resultado  = $cnx->query($sql);

        echo "Hotel $nombre Eliminado !!!";

    }

?>