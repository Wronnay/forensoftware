<?php
error_reporting(0);
ob_start();
@session_start();
include 'check.php';
include '../inc/config.php';
mysql_connect($HOST,$USER,$PW)or die(mysql_error());
mysql_select_db($DB)or die(mysql_error());
include '../inc/functions.php';
include '../inc/data.php';
ini_set("session.gc_maxlifetime", 2000);
$default_lang = 'en';
if(!isset($_SESSION['lang']))
{
    if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE']))
    {
      $_SESSION['lang'] = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2);
    }
	else
    {
	$_SESSION['lang'] = 'en';
    }
}
if(isset($_GET['lang']))
{
    $_SESSION['lang'] = $_GET['lang'];
}
if($_SESSION['lang'] == "de")
  {
include '../lang/de/1.php';
  }
  else
  {
include '../lang/en/1.php';
  }
?>
<!DOCTYPE HTML>
<html>
 <head>
 <title><?php echo l290; ?> | ForenSoftware by WronnayScripts</title>
<meta charset="ISO-8859-1"><link rel="shortcut icon" href="../images/system/favicon.ico">
<link rel="stylesheet" type="text/css" href="../design/system/admin.css">
<?php
include '../inc/showbbc.php';
?>
 </head>
 <body>
  <div id="logo"><img src="../images/system/modbereich.png" alt=""></div>
 <div class="navi"><div class="newsnav"><a href="?admin="><?php echo l198; ?></a>
 <a href="?admin=topics"><?php echo l200; ?></a><a href="?admin=posts"><?php echo l201; ?></a><a href="?admin=user"><?php echo l202; ?></a></div>
<div class="kommnav"><a href="?admin=logout"><?php echo l206; ?></a></div></div>
 <div id="seite">
 <?php
switch($_GET["admin"]){
  case "":
?>
<div class="title"><?php echo l207; ?></div>
<p><?php echo l208; ?></p>
<div class="title"><img src="../images/system/logo.png" alt="ForenSoftware:"></div>
<p><b><?php echo l209; ?>:</b> <?php echo $version; ?><br>
<a href="http://forensoftware.tk" target="_blank"><?php echo l210; ?></a>
</p>
<?php
  break;
  case "categories":
  include 'categories.php';
  break;
  case "foren":
  include 'foren.php';
  break;
  case "posts":
  include 'posts.php';
  break;
  case "topics":
  include 'topics.php';
  break;
  case "user":
  include 'user.php';
  break;
  case "mod":
  include 'mod.php';
  break;
  case "settings":
  include 'settings.php';
  break;
  case "designs":
  include 'design.php';
  break;
  case "logout":
$_SESSION = array();
session_destroy(); 
header("Location: ../index.php");
  break;
}
?>
 </div>
 <div id="footer">
<div class="text">&copy; <a href="http://scripts.wronnay.net">Scripts.Wronnay.net</a> | <a href="http://www.greensmilies.com/" target="_blank">Smilies by GreenSmilies.com</a><br><br>
 </div></div>
 </body>
</html>
<?php
ob_end_flush();
?>
