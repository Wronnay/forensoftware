<?php
if ($nt == '1') {}
else {
?>
</div>
<?php
}
?>
</div>
<div id="foot">
<?php
if(isset($_SESSION[base64_decode('aWQ=')]))
	{
?>
<a href="mod/index.php" target="_blank"><?php echo l258; ?></a> | <a href="admin/index.php" target="_blank"><?php echo l259; ?></a> | 
<?php
}
?>
<a href="<?php echo $site_imprint; ?>" target="_blank"><?php echo l260; ?></a>
</div>
</div>
<footer>
<div id="credits"><!--Den Link nicht entfernen!-->
Language: <a href="index.php?lang=de">Deutsch</a> - 
<a href="index.php?lang=en">English</a><br>
ForenSoftware &copy; <a href="http://forensoftware.tk" target="_blank">WronnayScripts</a>
 - <a href="credits.php">Credits</a> - <a href="license.php">License</a>
<?php
// if ($smilies == '1') { echo ' | <a href="http://www.greensmilies.com/" target="_blank">Smilies by GreenSmilies.com</a>'; }
?>
<!--Den Link nicht entfernen! end-->
</div>
</footer>
</body></html>
<?php
ob_end_flush();
?>
