<div class="kat">
<div class="infos"><div class="lastpost"><?php echo l271; ?></div><div class="topics"><?php echo l272; ?></div></div>
<div class="title">
<?php echo "".nocss($row['name'])."" ?>
</div>
<?php
    $sql2 = "SELECT
            id,
            name,
			kat1_id,
			beschreibung
        FROM
            ".$PREFIX."_kat2
	    WHERE kat1_id  = '".presql($row['id'])."'
        ORDER BY
            id
		";
    $result2 = mysql_query($sql2) OR die("<pre>\n".$sql2."</pre>\n".mysql_error());
			if (mysql_num_rows($result2) == 0) {
	    echo l273;
	}
    while ($row2 = mysql_fetch_assoc($result2)) {
	$last_post2 = mysql_query("SELECT id, autor_id, title, date FROM ".$PREFIX."_topics WHERE kat2_id = '".$row2['id']."' ORDER BY date DESC LIMIT 1");
	while ($last_post = mysql_fetch_assoc($last_post2)) {
 $a = "SELECT username FROM ".$PREFIX."_user WHERE id=".$last_post['autor_id'].";";
 $a_result = mysql_query($a) OR die("<pre>\n".$a."</pre>\n".mysql_error());
    while ($au = mysql_fetch_assoc($a_result)) {
	$lastpostuser = nocss($au['username']);
	}
	$lastpostid = nocss($last_post['autor_id']);
	$lastpostdate = nocss($last_post['date']);
	$lastposttitle = nocss($last_post['title']);
	$lastposttitleid = nocss($last_post['id']);
	}
	$topics = mysql_num_rows(mysql_query("SELECT id FROM ".$PREFIX."_topics WHERE kat2_id = '".$row2['id']."'"));
?>
<div class="kat2">
<div class="infos2">
<div class="lastpost2">
<?php
if (mysql_num_rows($last_post2) == 0) {
echo l309;
	}
else {
?>
<a href="topic.php?id=<?php echo $lastposttitleid; ?>"><?php echo $lastposttitle; ?></a><br><?php echo l274; ?>: <a href="user.php?id=<?php echo $lastpostid; ?>"><?php echo $lastpostuser; ?></a> <?php echo l275; ?>: <?php echo $lastpostdate; ?>
<?php
}
?>
</div>
<div class="topics2"><?php echo "".nocss($topics)."" ?></div></div>
<a href="forum.php?id=<?php echo "".nocss($row2['id'])."" ?>"><?php echo "".nocss($row2['name'])."" ?></a><br>
<?php echo "".nocss($row2['beschreibung'])."" ?>
</div>
<?php
    }
?>
</div>
