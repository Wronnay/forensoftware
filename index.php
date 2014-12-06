<?php
error_reporting(0);
include 'inc/h.php';
$nt = '1';
$subsite_title = l1;
include base64_decode('ZGVzaWduL2hlYWRlci5waHA=');
    $sql = "SELECT
            id,
            name
        FROM
            ".$PREFIX."_kat1
        WHERE
            lang = '".$_SESSION['lang']."'
        ORDER BY
            id
		";
    $dbpre = $dbc->prepare($sql);
    $dbpre->execute();
	if ($dbpre->rowCount() < 1) {
header("Location: admin/index.php");
	    echo l2;
	}
    while ($row = $dbpre->fetch(PDO::FETCH_ASSOC)) {
include base64_decode('ZGVzaWduL2thdC5waHA=');
    }
include base64_decode('ZGVzaWduL2Zvb3Rlci5waHA=');
?>
