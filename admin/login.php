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
?>
<!DOCTYPE HTML>
<html>
 <head>
 <title><?php echo l197; ?> | ForenSoftware by WronnayScripts</title>
<meta charset="ISO-8859-1"><link rel="shortcut icon" href="../images/system/favicon.ico">
<link rel="stylesheet" type="text/css" href="../design/system/login.css">
 </head>
 <body>
 <br>
 <div id="seite">
<div class="title"><?php echo l197; ?></div>
<?php
switch($_GET["admin"]){
  case "":
?>
	  <form action="?admin=login" method="post">
	  <table>
	  <tr><td><?php echo l211; ?></td><td><input type="text" class="li" name="Username"></td></tr>
	  <tr><td><?php echo l212; ?></td><td><input type="password" class="li" name="Password"></td></tr>
	  </table>
	  <input type="submit" class="lb" value="Login">
	  </form>
<?php
  break;
 case "login":
        $sql22 = "SELECT
                        id,
						username
                FROM
                        ".$PREFIX."_user
                WHERE
                        username = '".presql(trim($_POST['Username']))."'
				AND
                        password = '".md5(trim($_POST['Password']))."'
				AND
				        rang = 'Admin'
               ";
        $result22 = mysql_query($sql22) OR die("<pre>\n".$sql22."</pre>\n".mysql_error());
        $row22 = mysql_fetch_assoc($result22);
		if (mysql_num_rows($result22)==1){
			$_SESSION["ADMINid"] = $row22['id'];
			header("Location: index.php");
		}
        else{
             echo l213.
				  "\n".
                  l214;
        }
?>
<?php
  break;
}
?>
 </div>
 <div id="footer">
<div class="text">&copy; <a href="http://scripts.wronnay.net">Scripts.Wronnay.net</a><br><br>
 </div></div>
 </body>
</html>
<?php
ob_end_flush();
?>
