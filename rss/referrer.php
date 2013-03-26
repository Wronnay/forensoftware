<?php
error_reporting(0);
ob_start();
@session_start();
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
if ($site_referrer == 'yes') {
?>
<!DOCTYPE HTML>
<!--
Forum Software by Christoph Miksche
Website: http://forensoftware.net.tc/
License: Attribution-NonCommercial-ShareAlike 3.0 Unported (CC BY-NC-SA 3.0)

Dieses Werk bzw. Inhalt steht unter einer Creative Commons Namensnennung-Nicht-kommerziell-
Weitergabe unter gleichen Bedingungen 3.0 Unported Lizenz.

Sie duerfen den Link zu http://forensoftware.net.tc/ nicht entfernen!

(http://creativecommons.org/licenses/by-nc-sa/3.0/)
-->
<html>
<head>
<title><?php echo l83; ?> <?php echo nocss($_SERVER['QUERY_STRING']); ?></title>
<link rel="stylesheet" type="text/css" href="../design/system/referrer.css">
<META HTTP-EQUIV="refresh" CONTENT="5; URL=<?php echo nocss($_SERVER['QUERY_STRING']); ?>">
</head>
<body>
<p class="text"><?php echo l84; ?> <A HREF="<?php echo nocss($_SERVER['QUERY_STRING']); ?>"><?php echo nocss($_SERVER['QUERY_STRING']); ?></A> <?php echo l85; ?></p>
<p>
<!--Den Link nicht entfernen!-->
<a href="http://forensoftware.tk" target="_blank">ForenSoftware by WronnayScripts</a>
<!--Den Link nicht entfernen! end-->
</p>
</body>
</html>
<?php
}
else {header("Location: ". nocss($_SERVER['QUERY_STRING']));}
ob_end_flush();
?>
