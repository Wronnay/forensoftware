<?php 
error_reporting(0);
include 'inc/config.php';
$dbc = new PDO(''.$DBTYPE.':host='.$HOST.';dbname='.$DB.'', ''.$USER.'', ''.$PW.'');
$dbc->query("SET CHARACTER SET utf8");
include 'inc/data.php';
session_start(); 
unset($_SESSION['rechen_captcha_spam']); 
$zahl1 = rand(10,20); //Erste Zahl 10-20 
$zahl2 = rand(1,10);  //Zweite Zahl 1-10 
$operator = rand(1,2); // + oder - 
if($operator == "1"){ 
   $operatorzeichen = " + "; 
   $ergebnis = $zahl1 + $zahl2; 
}else{ 
   $operatorzeichen = " - "; 
   $ergebnis = $zahl1 - $zahl2; 
} 
function encrypt($string, $key) { 
$result = ''; 
for($i=0; $i<strlen($string); $i++) { 
   $char = substr($string, $i, 1); 
   $keychar = substr($key, ($i % strlen($key))-1, 1); 
   $char = chr(ord($char)+ord($keychar)); 
   $result.=$char; 
} 
return base64_encode($result); 
} 
$_SESSION['rechen_captcha_spam'] = encrypt($ergebnis, $site_key); //Key 
$_SESSION['rechen_captcha_spam'] = str_replace("=", "", $_SESSION['rechen_captcha_spam']); 
$rechnung = $zahl1.$operatorzeichen.$zahl2." = ?"; 
$img = imagecreatetruecolor(80,15); 
$schriftfarbe = imagecolorallocate($img,13,28,91); 
$hintergrund = imagecolorallocate($img,162,162,162); 
imagefill($img,0,0,$hintergrund); 
imagestring($img, 3, 2, 0, $rechnung, $schriftfarbe); 
header("Content-type: image/png"); 
imagepng($img); 
imagedestroy($img); 
?>
