<?php
error_reporting(0);
include 'inc/h.php';
$subsite_title = w140;
include 'design/header.php';
echo '<h2>'.w140.':</h2><br>';
if($_REQUEST['id'] && $_REQUEST['act_code'])
{
    $_REQUEST['id'] = presql($_REQUEST['id']);
    $_REQUEST['act_code'] = presql($_REQUEST['act_code']);

    $dbpre = $dbc->prepare("SELECT id FROM ".$PREFIX."_user WHERE id = '".$_REQUEST['id']."' AND act_code = '".$_REQUEST['act_code']."'");
	$dbpre->execute();
    if($dbpre->rowCount() > 0)
    {
        $dbpre1 = $dbc->prepare("UPDATE ".$PREFIX."_user SET act = 'yes' WHERE id = '".$_REQUEST['id']."'");
        $dbpre1->execute();
      echo "<div class=\"erfolg\">".w139."</div>";
    }
}
include 'design/footer.php';
?>
