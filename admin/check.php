<?php
	@session_start();
	if(!isset($_SESSION['ADMINid']))
	{
	    header("Location: login.php");
		echo l185;
		exit;
	}
?>
