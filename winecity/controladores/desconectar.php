<?php
if(isset($_SESSION['active']) && !empty($_SESSION['active']) && $_SESSION['active'] ==1)
{
	session_destroy();
	header("Location: index.php");
	exit();
}else
{
	header("Location: index.php");
	exit();
}
?>