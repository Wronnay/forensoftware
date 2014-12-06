<?php
error_reporting(0);
ob_start();
@session_start();
include 'check.php';
include '../inc/config.php';
$dbc = new PDO(''.$DBTYPE.':host='.$HOST.';dbname='.$DB.'', ''.$USER.'', ''.$PW.'');
$dbc->query("SET CHARACTER SET utf8");
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
 <title><?php echo l197; ?> | ForenSoftware by WronnayScripts</title>
<meta charset="UTF-8"><link rel="shortcut icon" href="../images/system/favicon.ico">
<link rel="stylesheet" type="text/css" href="../design/system/admin.css">
<?php
include '../inc/showbbc.php';
?>
 </head>
 <body>
  <div id="logo"><img src="../images/system/adminbereich.png" alt=""></div>
 <div class="navi"><div class="newsnav"><a href="?admin="><?php echo l198; ?></a><a href="?admin=categories"><?php echo l199; ?></a>
 <a href="?admin=topics"><?php echo l200; ?></a><a href="?admin=posts"><?php echo l201; ?></a><a href="?admin=user"><?php echo l202; ?></a>
 <a href="?admin=mod"><?php echo l203; ?></a><a href="?admin=settings"><?php echo l204; ?></a><a href="?admin=designs"><?php echo l205; ?></a></div>
<div class="kommnav"><a href="?admin=logout"><?php echo l206; ?></a></div></div>
 <div id="seite">
 <?php
switch($_GET["admin"]){
  case "":
?>
<article style="float:right;">
<h3><?php echo w85; ?></h3>
<?php
    $sql = "SELECT
                COUNT(*)
            FROM
                ".$PREFIX."_online
            WHERE
                DATE_SUB(NOW(), INTERVAL 2 MINUTE) < date
           ";
    $dbpre = $dbc->prepare($sql);
    $dbpre->execute();
    $user_now = $dbpre->fetchColumn();
    $sql = "SELECT
                number
            FROM
               ".$PREFIX."_counter
            WHERE
                date = CURDATE()
           ";
    $dbpre = $dbc->prepare($sql);
    $dbpre->execute();
    $row = $dbpre->fetch(PDO::FETCH_ASSOC);
    $user_heute = $row['number']; 
    $sql = "SELECT
                number
            FROM
                ".$PREFIX."_counter
            WHERE
                date = DATE_SUB(CURDATE(), INTERVAL 1 DAY)  
           ";
    $dbpre = $dbc->prepare($sql);
    $dbpre->execute();
    $row = $dbpre->fetch(PDO::FETCH_ASSOC);
    $user_gestern = $row['number']; 
    $sql = "SELECT
                SUM(number)
            FROM
                ".$PREFIX."_counter
           ";
    $dbpre = $dbc->prepare($sql);
    $dbpre->execute();
    $user_gesamt = $dbpre->fetchColumn(); 
    echo " <table cellpadding=\"2\" style=\"margin-bottom:10px;\">\n".
         "  <tr><td>".w86."</td><td style=\"text-align:right;\">".$user_now."</td></tr>\n".
         "  <tr><td>".w87."</td><td style=\"text-align:right;\">".$user_heute."</td></tr>\n".
         "  <tr><td>".w88."</td><td style=\"text-align:right;\">".$user_gestern."</td></tr>\n".
         "  <tr><td>".w89."</td><td style=\"text-align:right;\">".$user_gesamt."</td></tr>\n".
         " </table>\n"; 
?> 

</article>
<article style="float:left;">
<div class="title"><?php echo l207; ?></div>
<p><?php echo l208; ?></p>
<div class="title"><img src="../images/system/logo.png" alt="ForenSoftware:"></div>
<p><b><?php echo l209; ?>:</b> <?php echo nocss($version); ?><br>
<script src="http://scripts.wronnay.net/fs/update.php?lang=<?php echo nocss($_SESSION['lang']); ?>&version=<?php echo nocss($version); ?>" type="text/javascript"></script>
</p>
</article>
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
