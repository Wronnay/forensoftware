<?php
error_reporting(0);
include '../inc/config.php';
$dbc = new PDO(''.$DBTYPE.':host='.$HOST.';dbname='.$DB.'', ''.$USER.'', ''.$PW.'');
$dbc->query("SET CHARACTER SET utf8");
include '../inc/functions.php';
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
include '../inc/data.php';
  header("Content-Type: application/rss+xml");
  
  echo "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>";
?>
  <rss version="2.0">
    <channel>
      <title><?php echo l291; ?> - <?php echo $site_title; ?></title>
      <link><?php echo $site_url; ?></link>
      <description><?php echo $site_title; ?> - <?php echo l292; ?></description>
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
        ORDER BY
            date DESC
		LIMIT
		    15
		";
    $dbpre = $dbc->prepare($sql);
    $dbpre->execute();
      while ($aResult = $dbpre->fetch(PDO::FETCH_ASSOC)){
?>
        <item>
        <title><?php echo nocss($aResult['title']); ?></title>
		<description><![CDATA[ <?php echo nl2p(parse_bbcode($aResult['post'])); ?> ]]></description>
        <link><?php echo nocss($site_url); ?>/topic.php?id=<?php echo nocss($aResult['topic_id']); ?>#<?php echo nocss($aResult['id']); ?></link>
        <guid><?php echo nocss($site_url); ?>/topic.php?id=<?php echo nocss($aResult['topic_id']); ?>#<?php echo nocss($aResult['id']); ?></guid>
        <pubDate><?php $pubdate = strtotime($aResult['date']); ?>
<?php $pubdate = date(r, $pubdate); ?>
<?php echo $pubdate; ?></pubDate>
        </item>
<?php
      }
?>
    </channel>
  </rss> 
