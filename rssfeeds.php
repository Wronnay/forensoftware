<?php
error_reporting(0);
include 'inc/h.php';
$subsite_title = l88;
include 'design/header.php';
echo '<h2>'.l88.':</h2><p>'.l304.'</p><b>'.l305.':</b><p>';
echo '<a target="_blank" href="rss/topics.php"><img title="RSS" src="images/icons/mix/rss.png" alt="" /> '.l89.'</a><br>';
echo '<a target="_blank" href="rss/posts.php"><img title="RSS" src="images/icons/mix/rss.png" alt="" /> '.l90.'</a><br>';
echo '<a target="_blank" href="rss/users.php"><img title="RSS" src="images/icons/mix/rss.png" alt="" /> '.l91.'</a></p>';
include 'design/footer.php';
?>
