<?php
error_reporting(0);
$smilies = '1';
include 'inc/h.php';
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
		WHERE id  = '".presql($_GET['id'])."'
        ORDER BY
            registerdate
		";
    $rResultset = mysql_query($sql) OR die(mysql_error()."<pre>".$sql."</pre>");
      while ($aResult = mysql_fetch_array($rResultset)){
$subsite_title = $aResult['username'];
include 'design/header.php';
	  if($aResult['show_email'] == '1') {$rssemail = '<b>Email:</b> '.nocss($aResult['email']).'<br>';}
	  else {$rssemail = '';}
    if ($aResult['rang'] == '') {
	$rssrang = '<b>'.l78.':</b> User<br>';
	}
	else {
	$rssrang = '<b>'.l78.':</b> '.nocss($aResult['rang']).'<br>';
	}
    if ($aResult['facebook'] == '') {
	$rssfb = '';
	}
	else {
	$rssfb = '<br><img title="Facebook" src="images/icons/mix/facebook.png" alt="" /> <b>Facebook:</b> <a href="referrer.php?'.nocss($aResult['facebook']).'">'.nocss($aResult['facebook']).'</a><br>';
	}
    if (nocss($aResult['twitter']) == '') {
	$rsstwitter = '';
	}
	else {
	$rsstwitter = '<img title="Twitter" src="images/icons/mix/twitter.png" alt="" /> <b>Twitter:</b> <a href="referrer.php?'.nocss($aResult['twitter']).'">'.nocss($aResult['twitter']).'</a><br>';
	}
	if ($aResult['googleplus'] == '') {
	$rssgp = '';
	}
	else {
	$rssgp = '<img title="Google+" src="images/icons/mix/google.png" alt="" /> <b>Google+:</b> <a href="referrer.php?'.nocss($aResult['googleplus']).'">'.nocss($aResult['googleplus']).'</a><br>';
	}
	if ($aResult['firstname'] == '') {
	$rssfirstname = '';
	}
	else {
	$rssfirstname = '<b>'.l79.':</b> '.nocss($aResult['firstname']).'<br>';
	}
	if ($aResult['lastname'] == '') {
	$rsslastname = '';
	}
	else {
	$rsslastname = '<b>'.l80.':</b> '.nocss($aResult['lastname']).'<br>';
	}
	if ($aResult['website'] == '') {
	$rsswebsite = '';
	}
	else {
	$rsswebsite = '<img title="Homepage" src="images/icons/standard/15homepage.png" alt="" /> <b>'.l81.':</b> <a href="referrer.php?'.nocss($aResult['website']).'">'.nocss($aResult['website']).'</a><br>';
	}
	if ($aResult['signature'] == '') {
	$rsssig = '';
	}
	else {
	$rsssig = '<br><b>'.l82.':</b><br> '.nl2p(parse_bbcode($aResult['signature'])).'<br>';
	}
	if ($aResult['avatar'] == '') {
	$avatar = $site_url.'/images/icons/standard/avatar.png';
	}
	else {
	$avatar = $site_url.'/images/avatare/'.nocss($aResult['avatar']);
	}
$grav_url = "http://www.gravatar.com/avatar/".md5(strtolower(trim($aResult['email'])))."?d=".urlencode($avatar)."&s=150";
echo '<div class="pav"><img class="avatar" src="'.$grav_url.'" alt=""/></div><div class="ptxt"><h2>'.nocss($aResult['username']).':</h2><br>';
echo $rssfirstname; 
echo $rsslastname;
echo $rssemail;
echo $rssrang;
echo $rssfb;
echo $rsstwitter;
echo $rssgp;
echo $rsswebsite;
echo $rsssig;
echo '<br><b>RSS:</b><br><a target="_blank" href="rss/user.php?id='.nocss($_GET['id']).'"><img title="RSS" src="images/icons/mix/rss.png" alt="" /> '.l86.'</a>
<br><a target="_blank" href="rss/userposts.php?id='.nocss($_GET['id']).'"><img title="RSS" src="images/icons/mix/rss.png" alt="" /> '.l87.'</a>';
?>
</div>
<?php
}
include 'design/footer.php';
?>
