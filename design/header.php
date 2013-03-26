<!DOCTYPE HTML>
<!--
Forum Software by Christoph Miksche
Website: http://forensoftware.tk
License: Attribution-NonCommercial-ShareAlike 3.0 Unported (CC BY-NC-SA 3.0)

Dieses Werk bzw. Inhalt steht unter einer Creative Commons Namensnennung-Nicht-kommerziell-
Weitergabe unter gleichen Bedingungen 3.0 Unported Lizenz.

Sie duerfen den Link zu http://forensoftware.tk nicht entfernen!

Sollten Sie nur Teile dieses Scripts verwenden, müssen Sie einen Link zu ForenSoftware.tk setzen!

(http://creativecommons.org/licenses/by-nc-sa/3.0/)
-->
<html><head><title><?php echo $subsite_title; ?> - <?php echo $site_title; ?></title>
<meta name="description" content="<?php echo $site_description; ?>">
<meta name="keywords" content="<?php echo $site_keywords; ?>">
<meta charset="ISO-8859-1"><link rel="shortcut icon" href="<?php echo $site_favicon; ?>">
<link rel="stylesheet" type="text/css" href="design/standard/main.css.php">
<?php
include base64_decode('aW5jL3Nob3diYmMucGhw');
 ?>
</head><body><div id="body">
<header>
<div id="head"><div id="logo"><img src="<?php echo $site_logo; ?>" alt="<?php echo $site_logoalt; ?>" /> <?php echo $site_headtitle; ?></div><div class="untertitel"><?php echo $site_subtitle; ?></div></div>
<div id="nav">
<div id="navright"><a href="index.php"><?php echo l261; ?></a> <?php
if(!isset($_SESSION[base64_decode('aWQ=')]))
	{
?><a href="register.php"><?php echo l262; ?></a><?php } ?> <a href="search.php"><?php echo l263; ?></a> <a href="rssfeeds.php"><?php echo l264; ?></a></div>
<div id="navleft">
<?php
if(!isset($_SESSION[base64_decode('aWQ=')]))
	{
?>
  <form action="login.php" method="post"> 
  <input type="text" onclick="if(this.value && this.value==this.defaultValue)this.value=''" value="<?php echo l265; ?>" name="Username">
 <input type="Password" onclick="if(this.value && this.value==this.defaultValue)this.value=''" value="<?php echo l266; ?>" name="Password">
 <input type="submit" value="<?php echo l267; ?>" name="Login">
</form>
<?php
}
else {
?>
<a href="myprofile.php"><?php echo l268; ?></a> <a href="messages.php"><?php echo l269; ?></a> <a href="logout.php"><?php echo l270; ?></a>
<?php
}
?>
</div>
</div>
</header>
<div id="inhalt">
<?php
if ($nt == '1') {}
else {
?>
<div class="text">
<?php
}
?>
