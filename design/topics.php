<?php
	$dbpre = $dbc->prepare("SELECT id FROM ".$PREFIX."_posts WHERE topic_id = '".$row['id']."'");
	$dbpre->execute();
	$posts2 = $dbpre->rowCount();
	$posts = $posts2 - 1;
	$dbpre2 = $dbc->prepare("SELECT autor_id, date FROM ".$PREFIX."_posts WHERE topic_id = '".$row['id']."' ORDER BY date DESC LIMIT 1");
	$dbpre2->execute();
	while ($last_post = $dbpre2->fetch(PDO::FETCH_ASSOC)) {
 $a = "SELECT username FROM ".$PREFIX."_user WHERE id=".$last_post['autor_id'].";";
 $dbpre3 = $dbc->prepare($a);
 $dbpre3->execute();
    while ($au = $dbpre3->fetch(PDO::FETCH_ASSOC)) {
	$lastpostuser = nocss($au['username']);
	}
	$lastpostid = nocss($last_post['autor_id']);
	$lastpostdate = nocss($last_post['date']);
	}
	$dbpre4 = $dbc->prepare("SELECT username FROM ".$PREFIX."_user WHERE id = '".$row['autor_id']."'");
	$dbpre4->execute();
	$autor = $dbpre4->fetch(PDO::FETCH_ASSOC);
?>
<div class="kat2">
<div class="infos2"><div class="lastpost2"><?php echo l274; ?>: <a href="user.php?id=<?php echo $lastpostid; ?>"><?php echo $lastpostuser; ?></a> <?php echo l275; ?>: <?php echo $lastpostdate; ?></div><div class="posts2"><a href="user.php?id=<?php echo "".nocss($row['autor_id'])."" ?>"><?php echo "".nocss($autor['username'])."" ?></a></div><div class="topics2"><?php echo "".nocss($posts)."" ?></div></div>
<a href="topic.php?id=<?php echo "".nocss($row['id'])."" ?>"><?php echo "".nocss($row['title'])."" ?></a>
</div>
