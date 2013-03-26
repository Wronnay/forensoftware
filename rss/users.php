<?php
error_reporting(0);
include '../inc/config.php';
mysql_connect($HOST,$USER,$PW)or die(mysql_error());
mysql_select_db($DB)or die(mysql_error());
include '../inc/functions.php';
include '../inc/data.php';
ini_set("session.gc_maxlifetime", 2000);
$default_lang = 'en';
if(!isset($_SESSION['lang']))
{
    if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE']))
    {
      $_SESSION['lang'] = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2);
    }
	else
    {
	$_SESSION['lang'] = 'en';
    }
}
if(isset($_GET['lang']))
{
    $_SESSION['lang'] = $_GET['lang'];
}
if($_SESSION['lang'] == "de")
  {
include '../lang/de/1.php';
  }
  else
  {
include '../lang/en/1.php';
  }
  header("Content-Type: application/rss+xml");
  
  echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
?>
  <rss version="2.0">
    <channel>
      <title><?php echo l302; ?> - <?php echo $site_title; ?></title>
      <link><?php echo $site_url; ?></link>
      <description><?php echo $site_title; ?> - <?php echo l303; ?></description>
      <language><?php echo l293; ?></language>
      <copyright>Copyright <?php echo $site_title; ?></copyright>
<?php
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
    $rResultset = mysql_query($sql) OR die(mysql_error()."<pre>".$sql."</pre>");
      while ($aResult = mysql_fetch_array($rResultset)){
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
	$rssfb = '<br><img title="Facebook" src="images/icons/mix/facebook.png" alt="" /> <b>Facebook:</b> <a href="referrer.php?'.$aResult['facebook'].'">'.$aResult['facebook'].'</a><br>';
	}
    if ($aResult['twitter'] == '') {
	$rsstwitter = '';
	}
	else {
	$rsstwitter = '<img title="Twitter" src="images/icons/mix/twitter.png" alt="" /> <b>Twitter:</b> <a href="referrer.php?'.$aResult['twitter'].'">'.$aResult['twitter'].'</a><br>';
	}
	if ($aResult['googleplus'] == '') {
	$rssgp = '';
	}
	else {
	$rssgp = '<img title="Google+" src="images/icons/mix/google.png" alt="" /> <b>Google+:</b> <a href="referrer.php?'.$aResult['googleplus'].'">'.$aResult['googleplus'].'</a><br>';
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
	$rsswebsite = '<img title="Homepage" src="images/icons/standard/15homepage.png" alt="" /> <b>'.l81.':</b> <a href="referrer.php?'.$aResult['website'].'">'.$aResult['website'].'</a><br>';
	}
	if ($aResult['signature'] == '') {
	$rsssig = '';
	}
	else {
	$rsssig = '<br><b>'.l82.':</b><br> '.nl2p(parse_bbcode($aResult['signature'])).'<br>';
	}
?>
        <item>
        <title><?php echo nocss($aResult['username']); ?></title>
		<description><![CDATA[ 
<?php
echo nocss($rssfirstname); 
echo nocss($rsslastname);
echo nocss($rssemail);
echo nocss($rssrang);
echo nocss($rssfb);
echo nocss($rsstwitter);
echo nocss($rssgp);
echo nocss($rsswebsite);
echo nocss($rsssig);
?> ]]></description>
        <link><?php echo nocss($site_url); ?>/user.php?id=<?php echo nocss($aResult['id']); ?></link>
        <guid><?php echo nocss($site_url); ?>/user.php?id=<?php echo nocss($aResult['id']); ?></guid>
        <pubDate><?php $pubdate = strtotime($aResult['registerdate']); ?>
<?php $pubdate = date(r, $pubdate); ?>
<?php echo $pubdate; ?></pubDate>
        </item>
<?php
      }
?>
    </channel>
  </rss> 
