<div class="title"><?php echo l221; ?>:</div>
	<p>
<?php   
   $query1 = "SELECT id, post, date FROM ".$PREFIX."_posts ORDER BY date DESC"; 
   $dbpre = $dbc->prepare($query1);
   $dbpre->execute();
   if($dbpre) {
   echo '<table width="100%" class="maintable">
   		 <tr>
    	 <td width="5%"><strong>ID</strong></td>
    	 <td width="85%"><strong>'.l222.'</strong></td>
    	 <td width="10%"><span class="false">'.l62.'</span></td>
   		 </tr>
   		 </table>';
   while($row1 = $dbpre->fetch(PDO::FETCH_ASSOC)) {
   echo '<table width="100%" class="maintable">
   		 <tr>
    	 <td width="5%"><strong>' . nocss($row1['id']) . '</strong></td>
    	 <td width="85%"><span class="blue">' . nocss($row1['post']) . '</span></td>
    	 <td width="10%"><a href="index.php?admin=posts&id=' . nocss($row1['id']) . '"><img src="../images/icons/standard/close2r.png" border="0" title="'.l62.'" /></a></td>
   		 </tr>';
}
	echo '</table>';	
	} 
	else {   
	echo l223;
	}
?>
</p>
<?php
    if (is_numeric($_GET['id'])) {
?>
<div class="title"><?php echo l224; ?>:</div>
<p>
<?php	
    $user_id = presql($_GET['id']);
    $query = "DELETE FROM ".$PREFIX."_posts WHERE id = '" . $user_id . "'";
    $dbpre = $dbc->prepare($query);
    $dbpre->execute();
    if($dbpre) {
    echo l225;
	}else{
    echo l226;
    }
?>
</p>
<?php
}
?>

