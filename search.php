<?php
error_reporting(0);
include 'inc/h.php';
$subsite_title = l73;
include 'design/header.php';
  if(isset($_GET['what'])) {
$what2 = str_replace('_', '%', presql($_GET['what']));
      $sql = "SELECT
            id,
            autor_id,
			topic_id,
			title,
			post,
            date
        FROM
            ".$PREFIX."_posts
		WHERE
		    post
		LIKE
		    '%".presql($what2)."%'
		OR
		    title
		LIKE
		    '%".presql($what2)."%'
        ORDER BY
            date DESC
		";
    $result = mysql_query($sql) OR die(mysql_error()."<pre>".$sql."</pre>");
echo '<h2>'.l74.':</h2><p></p>';
      while ($row = mysql_fetch_array($result)){
?>
<div><h2><a href="topic.php?id=<?php echo nocss($row['topic_id']); ?>#<?php echo nocss($row['id']); ?>"><?php echo nocss($row['title']); ?></a></h2>
		<p><a href="topic.php?id=<?php echo nocss($row['topic_id']); ?>#<?php echo nocss($row['id']); ?>"><?php echo nl2p(parse_bbcode($row['post'])); ?></a></p>
        </div>
<?php
	  }
  }
else {
  if(isset($_POST['submit']) AND $_POST['submit'] == l75) {
  $what = presql($_POST['suchbegriff']);
  $what = strtolower($what);
  $what = str_replace(' ', '_', $what);
  header("Location: search.php?what=".$what);
  }
echo l76;
?>
<form method="post" enctype="multipart/form-data" action="search.php">
<input type="text" name="suchbegriff" size="40">
<input type="submit" name="submit" value="<?php echo l75; ?>">
</form>
<?php
}
include 'design/footer.php';
?>
