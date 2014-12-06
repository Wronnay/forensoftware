<?php
error_reporting(0);
include 'inc/h.php';
$subsite_title = l72;
include 'design/header.php';
echo '<h2>'.l72.':</h2><br>';
$rules = parse_bbcode($site_rules);
echo nl2p($rules);
include 'design/footer.php';
?>
