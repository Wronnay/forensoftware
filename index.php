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
    $result = mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
			if (mysql_num_rows($result) == 0) {
header("Location: admin/index.php");
	    echo l2;
	}
    while ($row = mysql_fetch_assoc($result)) {
include base64_decode('ZGVzaWduL2thdC5waHA=');
    }
include base64_decode('ZGVzaWduL2Zvb3Rlci5waHA=');
?>
