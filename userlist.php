<?php
error_reporting(0);
include 'inc/h.php';
$subsite_title = l77;
include 'design/header.php';
echo '<h2>'.l77.':</h2>';

    $sql = "SELECT
            id,
            username,
			email,
			show_email,
			rang,
			signature,
			avatar,
			facebook,
			twitter,
			googleplus,
			firstname,
			lastname,
			website,
            registerdate
        FROM
            ".$PREFIX."_user
        ORDER BY
            registerdate DESC
		LIMIT
		    15
		";
    $dbpre = $dbc->prepare($sql);
    $dbpre->execute();
      while ($aResult = $dbpre->fetch(PDO::FETCH_ASSOC)){
	  if($aResult['show_email'] == '1') {$rssemail = '<b>Email:</b> '.$aResult['email'].'<br>';}
	  else {$rssemail = '';}
    if ($aResult['rang'] == '') {
	$rssrang = '<b>'.l78.':</b> User<br>';
	}
	else {
	$rssrang = '<b>'.l78.':</b> '.$aResult['rang'].'<br>';
	}
    if ($aResult['facebook'] == '') {
	$rssfb = '';
	}
	else {
	$rssfb = '<br><b>Facebook:</b> <a href="../referrer.php?'.$aResult['facebook'].'">'.$aResult['facebook'].'</a><br>';
	}
    if ($aResult['twitter'] == '') {
	$rsstwitter = '';
	}
	else {
	$rsstwitter = '<b>Twitter:</b> <a href="../referrer.php?'.$aResult['twitter'].'">'.$aResult['twitter'].'</a><br>';
	}
	if ($aResult['googleplus'] == '') {
	$rssgp = '';
	}
	else {
	$rssgp = '<b>Google+:</b> <a href="../referrer.php?'.$aResult['googleplus'].'">'.$aResult['googleplus'].'</a><br>';
	}
	if ($aResult['firstname'] == '') {
	$rssfirstname = '';
	}
	else {
	$rssfirstname = '<b>'.l79.':</b> '.$aResult['firstname'].'<br>';
	}
	if ($aResult['lastname'] == '') {
	$rsslastname = '';
	}
	else {
	$rsslastname = '<b>'.l80.':</b> '.$aResult['lastname'].'<br>';
	}
	if ($aResult['website'] == '') {
	$rsswebsite = '';
	}
	else {
	$rsswebsite = '<b>'.l81.':</b> <a href="../referrer.php?'.$aResult['website'].'">'.$aResult['website'].'</a><br>';
	}
	if ($aResult['signature'] == '') {
	$rsssig = '';
	}
	else {
	$rsssig = '<br><b>'.l82.':</b><br> '.$aResult['signature'].'<br>';
	}
?>
        <div>
        <b><a href="<?php echo nocss($site_url); ?>/user.php?id=<?php echo nocss($aResult['id']); ?>"><?php echo nocss($aResult['username']); ?></a></b><p>
        </p></div>
<?php
      }

include 'design/footer.php';
?>
