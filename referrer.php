<?php
error_reporting(0);
ob_start();
@session_start();
include 'inc/config.php';
$dbc = new PDO(''.$DBTYPE.':host='.$HOST.';dbname='.$DB.'', ''.$USER.'', ''.$PW.'');
$dbc->query("SET CHARACTER SET utf8");
include 'inc/functions.php';
include 'inc/lang.php';
include 'inc/data.php';
if ($site_referrer == 'yes') {
?>
<!DOCTYPE HTML>
<!--
Forum Software by Christoph Miksche
Website: http://scripts.wronnay.net
License: Attribution-NonCommercial-ShareAlike 3.0 Unported (CC BY-NC-SA 3.0)

Dieses Werk bzw. Inhalt steht unter einer Creative Commons Namensnennung-Nicht-kommerziell-
Weitergabe unter gleichen Bedingungen 3.0 Unported Lizenz.

Sie duerfen den Link zu http://scripts.wronnay.net nicht entfernen!

(http://creativecommons.org/licenses/by-nc-sa/3.0/)
-->
<html>
<head>
<title><?php echo l83; ?> <?php echo nocss($_SERVER['QUERY_STRING']); ?></title>
<link rel="stylesheet" type="text/css" href="design/system/referrer.css">
<META HTTP-EQUIV="refresh" CONTENT="5; URL=<?php echo nocss($_SERVER['QUERY_STRING']); ?>">
</head>
<body>
<p class="text"><?php echo l84; ?> <A HREF="<?php echo nocss($_SERVER['QUERY_STRING']); ?>"><?php echo nocss($_SERVER['QUERY_STRING']); ?></A> <?php echo l85; ?></p>
<p>
<!--Den Link nicht entfernen!-->
<a href="http://scripts.wronnay.net" target="_blank">ForenSoftware by WronnayScripts</a>
<!--Den Link nicht entfernen! end-->
</p>
</body>
</html>
<?php
}
else {header("Location: ". nocss($_SERVER['QUERY_STRING']));}
ob_end_flush();
?>
