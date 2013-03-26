<?php
	$posts2 = mysql_num_rows(mysql_query("SELECT id FROM ".$PREFIX."_posts WHERE topic_id = '".$row['id']."'"));
	$posts = $posts2 - 1;
	$last_post2 = mysql_query("SELECT autor_id, date FROM ".$PREFIX."_posts WHERE topic_id = '".$row['id']."' ORDER BY date DESC LIMIT 1");
	while ($last_post = mysql_fetch_assoc($last_post2)) {
 $a = "SELECT username FROM ".$PREFIX."_user WHERE id=".$last_post['autor_id'].";";
 $a_result = mysql_query($a) OR die("<pre>\n".$a."</pre>\n".mysql_error());
    while ($au = mysql_fetch_assoc($a_result)) {
	$lastpostuser = nocss($au['username']);
	}
	$lastpostid = nocss($last_post['autor_id']);
	$lastpostdate = nocss($last_post['date']);
	}
	$abfrage = mysql_query("SELECT username FROM ".$PREFIX."_user WHERE id = '".$row['autor_id']."'");
	$autor = mysql_fetch_assoc($abfrage);
?>
<div class="kat2">
<div class="infos2"><div class="lastpost2"><?php echo l274; ?>: <a href="user.php?id=<?php echo $lastpostid; ?>"><?php echo $lastpostuser; ?></a> <?php echo l275; ?>: <?php echo $lastpostdate; ?></div><div class="posts2"><a href="user.php?id=<?php echo "".nocss($row['autor_id'])."" ?>"><?php echo "".nocss($autor['username'])."" ?></a></div><div class="topics2"><?php echo "".nocss($posts)."" ?></div></div>
<a href="topic.php?id=<?php echo "".nocss($row['id'])."" ?>"><?php echo "".nocss($row['title'])."" ?></a>
</div>
