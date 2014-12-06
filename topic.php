<?php
error_reporting(0);
include 'inc/h.php';
if ($_GET['id'] == '') {
$subsite_title = l150;
include 'design/header.php';
if ($_GET['action'] == 'edit'){

	  $kategoriesql = "
	  SELECT
            id,
            title
        FROM
            ".$PREFIX."_topics
	    WHERE id  = '".presql($_GET['topicid'])."'
	  ";
	   $dbpre1 = $dbc->prepare($kategoriesql);
	   $dbpre1->execute();
    while ($kategorierow = $dbpre1->fetch(PDO::FETCH_ASSOC)) {
	$kategorie = $kategorierow['title'];
	$kategorieid = $kategorierow['id'];
	}

if (isset($_GET['postid'])) {
	  $quotesql = "
	  SELECT
            id,
            autor_id,
			topic_id,
			title,
			post,
            date
        FROM
            ".$PREFIX."_posts
	    WHERE id = '".presql($_GET['postid'])."'
	  ";
	   $dbpre2 = $dbc->prepare($quotesql);
	   $dbpre2->execute();
    if ($dbpre2->rowCount() < 1) {
	    echo l158;
	}
    while ($orow = $dbpre2->fetch(PDO::FETCH_ASSOC)) {
	$quotepost = nocss($orow['post']);
        $opostid = nocss($orow['id']);
        $oposttitle = nocss($orow['title']);
	}

}


  if(isset($_POST['submit']) AND $_POST['submit'] == Edit) {
    	if(isset($_SESSION['id']))
	{
        if(empty($_REQUEST['body']))
      {
        echo l152;
      }
	    else {	
	  $bodynachricht = presql($_REQUEST['body']);
	  $sql2d = "
UPDATE 
       ".$PREFIX."_posts
SET
       post = '".$bodynachricht."'
WHERE 
       id = '".presql($_GET['postid'])."'
AND
       autor_id = '".$_SESSION['id']."'
";
	  $dbpre3 = $dbc->prepare($sql2d);
	  $dbpre3->execute();
	  echo l153;
          header("Location: topic.php?id=".nocss($_GET['topicid'])."");

		}
				}
		else {echo l154;}
  }


  echo '<form action="topic.php?action=edit&postid='.nocss($_GET['postid']).'&topicid='.nocss($_GET['topicid']).'" method="post" enctype="multipart/form-data">';
?>
	  <table>
	  <tr><td><b><?php echo l155; ?></b>: </td><td><?php echo nocss($kategorie); ?> </td></tr>
	  <tr><td><b><?php echo l156; ?></b>: </td><td><?php echo nocss($oposttitle); ?></td></tr>
      <tr><td><b><?php echo l157; ?></b>: </td><td>
<?php
include 'inc/sbbcb.php';
?>
      <textarea id="nachricht" name="body" cols="55" rows="15">
<?php 
echo $quotepost;
?>
</textarea></td></tr>
	  </table>
      <input name="submit" type="submit" value="Edit">
      </form>
<?php

}

if ($_GET['action'] == 'newpost'){
	  $kategoriesql = "
	  SELECT
            id,
            title,
            autor_id
        FROM
            ".$PREFIX."_topics
	    WHERE id  = '".presql($_GET['topicid'])."'
	  ";
	   $dbpre5 = $dbc->prepare($kategoriesql);
	   $dbpre5->execute();
	if ($dbpre5->rowCount() < 1) {
	    echo l151;
	}
    while ($kategorierow = $dbpre5->fetch(PDO::FETCH_ASSOC)) {
	$kategorie = $kategorierow['title'];
	$kategorieid = $kategorierow['id'];
		  $auesql = "
	  SELECT
            email
        FROM
            ".$PREFIX."_user
	    WHERE id  = '".presql($kategorierow['autor_id'])."'
	  ";
	   $dbpre6 = $dbc->prepare($auesql);
	   $dbpre6->execute();
	   while ($auerow = $dbpre6->fetch(PDO::FETCH_ASSOC)) {
		  $autoremail = $auerow['email'];
   }
	}
  if(isset($_POST['submit']) AND $_POST['submit'] == l150) {
    	if(isset($_SESSION['id']))
	{
        if(empty($_REQUEST['body']))
      {
        echo l152;
      }
	    else {	
	  $bodynachricht = presql($_REQUEST['body']);
	  $sql2 = "INSERT INTO ".$PREFIX."_posts (autor_id, topic_id, title, date, post) VALUES ('".$_SESSION['id']."','".presql($_GET['topicid'])."','".presql($_REQUEST['titel'])."', now(),'".$bodynachricht."')";
	  $dbpre7 = $dbc->prepare($sql2);
	  $dbpre7->execute();
	  $ID = $dbc->lastInsertId();
$from = "From: ".$site_email."\n";
$from .= "Content-Type: text/html; charset=UTF-8\n";
if($site_user_act == '1') { mail(presql(trim($autoremail)), l312, "".l313." "."<br>"."<a href=\"".$site_url."/topic.php?id=".presql($_GET['topicid'])."#".$ID."\">".$site_url."/topic.php?id=".presql($_GET['topicid'])."#".$ID."</a>", $from); }
	  echo l153;
	  header("Location: topic.php?id=".nocss($_GET['topicid'])."");
		}
				}
		else {echo l154;}
  }
  echo '<form action="topic.php?action=newpost&topicid='.nocss($_GET['topicid']).'" method="post" enctype="multipart/form-data">';
?>
	  <table>
	  <tr><td><b><?php echo l155; ?></b>: </td><td><?php echo nocss($kategorie); ?> </td></tr>
	  <tr><td><b><?php echo l156; ?></b>: </td><td><input type="text" name="titel" value="" size="50"></td></tr>
      <tr><td><b><?php echo l157; ?></b>: </td><td>
<?php
include 'inc/sbbcb.php';
?>
      <textarea id="nachricht" name="body" cols="55" rows="15">
<?php
if (isset($_GET['quoteid'])) {
	  $quotesql = "
	  SELECT
            id,
            autor_id,
			topic_id,
			title,
			post,
            date
        FROM
            ".$PREFIX."_posts
	    WHERE id = '".presql($_GET['quoteid'])."'
	  ";
	   $dbpre9 = $dbc->prepare($quotesql);
	   $dbpre9->execute();
    if ($dbpre9->rowCount() < 1) {
	    echo l158;
	}
    while ($orow = $dbpre9->fetch(PDO::FETCH_ASSOC)) {
	$quotepost = nocss($orow['post']);
	$quote = '[quote]'.$quotepost.'[/quote]';
	}
echo $quote;
}
?></textarea></td></tr>
	  </table>
      <input name="submit" type="submit" value="<?php echo l150; ?>">
      </form>
<?php
}
}


else {
$dbpre10 = $dbc->prepare('SELECT COUNT(*) as `total` FROM `'.$PREFIX.'_posts` WHERE topic_id = '.presql($_GET['id']).'');
$dbpre10->execute();
$row_total = $dbpre10->fetch(PDO::FETCH_ASSOC);
$iCounter = 0; // Werbung
$gesamte_anzahl = $row_total['total'];
$ergebnisse_pro_seite = 15;
$gesamt_seiten = ceil($gesamte_anzahl/$ergebnisse_pro_seite);
if (empty($_GET['seite_nr'])) {
    $seite = 1;
} else {
    $seite = $_GET['seite_nr'];
    if ($seite > $gesamt_seiten) {
        $seite = 1;
    }
}
$limit = ($seite*$ergebnisse_pro_seite)-$ergebnisse_pro_seite;
    $sql = "SELECT
            id,
            autor_id,
			topic_id,
			title,
			post,
            date
        FROM
            ".$PREFIX."_posts
		WHERE topic_id  = '".presql($_GET['id'])."'
        ORDER BY
            date
		LIMIT
		    ".$limit.", ".$ergebnisse_pro_seite."
		";
    $sqltit = "SELECT
            id,
            autor_id,
			topic_id,
			title,
			post,
            date
        FROM
            ".$PREFIX."_posts
		WHERE topic_id  = '".presql($_GET['id'])."'
        ORDER BY
            date
		LIMIT
		    1
		";
    $dbpre11 = $dbc->prepare($sqltit);
    $dbpre11->execute();
while ($rowtit = $dbpre11->fetch(PDO::FETCH_ASSOC)) {
$subsite_title = nocss($rowtit['title']);
}
include 'design/header.php';
if(isset($_SESSION['id']))
	{
echo '<div class="newbutton"><a href="topic.php?action=newpost&topicid='.nocss($_GET['id']).'">'.l159.'</a></div>';
?>
<?php
}
if (empty($_GET['seite_nr'])) {
    $quseite = '';
} else {
    $quseite = '&seite_nr='.nocss($_GET['seite_nr']).'';
    if ($quseite > $gesamt_seiten) {
        $quseite = '';
    }
}
echo '<a target="_blank" href="rss/topic.php?id='.nocss($_GET['id']).''.$quseite.'"><img title="RSS" src="images/icons/mix/rss.png" alt="" /> '.l160.'</a>';
    $dbpre12 = $dbc->prepare($sql);
    $dbpre12->execute();
	if ($dbpre12->rowCount() < 1) {
	    echo l161;
	}
    while ($row = $dbpre12->fetch(PDO::FETCH_ASSOC)) {
/*Werbung*/
if($iCounter == 5) {
include 'ads.php';
$iCounter = 0;
}
/*Werbung Ende*/

$iCounter ++; // Werbung
		$a = "SELECT username, avatar, email, signature, website, facebook, twitter, googleplus, rang FROM ".$PREFIX."_user WHERE id=".$row['autor_id']."";
 $dbpre13 = $dbc->prepare($a);
 $dbpre13->execute();
    while ($au = $dbpre13->fetch(PDO::FETCH_ASSOC)) {
	$user = nocss($au['username']);
	$user_email = nocss($au['email']);
	$signature = nocss($au['signature']);
	$website = nocss($au['website']);
	$facebook = nocss($au['facebook']);
	$twitter = nocss($au['twitter']);
	$googlep = nocss($au['googleplus']);
    if ($au['rang'] == '') {
	$rang = 'User';
	}
	else {
	$rang = nocss($au['rang']);
	}
	if ($au['avatar'] == '') {
	$avatar = $site_url.'/images/icons/standard/avatar.png';
	}
	else {
	$avatar = $site_url.'/images/avatare/'.nocss($au['avatar']);
	}
	}
?>
<div class="post2" id="<?php echo nocss($row['id']); ?>">
<div class="post">
<div class="postinfos">
<b><?php echo l162; ?>:</b> <a href="user.php?id=<?php echo nocss($row['autor_id']); ?>"><?php echo $user; ?></a><br>
<b><?php echo l163; ?>:</b> <?php echo $rang; ?><br>
<?php 
$grav_url = "http://www.gravatar.com/avatar/".md5(strtolower(trim($user_email)))."?d=".urlencode($avatar)."&s=150";
echo "<img class=\"avatar\" src='".$grav_url."' alt='' />";
?>
<br>
<?php
if(isset($_SESSION['id']))
	{
?>
<a href="messages.php?action=write&userid=<?php echo $row['autor_id']; ?>">
<img title="<?php echo l164; ?>" src="images/icons/standard/15brief.png" alt="" /></a> 
<?php
}
?>
<?php
if ($website == '') {}
else {
?>
<a target="_blank" href="referrer.php?<?php echo $website; ?>">
<img title="Homepage" src="images/icons/standard/15homepage.png" alt="" /></a> 
<?php
}
?>
<?php
if ($facebook == '') {}
else {
?>
<a target="_blank" href="referrer.php?<?php echo $facebook; ?>">
<img title="Facebook" src="images/icons/mix/facebook.png" alt="" /></a> 
<?php
}
?>
<?php
if ($twitter == '') {}
else {
?>
<a target="_blank" href="referrer.php?<?php echo $twitter; ?>">
<img title="Twitter" src="images/icons/mix/twitter.png" alt="" /></a> 
<?php
}
?>
<?php
if ($googlep == '') {}
else {
?>
<a target="_blank" href="referrer.php?<?php echo $googlep; ?>">
<img title="Google+" src="images/icons/mix/google.png" alt="" /></a> 
<?php
}
?>
<a target="_blank" href="rss/userposts.php?id=<?php echo nocss($row['autor_id']); ?>">
<img title="RSS" src="images/icons/mix/rss.png" alt="" /></a> 
</div>
<div class="postmain">
<div class="pdinfos" style="text-shadow: 0 0 0.2em #000000, 0 0 0.5em #000000;">
<?php
if($row['title'] == '') {}
else {
?>
<h2><?php echo nocss($row['title']); ?></h2>
<?php
}
?>
<?php echo l310; ?>: <?php echo nocss($row['date']); ?>
</div>
<div class="posttext">
<?php
echo nl2p(parse_bbcode($row['post']));
?>
</div>
<?php
if ($signature == '') {}
else {
?>
<div class="postsignature">
<?php
echo nl2p(parse_bbcode($signature));
?>
</div>
<?php
}
?>
</div>
<div class="postfunc">
<a href="topic.php?id=<?php echo nocss($row['topic_id']); echo $quseite; ?>#<?php echo nocss($row['id']); ?>">
<img title="<?php echo l165; ?>" src="images/icons/mix/link.png" alt="" /></a><br>
<?php
if(isset($_SESSION['id']))
	{
?>
<a href="topic.php?action=newpost&topicid=<?php echo nocss($row['topic_id']); ?>&quoteid=<?php echo nocss($row['id']); ?>">
<img title="<?php echo l166; ?>" src="images/icons/mix/quote.png" alt="" /></a>
<?php
if($_SESSION['id'] == $row['autor_id'])
	{
?>
<a href="topic.php?action=edit&topicid=<?php echo nocss($row['topic_id']); ?>&postid=<?php echo nocss($row['id']); ?>">
<img title="Edit" src="images/icons/silk/page_white_edit.png" alt="" /></a>
<?php
}
?>
<?php
}
?>
</div>
</div>
</div>
<?php
    }
	if ($gesamte_anzahl <= $ergebnisse_pro_seite) {}
	else {
	for ($i=1; $i<=$gesamt_seiten; ++$i) {
    if ($seite == $i) {
        echo '<div class="seitenr"><a href="topic.php?id='.nocss($_GET['id']).'&seite_nr='.$i.'" style="font-weight: bold;">'.$i.'</a></div>';
    } else {
        echo '<div class="seitenr2"><a href="topic.php?id='.nocss($_GET['id']).'&seite_nr='.$i.'">'.$i.'</a></div>';
    }
}
}
if(isset($_SESSION['id']))
	{
echo '<div class="newbutton"><a href="topic.php?action=newpost&topicid='.nocss($_GET['id']).'">'.l159.'</a></div>';
?>
<?php
}
}
include 'design/footer.php';
?>
