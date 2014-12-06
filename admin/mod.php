<div class="title"><?php echo l215; ?>:</div>
<p>
<?php
	if (isset($_POST['user_name'])){
	$_POST = get_magic_quotes_gpc() ? array_map( 'stripslashes', $_POST ) : $_POST;
	$username = nocss($_POST['user_name']);
	$sql = "UPDATE
				".$PREFIX."_user
			SET
				rang = 'Moderator'
			WHERE
				username = '" . presql($username) . "'
                        AND
                                rang = ''
";
	$dbpre = $dbc->prepare($sql);
	$dbpre->execute();
	if($dbpre->rowCount() == 1) {
        echo '<p class="erfolg"><u>' . nocss($username) . '</u> '.l216.'</p>';
	 }else{
        echo l217;
     	}
	 }
?>
<form action="index.php?admin=mod&user_name" method="post" name="user_name">
<input name="user_name" class="li" type="text" size="40" /> <input name="submit" class="lb" type="submit" value="<?php echo l218; ?>" />
</form>
</p>
<div class="title"><?php echo l219; ?> (
<?php 
$bword = $dbc->prepare("SELECT id FROM ".$PREFIX."_user WHERE rang = 'Moderator'"); 
$bword->execute();
$allwords = $bword->rowCount(); 
echo $allwords; 
?>):</div>
	<p>
<?php   
   $query1 = "SELECT id, username FROM ".$PREFIX."_user WHERE rang = 'Moderator'"; 
   $dbpre = $dbc->prepare($query1);
   $dbpre->execute();
   if($dbpre) {
   echo '<table width="100%" class="maintable">
   		 <tr>
    	 <td width="5%"><strong>ID</strong></td>
    	 <td width="85%"><strong>'.l183.'</strong></td>
    	 <td width="10%"><span class="false">'.l62.'</span></td>
   		 </tr>
   		 </table>';

   while($row1 = $dbpre->fetch(PDO::FETCH_ASSOC)) {
   echo '<table width="100%" class="maintable">
   		 <tr>
    	 <td width="5%"><strong>' . nocss($row1['id']) . '</strong></td>
    	 <td width="85%"><span class="blue">' . nocss($row1['username']) . '</span></td>
    	 <td width="10%"><a href="index.php?admin=mod&user_id=' . nocss($row1['id']) . '"><img src="../images/icons/standard/close2r.png" border="0" title="'.l62.'" /></a></td>
   		 </tr>';
}
	echo '</table>';	
	} 
	
	else {   
	echo l220;
	}
?>
</p>
<?php
    if (is_numeric($_GET['user_id'])) {
?>
<div class="title"><?php echo l306; ?>:</div>
<p>
<?php	
    $user_id = presql($_GET['user_id']);
    $query = "UPDATE
				 ".$PREFIX."_user
			  SET
				 rang = ''
			  WHERE
				 id = '" . $user_id . "'";
	$dbpre = $dbc->prepare($query);
	$dbpre->execute();
    if($result) {
    echo l307;
	}
	else{
    echo l308;
    }
?>
</p>
<?php
}
?>
