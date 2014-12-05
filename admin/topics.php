<div class="title"><?php echo l246; ?>:</div>
	<p>
<?php   
   $query1 = "SELECT id, title, date FROM ".$PREFIX."_topics ORDER BY date DESC"; 
   $dbpre = $dbc->prepare($query1);
   $dbpre->execute();
   if($dbpre) {
   echo '<table width="100%" class="maintable">
   		 <tr>
    	 <td width="5%"><strong>ID</strong></td>
    	 <td width="85%"><strong>'.l247.'</strong></td>
    	 <td width="10%"><span class="false">'.l62.'</span></td>
   		 </tr>
   		 </table>';

   while($row1 = $dbpre->fetch(PDO::FETCH_ASSOC)) {
   echo '<table width="100%" class="maintable">
   		 <tr>
    	 <td width="5%"><strong>' . nocss($row1['id']) . '</strong></td>
    	 <td width="85%"><span class="blue">' . nocss($row1['title']) . '</span></td>
    	 <td width="10%"><a href="index.php?admin=topics&id=' . nocss($row1['id']) . '"><img src="../images/icons/standard/close2r.png" border="0" title="'.l62.'" /></a></td>
   		 </tr>';
}
	echo '</table>';	
	} 
	else {   
	echo l248;
	}
?>
</p>
<?php
    if (is_numeric($_GET['id'])) {
?>
<div class="title"><?php echo l249; ?>:</div>
<p>
<?php	
    $user_id = presql($_GET['id']);
    $query = "DELETE FROM ".$PREFIX."_topics WHERE id = '" . $user_id . "'";
    $dbpre = $dbc->prepare($query);
    $dbpre->execute();
    if($dbpre) {
    echo l250;
	}else{
    echo l251;
    }
?>
</p>
<?php
}
?>
