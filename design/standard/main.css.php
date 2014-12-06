<?php
error_reporting(0);
ob_start();
session_start();
header(base64_decode('Q29udGVudC10eXBlOiB0ZXh0L2Nzcw=='));
include '../../inc/config.php';
$dbc = new PDO(''.$DBTYPE.':host='.$HOST.';dbname='.$DB.'', ''.$USER.'', ''.$PW.'');
$dbc->query("SET CHARACTER SET utf8");
include '../../inc/functions.php';
include '../../inc/data.php';
$design = $_SESSION["design"];
?>
/*
--------------------------------
MAINDESIGN
--------------------------------
Design by Christoph Miksche
Website: http://celzekr.webpage4.me
License: Attribution-NonCommercial-ShareAlike 3.0 Unported (CC BY-NC-SA 3.0)

Dieses Werk bzw. Inhalt steht unter einer Creative Commons Namensnennung-Nicht-kommerziell-
Weitergabe unter gleichen Bedingungen 3.0 Unported Lizenz.

Sie duerfen den/die Link/s zu celzekr.webpage4.me nicht entfernen!

(http://creativecommons.org/licenses/by-nc-sa/3.0/)
*/
html {font-size : 15px; font-family : Arial, Verdana, Helvetica, sans-serif; text-align : center; background-color : #ffffff; margin : 0 auto; }
body {margin-top:15px;}
footer {clear:both; margin : 0 auto; font-size : 11px; text-align : center;}
p {margin:0px; padding:2px;}
input[type="text"], input[type="password"], textarea, select {
outline : none;
}
input[type="submit"], input[type="reset"], button {
 cursor: pointer;
 color:#ffffff;
 background-color: #000000;
   padding: 2px 2px 2px 2px;
   font-size: 12px;
   border:1px solid #ffffff;
   margin-top:5px;
   margin-left:5px;
}
input[type="submit"]:hover, input[type="reset"]:hover, button:hover {
 cursor: pointer;
 color:#ffffff;
 background-color: #000000;
   padding: 2px 2px 2px 2px;
   font-size: 12px;
   border:1px solid #ffffff;
   margin-top:5px;
   margin-left:5px;
}
.hallo {display:none;}
.avatar {text-align : center;}
.postmain {width:75%; float:left; color:#ffffff;}
.postinfos {width:150px; float:left; background-color: #ffffff; margin:5px; padding:5px; border-radius: 10px;}
.postfunc {width:16px; float:right; background-color: #ffffff; margin:5px; padding:5px; border-radius: 10px;}
.lio {
color:#000000;
background-color: #ffffff;
   font-size: 12px;
 }
.lio:hover {
color:#ffffff;
background-color: #000000;
   font-size: 12px;
 }
 .li1 {
border:1px solid #000000;
color:#000000;
background-color : #ffffff;
  padding: 2px 2px 2px 2px;
   font-size: 12px;
   margin-bottom:5px;
   margin-right:5px;
 }
.pav {float:right; margin:5px;}
.ptxt{float:left;}
.seitenr {float:left; margin:2px; padding:5px;}
#inhalt {width:100%; float:left; color:#000000; margin : 15px 0px 15px 0px; padding : 5px 5px 5px 5px; font-size : 14px; border-radius: 10px; }
  #beitrag
  { width:570px;
    overflow:visible;
    padding:5px;
    position:relative;
  }
  #beitrag button
  { 
  }
  #beitrag select        { margin:0px 3px; }
  #beitrag textarea      { display:block; margin:5px auto; width:100%; }
  #beitrag div.center    { text-align:center; }
  #beitrag img           { border:none; cursor:pointer;}
  #beitrag #buttonleiste { white-space:nowrap; }
  #beitrag #smilies      {float:right; width:250px; position:relative; right:5px; }
#navleft {float:left; line-height:30px; }
#navright {float:right;}
#cpcontainer {height:60px; padding:5px; margin:5px;}
#credits {opacity: 0.8; margin:5px; font-size:10px;}
<?php
if (isset($design) and !empty($design)) {
include $design;
}  
else {
include $site_design;
}
ob_end_flush();
?>
