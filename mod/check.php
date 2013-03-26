<?php
	@session_start();

	if(!isset($_SESSION['MODid']))
	{
	    header("Location: login.php");
		echo l185;
		exit;
	}
?>
