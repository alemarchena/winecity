<?php
	if(isset($_SESSION['active']) && !empty($_SESSION['active']) && $_SESSION['active'] ==1){

		header("Location: sitio.php");
		exit();
	}else
	{
		header("Location: login.php");
		exit();
	}
?>