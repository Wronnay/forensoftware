<div style="float:left;"> <!-- class="spalte" -->
<div class="title"><?php echo l168; ?>:</div>
<?php
echo '<p>';
	if (isset($_POST['submit'])){
    $sql = "INSERT INTO ".$PREFIX."_kat1 (name, lang) VALUES ('".presql($_REQUEST['catname'])."', '".$_SESSION['lang']."')";
	$dbpre = $dbc->prepare($sql);
	$dbpre->execute();
	if($dbpre->rowCount() == 1) {
    echo l169; 
	 } 
        else{
        echo l170;
     	}
	 }
    $sql = "SELECT
	                id,
                        name
            FROM
                    ".$PREFIX."_kat1
           ";
    $dbpre = $dbc->prepare($sql);
    $dbpre->execute();
	if ($dbpre->rowCount() < 1) {
	    echo l171;
	}
    while ($row = $dbpre->fetch(PDO::FETCH_ASSOC)) {
?>
<a href="index.php?admin=categories&id=<?php echo nocss($row['id']); ?>"><img title="<?php echo l62; ?>" src="../images/icons/standard/close2r.png" alt="" /></a>
<?php echo nocss($row['name']); ?> (<b>ID</b>: <?php echo nocss($row['id']); ?>)<br>
<?php
	}
?>

</p>
<?php
    if (is_numeric($_GET['id'])) {
?>
<div class="title"><?php echo l172; ?>:</div>
<p>
<?php	
    $catid = presql($_GET['id']);
    $query = "DELETE
                          FROM
				 ".$PREFIX."_kat1
			  WHERE
				 id = '".$catid."'";
	$dbpre = $dbc->prepare($query);
	$dbpre->execute();
    if($dbpre) {
    echo l173;
	}
	else{
    echo l174;
    }
?>
</p>
<?php
}
?>
</div>
<div style="float:right;">
<div class="title"><?php echo l175; ?>:</div>
<form action="index.php?admin=categories" method="post" name="cat">
<input name="catname" class="li" type="text" size="40" /> <input name="submit" class="lb" type="submit" value="<?php echo l175; ?>" />
</form>
</div>
<div style="clear:both; float:left;"> <!-- class="spalte" -->
<div class="title"><?php echo l176; ?>:</div>
<?php
echo '<p>';
	if (isset($_POST['submit2'])){
        $sql = "INSERT INTO ".$PREFIX."_kat2 (name, kat1_id, beschreibung, lang) VALUES ('".presql($_REQUEST['cat2name'])."', '".presql($_REQUEST['kat1_id'])."', '".presql($_REQUEST['beschreibung'])."', '".$_SESSION['lang']."')";
	$dbpre = $dbc->prepare($sql);
	$dbpre->execute();
	if($dbpre->rowCount() == 1) {
        echo l169;
  	 
	 } 
        else{
	 
        echo l170;
     	}
	 }
    $sql = "SELECT
	                id,
                        name,
                        kat1_id,
                        beschreibung
            FROM
                    ".$PREFIX."_kat2
           ";
    $dbpre = $dbc->prepare($sql);
    $dbpre->execute();
	if ($dbpre->rowCount() < 1) {
	    echo l177;
	}
    while ($row = $dbpre->fetch(PDO::FETCH_ASSOC)) {
?>
<a href="index.php?admin=categories&id2=<?php echo nocss($row['id']); ?>"><img title="<?php echo l62; ?>" src="../images/icons/standard/close2r.png" alt="" /></a>
<b><?php echo nocss($row['name']); ?></b><br>
<?php echo nocss($row['beschreibung']); ?>
<br>
<?php
	}
?>
</p>
<?php
    if (is_numeric($_GET['id2'])) {
?>
<div class="title"><?php echo l178; ?>:</div>
<p>
<?php	
    $catid2 = $_GET['id2'];
    $query = "DELETE
                          FROM
				 ".$PREFIX."_kat2
			  WHERE
				 id = '" . presql($catid2) . "'";
	$dbpre = $dbc->prepare($query);
	$dbpre->execute();
    if($dbpre) {
    echo l179;
	}
	else{
    echo l180;
    }
?>
</p>
<?php
}
?>
</div><div style="float:right;">
<div class="title"><?php echo l181; ?>:</div>
<p>
<form action="index.php?admin=categories" method="post" name="cat">
<table>
	  <tr><td><b><?php echo l182; ?></b>: </td><td><input name="kat1_id" class="li" type="text" size="5" /></td></tr>
	  <tr><td><b><?php echo l183; ?></b>: </td><td><input name="cat2name" class="li" type="text" size="40" /> </td></tr>
      <tr><td><b><?php echo l184; ?></b>: </td><td>
      <textarea id="nachricht" class="li" name="beschreibung" cols="40" rows="10"></textarea></td></tr>
	  </table>
<input name="submit2" class="lb" type="submit" value="<?php echo l181; ?>" />
</form>
</p>
</div>
