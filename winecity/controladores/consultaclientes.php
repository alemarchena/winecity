<?php



    $cnx = new MySQLi("localhost","winecity_admin","Picapiedra","winecity_plataforma");

    $id = $_POST['id'];
    $tipo = $_POST['tipo'];
    $email = $_POST['email'];


    //Consulta

    if($tipo == "consulta")
    {
        if($id=="")
        {
            $sql = "Select * from clientes order by emailcliente";
        }else
        {
            $sql = "Select * from clientes where id_cliente=" . $id;
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

        $sql = "Select * from clientes where id_cliente=" . $id;

        $resultado  = $cnx->query($sql);


        if( $resultado->num_rows > 0)

        {

            $sql = "update clientes set emailcliente ='$email' where id_cliente= $id";

            $resultado  = $cnx->query($sql);

            echo "Cliente $email actualizado !!!";

            

        }else{

            $sql = "insert into clientes(emailcliente) values('$email')";

            $resultado  = $cnx->query($sql);

            echo "Cliente $email creado !!!";

        }

    }else if($tipo == "baja")

    {

        $sql = "delete from clientes where id_cliente = '$id'";



        $resultado  = $cnx->query($sql);

        echo "Cliente $nombre Eliminado !!!";

    }

?>