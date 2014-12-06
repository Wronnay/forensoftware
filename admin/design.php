<div class="title"><?php echo l186; ?>:</div>
<p>
<?php
    $sql = "SELECT
	                id,
                        name,
                        url,
                        pic,
                        date
            FROM
                    ".$PREFIX."_designs
           ";
    $dbpre = $dbc->prepare($sql);
    $dbpre->execute();
	if ($dbpre->rowCount() < 1) {
	    echo l187;
	}
    while ($row = $dbpre->fetch(PDO::FETCH_ASSOC)) {
?>
<div class="design">
<a href="index.php?admin=designs&id=<?php echo nocss($row['id']); ?>"><img title="<?php echo l62; ?>" src="../images/icons/standard/close2r.png" alt="" /></a> <?php echo nocss($row['name']); ?><br>
<img src="../images/designs/<?php echo nocss($row['pic']); ?>" alt="">
<br><a target="_blank" href="../index.php?design=<?php echo nocss($row['url']); ?>"><?php echo l188; ?></a> <a href="index.php?admin=designs&make=<?php echo nocss($row['url']); ?>"><?php echo l189; ?></a><br></div>
<?php
	}
?>
</p>
<?php
    if (is_numeric($_GET['id'])) {
?>
<div class="title" style="clear:both;"><?php echo l190; ?>:</div>
<p>
<?php	
    $catid = presql($_GET['id']);
    $query = "DELETE
                          FROM
				 ".$PREFIX."_designs
			  WHERE
				 id = '" .$catid. "'";
	$dbpre = $dbc->prepare($query);
	$dbpre->execute();
    if($dbpre) {
    echo l191;
	}
	else{
    echo l192;
    }
?>
</p>
<?php
}
?>
<?php
    if (isset($_GET['make'])) {
?>
<div class="title" style="clear:both;"><?php echo l193; ?>:</div>
<p>
<?php	
    $make = presql($_GET['make']);
    $query = "UPDATE
                                ".$PREFIX."_data
                        SET
				url =  '".$make."'
                        WHERE
                                name = 'design'";
	$dbpre = $dbc->prepare($query);
	$dbpre->execute();
    if($dbpre) {
    echo l194;
	}
	else{
    echo l195;
    }
?>
</p>
<?php
}
?>
