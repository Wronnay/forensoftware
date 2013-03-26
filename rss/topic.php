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
      <title><?php echo l294; ?> - <?php echo $site_title; ?></title>
      <link><?php echo $site_url; ?></link>
      <description><?php echo $site_title; ?> - <?php echo l295; ?></description>
      <language><?php echo l293; ?></language>
      <copyright>Copyright <?php echo $site_title; ?></copyright>
<?php
    $sql = "SELECT
            id,
            autor_id,
			topic_id,
			title,
			post,
            date
        FROM
            ".$PREFIX."_posts
		WHERE topic_id  = '".presql($_GET['id'])."'
        ORDER BY
            date
		";
    $rResultset = mysql_query($sql) OR die(mysql_error()."<pre>".$sql."</pre>");
      while ($aResult = mysql_fetch_array($rResultset)){
?>
        <item>
        <title><?php echo nocss($aResult['title']); ?></title>
		<description><![CDATA[ <?php echo nl2p(parse_bbcode($aResult['post'])); ?> ]]></description>
        <link><?php echo nocss($site_url); ?>/topic.php?id=<?php echo nocss($_GET['id']); ?>#<?php echo nocss($aResult['id']); ?></link>
        <guid><?php echo nocss($site_url); ?>/topic.php?id=<?php echo nocss($_GET['id']); ?>#<?php echo nocss($aResult['id']); ?></guid>
        <pubDate><?php $pubdate = strtotime($aResult['date']); ?>
<?php $pubdate = date(r, $pubdate); ?>
<?php echo $pubdate; ?></pubDate>
        </item>
<?php
      }
?>
    </channel>
  </rss> 
