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
    $result2 = $dbc->prepare($sql2);
    $result2->execute();
	if ($result2->rowCount() < 1) {
	    echo l273;
	}
    while ($row2 = $result2->fetch(PDO::FETCH_ASSOC)) {
	$last_post2 = $dbc->prepare("SELECT id, autor_id, title, date FROM ".$PREFIX."_topics WHERE kat2_id = '".nocss($row2['id'])."' ORDER BY date DESC LIMIT 1");
	$last_post2->execute();
	while ($last_post = $last_post2->fetch(PDO::FETCH_ASSOC)) {
 $a = "SELECT username FROM ".$PREFIX."_user WHERE id=".nocss($last_post['autor_id']).";";
 $a_result = $dbc->prepare($a);
 $a_result->execute();
    while ($au = $a_result->fetch(PDO::FETCH_ASSOC)) {
	$lastpostuser = nocss($au['username']);
	}
	$lastpostid = nocss($last_post['autor_id']);
	$lastpostdate = nocss($last_post['date']);
	$lastposttitle = nocss($last_post['title']);
	$lastposttitleid = nocss($last_post['id']);
	}
	$dbpreka = $dbc->prepare("SELECT id FROM ".$PREFIX."_topics WHERE kat2_id = '".nocss($row2['id'])."'");
	$dbpreka->execute();
	$topics = $dbpreka->rowCount();
?>
<div class="kat2">
<div class="infos2">
<div class="lastpost2">
<?php
if ($last_post2->rowCount() < 1) {
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
