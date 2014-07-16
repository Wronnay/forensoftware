<?php
error_reporting(0);
include 'inc/h.php';
$subsite_title = l44;
include 'design/header.php';
include 'inc/check.php';
?>
<div style="float:left; padding:10px; border-radius: 15px; box-shadow:inset 0px 0px 15px #cccccc;">
<b><?php echo l44; ?>:</b><br>
<a href="messages.php?action=box"> <?php echo l45; ?></a><br>
<a href="messages.php?action=outbox"> <?php echo l46; ?></a><br>
<a href="messages.php?action=write"> <?php echo l47; ?></a><br>
</div>
<div style="float:left; padding:15px;">
<?php
switch($_GET["action"]){
  case "":
?>
<?php
echo '<h2>'.l48.':</h2><p>';
    $sql = "SELECT
	                ID,
	                userFrom,
					userTo,
					subject,
					body,
					readen,
					inbox_delete,
					DATE_FORMAT(`sendtime`, '%d.%m.%Y - %H:%i:%s') as `send`
            FROM
                    ".$PREFIX."_nachrichten
			WHERE 
			        inbox_delete = '0'
			AND
			        userTo = '".$_SESSION['id']."'
            ORDER BY
                    sendtime DESC
			LIMIT
			        5
           ";
    $result = mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
			if (mysql_num_rows($result) == 0) {
	    echo l49;
	}
    while ($row = mysql_fetch_assoc($result)) {
?>
<a href="messages.php?action=box&id=<?php echo nocss($row['ID']); ?>&option=delete"><img title="<?php echo l62; ?>" src="images/icons/standard/close2r.png" alt="" /></a>
 <a href="messages.php?action=box&id=<?php echo nocss($row['ID']); ?>"><?php echo nocss($row['subject']); ?></a>
 (<?php echo l50; ?>: <?php echo nocss($row['send']); ?>) <br>
<?php
	}
echo '</p>';
?>
<?php
break;
case "write":
  if(isset($_POST['submit']) AND $_POST['submit'] == l52) {
        if(empty($_REQUEST['userTo']) || empty($_REQUEST['subject']) || empty($_REQUEST['body']))
      {
        echo l38;
      }
	    else {
			$auesql = "
	  SELECT
            email
        FROM
            ".$PREFIX."_user
	    WHERE id  = '".presql($_REQUEST['userTo'])."'
	  ";
	   $aue2 = mysql_query($auesql) OR die("<pre>\n".$auesql."</pre>\n".mysql_error());
	   while ($auerow = mysql_fetch_assoc($aue2)) {
		  $autoremail = $auerow['email'];
   }
	  $bodynachricht = presql($_REQUEST['body']);
	  $sql = "INSERT INTO ".$PREFIX."_nachrichten (userFrom, userTo, subject, body, sendtime) VALUES ('".$_SESSION['id']."','".presql($_REQUEST['userTo'])."','".presql($_REQUEST['subject'])."','".$bodynachricht."', now())";
	  $result = mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
	  $ID = mysql_insert_id();
$from = "From: ".$site_email."\n";
$from .= "Content-Type: text/html; charset=ISO-8859-15\n";
if($site_user_act == '1') { mail(presql(trim($autoremail)), l314, "".l315." "."<br>"."<a href=\"".$site_url."/messages.php?action=box&id=".$ID."\">".$site_url."/messages.php?action=box&id=".$ID."</a>", $from); }
	  echo l51;
		}
  }
  echo '<form action="messages.php?action=write" method="post" enctype="multipart/form-data">';
?>
	  <table>
	  <tr><td><b><?php echo l53; ?></b>: </td><td>
	  <input type="text" name="userTo" value="<?php if (isset($_GET["userid"])) { echo nocss($_GET["userid"]); } else { echo 'UserID'; } ?>" size="25" <?php if (isset($_GET["userid"])) { echo 'readonly'; } else { echo "onclick=\"if(this.value && this.value==this.defaultValue)this.value=''\""; } ?>></td></tr>
	  <tr><td><b><?php echo l54; ?></b>: </td><td><input type="text" name="subject" value="<?php if (isset($_GET["subject"])) { echo nocss($_GET["subject"]); } else { echo ''; } ?>" size="50"></td></tr>
      <tr><td><b><?php echo l55; ?></b>: </td><td>
<?php
include 'inc/sbbcb.php';
?>
      <textarea id="nachricht" name="body" cols="55" rows="15"></textarea></td></tr>
	  </table>
      <input name="submit" type="submit" value="<?php echo l52; ?>">
      </form>
<?php
break;
case "box":
if (isset($_GET["id"])) {
if ($_GET["option"] == 'delete') {
mysql_query("UPDATE ".$PREFIX."_nachrichten SET inbox_delete = '1' WHERE ID = '".presql($_GET["id"])."'"); 
echo l56;
}
else {
mysql_query("UPDATE ".$PREFIX."_nachrichten SET readen = '1' WHERE ID = '".presql($_GET["id"])."'"); 
    $sql = "SELECT
	                ID,
	                userFrom,
					userTo,
					subject,
					body,
					readen,
					inbox_delete,
					DATE_FORMAT(`sendtime`, '%d.%m.%Y - %H:%i:%s') as `send`
            FROM
                    ".$PREFIX."_nachrichten
			WHERE 
			        inbox_delete = '0'
			AND
			        userTo = '".$_SESSION['id']."'
			AND
			        ID = '".presql($_GET["id"])."'
			LIMIT
			        1
           ";
    $result = mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
			if (mysql_num_rows($result) == 0) {
	    echo l57;
	}
    while ($row = mysql_fetch_assoc($result)) {
		$a = "SELECT username FROM ".$PREFIX."_user WHERE id=".$row['userFrom'].";";
 $a_result = mysql_query($a) OR die("<pre>\n".$a."</pre>\n".mysql_error());
    while ($au = mysql_fetch_assoc($a_result)) {
	$fromuser = nocss($au['username']);
	}
	echo '<h2>'.nocss($row['subject']).':</h2>';
?>
<p>
<b><?php echo l58; ?></b>: <a href="user.php?id=<?php echo nocss($row['userFrom']); ?>"><?php echo $fromuser; ?></a><br>
<b><?php echo l59; ?></b>: <?php echo nocss($row['send']); ?><br>
</p><p>
<?php echo nl2p(parse_bbcode($row['body'])); ?>
</p>
<h2><?php echo l60; ?>:</h2>
<p>
<a href="messages.php?action=write&userid=<?php echo nocss($row['userFrom']); ?>&subject=RE: <?php echo nocss($row['subject']); ?>">
<img src="images/icons/standard/brief3.png" alt="" /> <?php echo l61; ?></a><br>
<a href="messages.php?action=box&id=<?php echo nocss($row['ID']); ?>&option=delete"><img title="Löschen" src="images/icons/standard/close2r.png" alt="" /> <?php echo l62; ?></a>
</p>
<?php
echo '';
	}

 }} else {
echo l63;
    $sql = "SELECT
	                ID,
	                userFrom,
					userTo,
					subject,
					body,
					readen,
					inbox_delete,
					DATE_FORMAT(`sendtime`, '%d.%m.%Y - %H:%i:%s') as `send`
            FROM
                    ".$PREFIX."_nachrichten
			WHERE 
			        inbox_delete = '0'
			AND
			        userTo = '".$_SESSION['id']."'
            ORDER BY
                    sendtime DESC
           ";
    $result = mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
			if (mysql_num_rows($result) == 0) {
	    echo l64;
	}
    while ($row = mysql_fetch_assoc($result)) {
?>
<a href="messages.php?action=box&id=<?php echo nocss($row['ID']); ?>&option=delete"><img title="<?php echo l62; ?>" src="images/icons/standard/close2r.png" alt="" /></a>
 <a href="messages.php?action=box&id=<?php echo nocss($row['ID']); ?>"><?php echo nocss($row['subject']); ?></a>
 (<?php echo l59; ?>: <?php echo nocss($row['send']); ?>) <br>
<?php
	}
echo '</p>';
}
break;
case "outbox":
if (isset($_GET["id"])) {
if ($_GET["option"] == 'delete') {
mysql_query("UPDATE ".$PREFIX."_nachrichten SET outbox_delete = '1' WHERE ID = '".mysql_real_escape_string($_GET["id"])."'"); 
echo l65;
}
else {
    $sql = "SELECT
	                ID,
	                userFrom,
					userTo,
					subject,
					body,
					readen,
					outbox_delete,
					DATE_FORMAT(`sendtime`, '%d.%m.%Y - %H:%i:%s') as `send`
            FROM
                    ".$PREFIX."_nachrichten
			WHERE 
			        outbox_delete = '0'
			AND
			        userFrom = '".$_SESSION['id']."'
			AND
			        ID = '".presql($_GET["id"])."'
			LIMIT
			        1
           ";
    $result = mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
			if (mysql_num_rows($result) == 0) {
	    echo l66;
	}
    while ($row = mysql_fetch_assoc($result)) {
if ($row['readen'] == '1') { $gelesen = l67; } else { $gelesen = l68; }
	echo '<h2>'.nocss($row['subject']).':</h2>';
?>
<p>
<b><?php echo l59; ?></b>: <?php echo nocss($row['send']); ?><br>
<b><?php echo l69; ?></b>: <?php echo $gelesen ?>
</p><p>
<?php echo nl2p(parse_bbcode($row['body'])); ?>
</p>
<h2><?php echo l60; ?>:</h2>
<p>
<a href="messages.php?action=outbox&id=<?php echo $row['ID']; ?>&option=delete"><img title="<?php echo l62; ?>" src="images/icons/standard/close2r.png" alt="" /> <?php echo l62; ?></a>
</p>
<?php
echo '';
	}

 }} else {
echo l70;
    $sql = "SELECT
	                ID,
	                userFrom,
					userTo,
					subject,
					body,
					readen,
					outbox_delete,
					DATE_FORMAT(`sendtime`, '%d.%m.%Y - %H:%i:%s') as `send`
            FROM
                    ".$PREFIX."_nachrichten
			WHERE 
			        outbox_delete = '0'
			AND
			        userFrom = '".$_SESSION['id']."'
            ORDER BY
                    sendtime DESC
           ";
    $result = mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
			if (mysql_num_rows($result) == 0) {
	    echo l71;
	}
    while ($row = mysql_fetch_assoc($result)) {
?>
<a href="messages.php?action=outbox&id=<?php echo nocss($row['ID']); ?>&option=delete"><img title="<?php echo l62; ?>" src="images/icons/standard/close2r.png" alt="" /></a> 
<a href="messages.php?action=outbox&id=<?php echo nocss($row['ID']); ?>"><?php echo nocss($row['subject']); ?></a> 
(<?php echo l59; ?>: <?php echo nocss($row['send']); ?>)<br>
<?php
	}
echo '</p>';
}
break;
}
?>
</div>
<?php
include 'design/footer.php';
?>
