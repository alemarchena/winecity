<?php



    $cnx = new MySQLi("localhost","winecity_admin","Picapiedra","winecity_plataforma");



    $id = $_POST['id'];

    $tipo = $_POST['tipo'];

    $nombre = $_POST['nombre'];
    $id_empresa = $_POST['idempresa'];
    $id_tipoempresa = $_POST['idtipoempresa'];

    $precioagencia = $_POST['precioagencia'];
    $preciopublico = $_POST['preciopublico'];
   
    
    $fechaguionver1 = str_replace('/', '-', $_POST['vigenciadesde']); //el mysql no se banca las barras invertidas asi que le mando guion
    $fechaver1 = strtotime($fechaguionver1);
    $vigenciadesde = date("Y-m-d",$fechaver1);

    $fechaguionver2 = str_replace('/', '-', $_POST['vigenciahasta']); //el mysql no se banca las barras invertidas asi que le mando guion
    $fechaver2 = strtotime($fechaguionver2);
    $vigenciahasta = date("Y-m-d",$fechaver2);

    

    //Consulta
    if($tipo == "consultadeagendabodega")
    {
        if($id_empresa==0)
        {
            $sql = "Select id_consumision,nombreconsumision,id_empresa,id_tipoempresa,precioagencia,preciopublico,vigenciadesde,vigenciahasta,bodegas.nombre_bodega from consumisiones LEFT JOIN bodegas ON consumisiones.id_empresa = bodegas.id_bodega where id_tipoempresa = $id_tipoempresa order by nombreconsumision";
            
        }else
        {
            $sql = "Select id_consumision,nombreconsumision,id_empresa,id_tipoempresa,precioagencia,preciopublico,vigenciadesde,vigenciahasta,bodegas.nombre_bodega from ( (consumisiones INNER JOIN bodegas ON consumisiones.id_empresa = bodegas.id_bodega))

                where id_empresa=" . $id_empresa . " and id_tipoempresa = " . $id_tipoempresa;
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

    }else if($tipo == "consulta")
    {
        if($id=="")
        {
            $sql = "Select * from consumisiones  order by nombreconsumision";
        }else
        {
            $sql = "Select * from consumisiones where id_consumision=" . $id . " and id_empresa=" . $id_empresa . " and id_tipoempresa = " . $id_tipoempresa;
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
        $sql = "Select * from consumisiones where id_consumision=" . $id . " and id_empresa=" . $id_empresa . " and id_tipoempresa = " . $id_tipoempresa;

        $resultado  = $cnx->query($sql);

        if( $resultado->num_rows > 0)

        {

            $sql = "update consumisiones set nombreconsumision ='$nombre' where id_consumision= " . $id . " and id_empresa= " . $id_empresa . " and id_tipoempresa = " . $id_tipoempresa;

            $resultado  = $cnx->query($sql);

            echo "Consumo $nombre actualizado !!!";

            

        }else{

            $sql = "insert into consumisiones(nombreconsumision,id_empresa,id_tipoempresa,precioagencia,preciopublico,vigenciadesde,vigenciahasta) values('$nombre','$id_empresa','$id_tipoempresa',$precioagencia,$preciopublico,'$vigenciadesde','$vigenciahasta')";

            $resultado  = $cnx->query($sql);

            echo "consumo $nombre creado !!!";

        }

    }else if($tipo == "baja")

    {
        
        $sql = "delete from consumisiones where id_consumision= $id";



        $resultado  = $cnx->query($sql);

        echo "consumo $nombre Eliminado !!!";

    }

?>