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
            $sql = "Select * from bodegascontactos order by nombrecontactobodega";
        }else
        {
            $sql = "Select * from bodegascontactos where id_contactobodega=" . $id;
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

        $sql = "Select * from bodegascontactos where id_contactobodega=" . $id;

        $resultado  = $cnx->query($sql);


        if( $resultado->num_rows > 0)

        {

            $sql = "update bodegascontactos set nombrecontactobodega ='$nombre' where id_contactobodega= $id";

            $resultado  = $cnx->query($sql);

            echo "Contacto $nombre actualizado !!!";

            

        }else{

            $sql = "insert into bodegascontactos(nombrecontactobodega) values('$nombre')";

            $resultado  = $cnx->query($sql);

            echo "Contacto $nombre creado !!!";

        }

    }else if($tipo == "baja")

    {

        $sql = "delete from bodegascontactos where id_contactobodega = '$id'";



        $resultado  = $cnx->query($sql);

        echo "Contacto $nombre Eliminado !!!";

    }

?>