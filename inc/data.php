<?php
    $sql1 = "SELECT
            id,
            name,
			url,
			text,
			date,
			active
        FROM
            ".$PREFIX."_data
        WHERE
		    active = '0'
		AND
		    name = 'title'
        AND
                    lang = '".$_SESSION['lang']."'
		";
    $result1 = mysql_query($sql1) OR die("<pre>\n".$sql1."</pre>\n".mysql_error());
			if (mysql_num_rows($result1) == 0) {
	}
    while ($row1 = mysql_fetch_assoc($result1)) {
$site_title = nocss($row1['text']);
    }
    $sql1 = "SELECT
            id,
            name,
			url,
			text,
			date,
			active
        FROM
            ".$PREFIX."_data
        WHERE
		    active = '0'
		AND
		    name = 'rules'
        AND
                    lang = '".$_SESSION['lang']."'
		";
    $result1 = mysql_query($sql1) OR die("<pre>\n".$sql1."</pre>\n".mysql_error());
			if (mysql_num_rows($result1) == 0) {
	}
    while ($row1 = mysql_fetch_assoc($result1)) {
$site_rules = nocss($row1['text']);
    }
    $sql1 = "SELECT
            id,
            name,
			url,
			text,
			date,
			active
        FROM
            ".$PREFIX."_data
        WHERE
		    active = '0'
		AND
		    name = 'headtitle'
        AND
                    lang = '".$_SESSION['lang']."'
		";
    $result1 = mysql_query($sql1) OR die("<pre>\n".$sql1."</pre>\n".mysql_error());
			if (mysql_num_rows($result1) == 0) {
	}
    while ($row1 = mysql_fetch_assoc($result1)) {
$site_headtitle = nocss($row1['text']);
    }
    $sql1 = "SELECT
            id,
            name,
			url,
			text,
			date,
			active
        FROM
            ".$PREFIX."_data
        WHERE
		    active = '0'
		AND
		    name = 'imprint'
        AND
                    lang = '".$_SESSION['lang']."'
		";
    $result1 = mysql_query($sql1) OR die("<pre>\n".$sql1."</pre>\n".mysql_error());
			if (mysql_num_rows($result1) == 0) {
	}
    while ($row1 = mysql_fetch_assoc($result1)) {
$site_imprint = nocss($row1['url']);
    }
    $sql1 = "SELECT
            id,
            name,
			url,
			text,
			date,
			active
        FROM
            ".$PREFIX."_data
        WHERE
		    active = '0'
		AND
		    name = 'subtitle'
        AND
                    lang = '".$_SESSION['lang']."'
		";
    $result1 = mysql_query($sql1) OR die("<pre>\n".$sql1."</pre>\n".mysql_error());
			if (mysql_num_rows($result1) == 0) {
	}
    while ($row1 = mysql_fetch_assoc($result1)) {
$site_subtitle = nocss($row1['text']);
    }
    $sql1 = "SELECT
            id,
            name,
			url,
			text,
			date,
			active
        FROM
            ".$PREFIX."_data
        WHERE
		    active = '0'
		AND
		    name = 'logo'
        AND
                    lang = '".$_SESSION['lang']."'
		";
    $result1 = mysql_query($sql1) OR die("<pre>\n".$sql1."</pre>\n".mysql_error());
			if (mysql_num_rows($result1) == 0) {
	}
    while ($row1 = mysql_fetch_assoc($result1)) {
$site_logo = nocss($row1['url']);
$site_logoalt = nocss($row1['text']);
    }
    $sql1 = "SELECT
            id,
            name,
			url,
			text,
			date,
			active
        FROM
            ".$PREFIX."_data
        WHERE
		    active = '0'
		AND
		    name = 'favicon'
		";
    $result1 = mysql_query($sql1) OR die("<pre>\n".$sql1."</pre>\n".mysql_error());
			if (mysql_num_rows($result1) == 0) {
	}
    while ($row1 = mysql_fetch_assoc($result1)) {
$site_favicon = nocss($row1['url']);
    }
	    $sql1 = "SELECT
            id,
            name,
			url,
			text,
			date,
			active
        FROM
            ".$PREFIX."_data
        WHERE
		    active = '0'
		AND
		    name = 'url'
		";
    $result1 = mysql_query($sql1) OR die("<pre>\n".$sql1."</pre>\n".mysql_error());
			if (mysql_num_rows($result1) == 0) {
	}
    while ($row1 = mysql_fetch_assoc($result1)) {
$site_url = nocss($row1['url']);
    }
	    $sql1 = "SELECT
            id,
            name,
			url,
			text,
			date,
			active
        FROM
            ".$PREFIX."_data
        WHERE
		    active = '0'
		AND
		    name = 'key'
		";
    $result1 = mysql_query($sql1) OR die("<pre>\n".$sql1."</pre>\n".mysql_error());
			if (mysql_num_rows($result1) == 0) {
	}
    while ($row1 = mysql_fetch_assoc($result1)) {
$site_key = nocss($row1['text']);
    }

	    $sql1 = "SELECT
            id,
            name,
			url,
			text,
			date,
			active
        FROM
            ".$PREFIX."_data
        WHERE
		    active = '0'
		AND
		    name = 'referrer'
		";
    $result1 = mysql_query($sql1) OR die("<pre>\n".$sql1."</pre>\n".mysql_error());
			if (mysql_num_rows($result1) == 0) {
	}
    while ($row1 = mysql_fetch_assoc($result1)) {
$site_referrer = nocss($row1['text']);
    }
	    $sql1 = "SELECT
            id,
            name,
			url,
			text,
			date,
			active
        FROM
            ".$PREFIX."_data
        WHERE
		    active = '0'
		AND
		    name = 'description'
        AND
                    lang = '".$_SESSION['lang']."'
		";
    $result1 = mysql_query($sql1) OR die("<pre>\n".$sql1."</pre>\n".mysql_error());
			if (mysql_num_rows($result1) == 0) {
	}
    while ($row1 = mysql_fetch_assoc($result1)) {
$site_description = nocss($row1['text']);
    }
	    $sql1 = "SELECT
            id,
            name,
			url,
			text,
			date,
			active
        FROM
            ".$PREFIX."_data
        WHERE
		    active = '0'
		AND
		    name = 'keywords'
        AND
                    lang = '".$_SESSION['lang']."'
		";
    $result1 = mysql_query($sql1) OR die("<pre>\n".$sql1."</pre>\n".mysql_error());
			if (mysql_num_rows($result1) == 0) {
	}
    while ($row1 = mysql_fetch_assoc($result1)) {
$site_keywords = nocss($row1['text']);
    }
	    $sql1 = "SELECT
            id,
            name,
			url,
			text,
			date,
			active
        FROM
            ".$PREFIX."_data
        WHERE
		    active = '0'
		AND
		    name = 'design'
		";
    $result1 = mysql_query($sql1) OR die("<pre>\n".$sql1."</pre>\n".mysql_error());
			if (mysql_num_rows($result1) == 0) {
	}
    while ($row1 = mysql_fetch_assoc($result1)) {
$site_design = nocss($row1['url']);
    }
$version = '0.5';
?>
