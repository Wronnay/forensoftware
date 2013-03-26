<?php
error_reporting(0);
include 'inc/h.php';
$subsite_title = l43;
include 'design/header.php';
include 'inc/check.php';
$_SESSION = array();
session_destroy(); 
header("Location: index.php");
include 'design/footer.php';
?>
