<?php
	$cnx = new MySQLi("localhost","winecity_admin","Picapiedra","winecity_plataforma");

	$id = $_POST['id'];

	if($id=="")
	{
		$sqlusuarios = "Select * from usuarios";
	}else
	{
		$sqlusuarios = "Select * from usuarios where id_usuario=" . $id;
	}
 	
	$resultadousuarios  = $cnx->query($sqlusuarios);
	
	$data = array();
	if($resultadousuarios)
	{
		$resultadousuarios->data_seek(0);
		
		while($fila = $resultadousuarios->fetch_assoc())
		{
			array_push($data,  $fila );
		}
		echo json_encode($data);
	}else
	{
		echo "consultavacia";
	}
?>