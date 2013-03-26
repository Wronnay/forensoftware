<div class="title"><?php echo l252; ?>:</div>
	<p>
<?php   
   $query1 = "SELECT id, username FROM ".$PREFIX."_user"; 
   $result1 = mysql_query($query1);

   if($result1) {
   echo '<table width="100%" class="maintable">
   		 <tr>
    	 <td width="5%"><strong>ID</strong></td>
    	 <td width="85%"><strong>'.l253.'</strong></td>
    	 <td width="10%"><span class="false">'.l62.'</span></td>
   		 </tr>
   		 </table>';

   while($row1 = mysql_fetch_array($result1)) {
   echo '<table width="100%" class="maintable">
   		 <tr>
    	 <td width="5%"><strong>' . nocss($row1['id']) . '</strong></td>
    	 <td width="85%"><span class="blue">' . nocss($row1['username']) . '</span></td>
    	 <td width="10%"><a href="index.php?admin=user&user_id=' . nocss($row1['id']) . '"><img src="../images/icons/standard/close2r.png" border="0" title="'.l62.'" /></a></td>
   		 </tr>';
}
	echo '</table>';	
	} 
	
	else {   
	echo l254;
	}
?>
</p>
<?php
    if (is_numeric($_GET['user_id'])) {
?>
<div class="title"><?php echo l255; ?>:</div>
<p>
<?php	
    $user_id = presql($_GET['user_id']);
     
    $query = "DELETE FROM ".$PREFIX."_user WHERE id = '" . $user_id . "'";
    $result = mysql_query($query);
     
    if($result) {
	
    echo l256;
    
	}else{
	
    echo l257;
    }
?>
</p>
<?php
}
?>
