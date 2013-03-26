<?php
error_reporting(0);
include 'inc/h.php';
if ($_GET['id'] == '') {
if ($_GET['action'] == 'newtopic'){
$subsite_title = l17;
include 'design/header.php';
	  $kategoriesql = "
	  SELECT
            id,
            name,
			kat1_id,
			beschreibung
        FROM
            ".$PREFIX."_kat2
	    WHERE id  = '".presql($_GET['kat2id'])."'
	  ";
	   $kategorie2 = mysql_query($kategoriesql) OR die("<pre>\n".$kategoriesql."</pre>\n".mysql_error());
			if (mysql_num_rows($kategorie2) == 0) {
	    echo l18;
	}
    while ($kategorierow = mysql_fetch_assoc($kategorie2)) {
	$kategorie = $kategorierow['name'];
	$kategorieid = $kategorierow['id'];
	}
  if(isset($_POST['submit']) AND $_POST['submit'] == l19) {
  	if(isset($_SESSION['id']))
	{
        if(empty($_REQUEST['titel']) || empty($_REQUEST['body']))
      {
        echo l20;
      }
	    else {
	  $kategoriesql = "
	  SELECT
            id,
            name,
			kat1_id,
			beschreibung
        FROM
            ".$PREFIX."_kat2
	    WHERE id  = '".presql($_GET['kat2id'])."'
	  ";
	   $kategorie2 = mysql_query($kategoriesql) OR die("<pre>\n".$kategoriesql."</pre>\n".mysql_error());
			if (mysql_num_rows($kategorie2) == 0) {
	    echo l21;
	}
    while ($kategorierow = mysql_fetch_assoc($kategorie2)) {
	$kategorie = $kategorierow['name'];
	$kategorieid = $kategorierow['id'];
	}		
	  $kategoriesql2 = "
	  SELECT
            id,
			kat2_id,
			autor_id,
			title,
			date
        FROM
            ".$PREFIX."_topics
	    ORDER BY
		   date DESC
		LIMIT
		   1
	  ";
	   $kategorie3 = mysql_query($kategoriesql2) OR die("<pre>\n".$kategoriesql2."</pre>\n".mysql_error());
			if (mysql_num_rows($kategorie3) == 0) {
	    echo l21;
	}
    while ($kategorierow3 = mysql_fetch_assoc($kategorie3)) {
if (empty($kategorierow3['id'])) 
{ 
$topicsid = 1;
}
elseif ($kategorierow3['id'] == '0') 
{ 
$topicsid = 1;
}
else {
       $topicsid = $kategorierow3['id'] + 1;
}
	}		
	  $bodynachricht = presql($_REQUEST['body']);
	  $sql = "INSERT INTO ".$PREFIX."_topics (id, kat2_id, autor_id, title, date) VALUES ('".$topicsid."','".$kategorieid."','".$_SESSION['id']."','".presql($_REQUEST['titel'])."', now())";
	  $result = mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
if (empty($topicsid)) 
{ 
$topicsid = 1;
}
elseif ($topicsid == '0') 
{ 
$topicsid = 1;
}
	  $sql2 = "INSERT INTO ".$PREFIX."_posts (autor_id, topic_id, title, date, post) VALUES ('".$_SESSION['id']."','".$topicsid."','".presql($_REQUEST['titel'])."', now(),'".$bodynachricht."')";
	  $result2 = mysql_query($sql2) OR die("<pre>\n".$sql2."</pre>\n".mysql_error());
	  echo l22;
	  header("Location: forum.php?id=".mysql_real_escape_string($_GET['kat2id'])."");
		}
		}
		else {echo l23;}
  }
  echo '<form action="forum.php?action=newtopic&kat2id='.nocss($_GET['kat2id']).'" method="post" enctype="multipart/form-data">';
?>
	  <table>
	  <tr><td><b><?php echo l24; ?></b>: </td><td><?php echo nocss($kategorie); ?> (<a href="index.php"><?php echo l25; ?></a>)</td></tr>
	  <tr><td><b><?php echo l26; ?></b>: </td><td><input type="text" name="titel" value="" size="50"></td></tr>
      <tr><td><b><?php echo l27; ?></b>: </td><td>
<?php
include 'inc/sbbcb.php';
?>
      <textarea id="nachricht" name="body" cols="55" rows="15"></textarea></td></tr>
	  </table>
      <input name="submit" type="submit" value="<?php echo l19; ?>">
      </form>
<?php
}
}
else {
$result_total = mysql_query('SELECT COUNT(*) as `total` FROM `'.$PREFIX.'_topics` WHERE kat2_id = '.presql($_GET['id']).'');
$row_total = mysql_fetch_assoc($result_total);
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
			kat2_id,
			autor_id,
			title,
            date
        FROM
            ".$PREFIX."_topics
		WHERE kat2_id  = '".presql($_GET['id'])."'
        ORDER BY
            date DESC
		LIMIT
		    ".$limit.", ".$ergebnisse_pro_seite."
		";
    $sqltit = "SELECT
            id,
			kat1_id,
			name,
			beschreibung
        FROM
            ".$PREFIX."_kat2
		WHERE id  = '".presql($_GET['id'])."'
		LIMIT
		    1
		";
    $resulttit = mysql_query($sqltit) OR die("<pre>\n".$sqltit."</pre>\n".mysql_error());
while ($rowtit = mysql_fetch_assoc($resulttit)) {
$subsite_title = $rowtit['name'];
$subsite_des = $rowtit['beschreibung'];
}
include 'design/header.php';
if(isset($_SESSION['id']))
	{
?>
<div class="newbutton"><a href="forum.php?action=newtopic&kat2id=<?php echo nocss($_GET['id']); ?>"><?php echo l17; ?></a></div>
<?php
}
?>
<div class="kat">
<div class="infos"><div class="lastpost"><?php echo l28; ?></div><div class="posts"><?php echo l29; ?></div><div class="topics"><?php echo l30; ?></div></div>
<div class="title">
<?php echo l31; ?>:
</div>
<?php
    $result = mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
			if (mysql_num_rows($result) == 0) {
	    echo l32;
	}
    while ($row = mysql_fetch_assoc($result)) {
include 'design/topics.php';
    }
?>
</div>
<?php
	if ($gesamte_anzahl <= $ergebnisse_pro_seite) {}
	else {
	for ($i=1; $i<=$gesamt_seiten; ++$i) {
    if ($seite == $i) {
        echo '<div class="seitenr"><a href="forum.php?id='.nocss($_GET['id']).'&seite_nr='.$i.'" style="font-weight: bold;">'.$i.'</a></div>';
    } else {
        echo '<div class="seitenr2"><a href="forum.php?id='.nocss($_GET['id']).'&seite_nr='.$i.'">'.$i.'</a></div>';
    }
}
}
if(isset($_SESSION['id']))
	{
?>
<div class="newbutton"><a href="forum.php?action=newtopic&kat2id=<?php echo nocss($_GET['id']); ?>"><?php echo l17; ?></a></div>
<?php
}
}
include 'design/footer.php';
?>
