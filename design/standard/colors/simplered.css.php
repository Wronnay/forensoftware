<?php
  header('Content-type: text/css');
?>
/*
--------------------------------
COLORDESIGN
--------------------------------
Design by Christoph Miksche
Website: http://celzekr.webpage4.me
License: Attribution-NonCommercial-ShareAlike 3.0 Unported (CC BY-NC-SA 3.0)

Dieses Werk bzw. Inhalt steht unter einer Creative Commons Namensnennung-Nicht-kommerziell-
Weitergabe unter gleichen Bedingungen 3.0 Unported Lizenz.

Sie duerfen den/die Link/s zu celzekr.webpage4.me nicht entfernen!

(http://creativecommons.org/licenses/by-nc-sa/3.0/)
*/
<?php
$color = '#800000';
$bgimg1 = '../../images/system/none.png';
$bgimg2 = '../../images/system/none.png';
$bgimg3 = '../../images/system/none.png';
$bgimg4 = '../../images/system/none.png';
$bgimg5 = '../../images/system/none.png';
$bgimg6 = '../../images/system/quote.png';
$bgimg7 = '../../images/system/code.png';
?>
#body {background-image : url(<?php echo $bgimg1; ?>); background-repeat : repeat; background-position : center top; text-align : left; background-color : #ffffff; min-width:1000px; max-width:95%; color:<?php echo $color; ?>; margin : 0 auto; padding : 10px 10px 10px 10px; border-bottom-right-radius: 5px; border-bottom-left-radius: 0px; border-top-right-radius: 0px; border-top-left-radius: 0px; border:1px solid <?php echo $color; ?>; }
#head {background-image : url(<?php echo $bgimg2; ?>); background-repeat : repeat-x; background-position : center top; background-color : <?php echo $color; ?>; color:#ffffff; margin : 0 auto; padding : 5px 5px 5px 5px; font-size : 40px; border-radius: 0px; border:1px solid #cccccc; }
.untertitel { background-image : url(<?php echo $bgimg1; ?>); background-repeat : repeat; background-position : center top; font-size : 20px; color:<?php echo $color; ?>; background-color : #ffffff; border-radius: 0px; padding : 5px 5px 5px 5px; margin : 5px 5px 5px 5px; border:1px solid <?php echo $color; ?>; }
#foot {border:1px solid <?php echo $color; ?>; border-radius: 0px; background-color: #ffffff; clear:both; margin : 0 auto; padding : 5px 5px 5px 5px; font-size : 11px; text-align : center;}
.kat {clear:right; z-index:1; background-color : #ffffff; margin : 5px 5px 5px 5px; border-radius: 0px; border:1px solid <?php echo $color; ?>;}
.title {background-image : url(<?php echo $bgimg3; ?>); background-repeat : repeat-x; background-position : center bottom; border-top-left-radius: 0px; border-top-right-radius: 0px; background-color : #cccccc; padding : 5px 5px 5px 5px; margin : 5px 5px 5px 5px; border-bottom:2px solid <?php echo $color; ?>; font-size : 18px;}
.kat2 {overflow:auto; color:<?php echo $color; ?>; font-size : 12px; background-image : url(<?php echo $bgimg3; ?>); background-repeat : repeat-x; background-position : center top; background-color : #ffffff; padding : 5px 0px 5px 5px; margin : 0px 5px 5px 5px; border-bottom:1px solid <?php echo $color; ?>;}
.kat2:hover {overflow:auto; color:<?php echo $color; ?>; font-size : 12px; background-image : url(<?php echo $bgimg4; ?>); background-repeat : repeat-x; background-position : center top; background-color : #cccccc; padding : 5px 0px 5px 5px; margin : 0px 5px 5px 5px; border-bottom:1px solid <?php echo $color; ?>;}
 .fehler { text-align: left; border-left:5px solid <?php echo $color; ?>; background-color:#cccccc; padding: 5px 5px 5px 5px; margin: 5px 5px 5px 5px;}
.erfolg { text-align: left; border-left:5px solid <?php echo $color; ?>; background-color:#cccccc; padding: 5px 5px 5px 5px; margin: 5px 5px 5px 5px;}
.comment {text-align: left; border-left:2px solid #cccccc; border-bottom:2px solid <?php echo $color; ?>; background-color: #cccccc; padding: 5px 5px 5px 5px; margin: 5px 5px 5px 5px;}
#foot a:link    {color: <?php echo $color; ?>;  text-decoration:none; border-bottom:1px solid <?php echo $color; ?>;}
#foot a:visited {color: <?php echo $color; ?>;  text-decoration:none; border-bottom:1px solid <?php echo $color; ?>;}
#foot a:focus   {color: <?php echo $color; ?>;  text-decoration:none; border-bottom:1px solid <?php echo $color; ?>;}
#foot a:hover   {color: <?php echo $color; ?>;  text-decoration:none; border-bottom:1px solid #cccccc;}
#foot a:active  {color: <?php echo $color; ?>;  text-decoration:none; border-bottom:1px solid <?php echo $color; ?>;}
.spalte {float:left; width:50%;}
.post {overflow:auto; clear:right; margin:0px; padding:5px; border-radius: 0px; border:1px solid <?php echo $color; ?>; background-image : url(<?php echo $bgimg5; ?>); background-repeat : repeat-x; background-position : center top;}
.post2 {overflow:auto; clear:right; margin:8px 2px; padding:0px; border-radius: 0px; background-image : url(<?php echo $bgimg1; ?>); background-repeat : repeat; background-position : center top; background-color: #ffffff;}
.posttext {color:<?php echo $color; ?>; margin:5px; padding:5px; border-radius: 0px; background-color: #cccccc; border:1px solid <?php echo $color; ?>;}
.postsignature {opacity: 0.5; color:<?php echo $color; ?>; margin:5px; padding:5px; border-radius: 0px; background-color: #cccccc; border:1px solid <?php echo $color; ?>;}
.kat2 a:link    {color: <?php echo $color; ?>;  text-decoration:none; font-size : 15px;}
.kat2 a:visited {color: <?php echo $color; ?>;  text-decoration:none; font-size : 15px;}
.kat2 a:focus   {color: <?php echo $color; ?>;  text-decoration:none; font-size : 15px;}
.kat2 a:hover   {color: <?php echo $color; ?>;  text-decoration:underline; font-size : 15px;}
.kat2 a:active  {color: <?php echo $color; ?>;  text-decoration:none; font-size : 15px;}
.text a:link    {color: <?php echo $color; ?>;  text-decoration:none; font-size : 15px;}
.text a:visited {color: <?php echo $color; ?>;  text-decoration:none; font-size : 15px;}
.text a:focus   {color: <?php echo $color; ?>;  text-decoration:none; font-size : 15px;}
.text a:hover   {color: <?php echo $color; ?>;  text-decoration:underline; font-size : 15px;}
.text a:active  {color: <?php echo $color; ?>;  text-decoration:none; font-size : 15px;}
.newbutton a:link, .newbutton a:visited, .newbutton a:focus, .newbutton a:active {float:right; color: #ffffff; background:<?php echo $color; ?>; margin:5px; padding:5px; background-image : url(<?php echo $bgimg2; ?>); background-repeat : repeat-x; background-position : center top; border-radius: 0px;}
.pdinfos {display:none;}
.newbutton a:hover {float:right; color:#ffffff; text-decoration:underline; margin:5px; padding:5px; background-image : url(<?php echo $bgimg2; ?>); background-repeat : repeat-x; background-position : center top; border-radius: 0px;}
h2 {font-size : 15px; border-bottom:1px solid <?php echo $color; ?>; padding: 0px 5px 0px 5px; margin:0px; }
.infos {font-size : 15px; border-bottom-left-radius: 0px; border-bottom-right-radius: 0px; border-top-right-radius: 0px; opacity: 0.7; z-index:10; float:right; text-align: left; border:1px solid #00000; background-color: #ffffff; padding: 0px 0px 0px 0px; margin: 5px 5px 0px 5px;}
.lastpost {float:right; padding: 5px 5px 5px 5px; width:200px; border-left:1px solid <?php echo $color; ?>;}
.posts {float:right; padding: 5px 5px 5px 5px; width:100px; border-left:1px solid <?php echo $color; ?>;}
.topics {float:right; padding: 5px 5px 5px 5px; width:100px;}
.infos2 {font-size : 15px; float:right; text-align: left; padding: 0px 0px 0px 0px; margin: 5px 0px 0px 5px;}
.lastpost2 {float:right; padding: 5px 5px 5px 5px; width:200px; border-left:1px solid <?php echo $color; ?>;}
.posts2 {float:right; padding: 5px 5px 5px 5px; width:100px; border-left:1px solid <?php echo $color; ?>;}
.topics2 {float:right; padding: 5px 5px 5px 5px; width:100px;}
img {border:0px;}
#navi img {opacity: 0.7; border:1px solid <?php echo $color; ?>; margin : 0 auto; text-align : center;}
#navi img:hover {opacity: 1.0; border:1px solid <?php echo $color; ?>; margin : 0 auto; text-align : center;}

input[type="submit"], input[type="reset"], button {
background-image : url(<?php echo $bgimg2; ?>); background-repeat : repeat-x; background-position : center top; border-radius: 0px;
 }

input[type="submit"]:hover, input[type="reset"]:hover, button:hover {
background-image : url(<?php echo $bgimg2; ?>); background-repeat : repeat-x; background-position : center top; border-radius: 0px;
opacity: 0.7;
}
textarea {
border:1px solid <?php echo $color; ?>;
color:#ffffff;
background-color : <?php echo $color; ?>;
  padding: 2px 2px 2px 2px;
   font-size: 12px;
   margin-bottom:5px;
   background-image : url(<?php echo $bgimg2; ?>); background-repeat : repeat-x; background-position : top center; border-radius: 0px;
 }
input[type="text"], select, input[type="password"] {
border:1px solid <?php echo $color; ?>;
color:#ffffff;
background-color : <?php echo $color; ?>;
  padding: 2px 2px 2px 2px;
   font-size: 12px;
   margin-bottom:5px;
   background-image : url(<?php echo $bgimg2; ?>); background-repeat : repeat-x; background-position : center center; border-radius: 0px;
 }
.text {background-color: #ffffff; padding: 5px 5px 5px 5px; border-radius: 0px; border:1px solid <?php echo $color; ?>; margin-right:5px; overflow:auto;}
#nav {overflow:auto; border:1px solid <?php echo $color; ?>; border-radius: 0px; background-color: #ffffff; clear:both; margin : 0 auto; padding : 5px 5px 5px 5px; font-size : 14px; text-align : center; margin-top:15px;}
#nav a:link, #nav a:visited, #nav a:focus, #nav a:active    {line-height:30px; border-radius: 0px; background-color: #ffffff; color: <?php echo $color; ?>;  text-decoration:none; border:1px solid <?php echo $color; ?>; padding : 3px 3px 3px 3px; margin : 5px 5px 5px 5px;}
#nav a:hover   {line-height:30px; background-image : url(<?php echo $bgimg2; ?>); background-repeat : repeat-x; background-position : center top; border-radius: 0px; background-color: #ffffff; color: <?php echo $color; ?>;  text-decoration:none; border:1px solid <?php echo $color; ?>; padding : 3px 3px 3px 3px; margin : 5px 5px 5px 5px;}
  #colorpicker       { border:1px ridge <?php echo $color17; ?>; }
  #colorpicker td  { width:10px; height:10px; cursor:pointer; border:0px solid <?php echo $color3; ?>; }
  #colorpicker td:hover  {opacity: 0.5; width:10px; height:10px; cursor:pointer; border:0px solid white; box-shadow: 0px 0px 2px <?php echo $color2; ?>, 0px 0px 5px <?php echo $color3; ?>, 0px 0px 15px <?php echo $color2; ?>;}
#credits a:link    {color: <?php echo $color; ?>;  text-decoration:none; border-bottom:0px solid <?php echo $color; ?>;}
#credits a:visited {color: <?php echo $color; ?>;  text-decoration:none; border-bottom:0px solid <?php echo $color; ?>;}
#credits a:focus   {color: <?php echo $color; ?>;  text-decoration:none; border-bottom:0px solid <?php echo $color; ?>;}
#credits a:hover   {color: <?php echo $color; ?>;  text-decoration:none; border-bottom:1px solid <?php echo $color; ?>;}
#credits a:active  {color: <?php echo $color; ?>;  text-decoration:none; border-bottom:0px solid <?php echo $color; ?>;}
.seitenr2 {float:left; margin:2px; padding:5px; border:1px solid <?php echo $color; ?>; border-radius: 0px;}
.zitat {border:1px solid <?php echo $color; ?>; background-color: #cccccc; padding:5px; opacity: 0.8; border-radius: 0px; background-image : url(<?php echo $bgimg6; ?>); background-repeat : no-repeat; background-position : right top;}
.code {border:1px solid <?php echo $color; ?>; background-color: #cccccc; padding:5px; opacity: 0.8; border-radius: 0px; background-image : url(<?php echo $bgimg7; ?>); background-repeat : no-repeat; background-position : right top;}
