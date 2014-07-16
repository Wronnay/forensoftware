<?php
error_reporting(0);
include 'inc/h.php';
$subsite_title = w140;
include 'design/header.php';
echo '<h2>'.w140.':</h2><br>';
if($_REQUEST['id'] && $_REQUEST['act_code'])
{
    $_REQUEST['id'] = mysql_real_escape_string($_REQUEST['id']);
    $_REQUEST['act_code'] = mysql_real_escape_string($_REQUEST['act_code']);

    $ResultPointer = mysql_query("SELECT id FROM ".$PREFIX."_user WHERE id = '".$_REQUEST['id']."' AND act_code = '".$_REQUEST['act_code']."'");

    if(mysql_num_rows($ResultPointer) > 0)
    {
        @mysql_query("UPDATE ".$PREFIX."_user SET act = 'yes' WHERE id = '".$_REQUEST['id']."'");
      echo "<div class=\"erfolg\">".w139."</div>";
    }
}
include 'design/footer.php';
?>
