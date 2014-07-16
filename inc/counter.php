<?php
$ip = md5($_SERVER['REMOTE_ADDR'].'wyfs');
    $sql = "SELECT
                id
            FROM
                ".$PREFIX."_counter
            WHERE
                date = CURDATE()
           ";
    $result = mysql_query($sql);
    if(!mysql_num_rows($result)){
        $sql = "INSERT INTO
                    ".$PREFIX."_counter
                 SET
                    date = CURDATE()
                ";
        mysql_query($sql);
    }
    $sql = "DELETE FROM
                        ".$PREFIX."_online
            WHERE
                        DATE_SUB(NOW(), INTERVAL 1 DAY) > date
           ";
    mysql_query($sql);
    $sql = "SELECT
                        ip
            FROM
                        ".$PREFIX."_online
            Where
                        ip = '".$ip."'";
    $result = mysql_query($sql);
    if (!mysql_num_rows($result)){
        $sql = "INSERT INTO
                            ".$PREFIX."_online
                            (ip,
                             date
                            )
                VALUES ('".$ip."',
                            NOW()
                            )
               ";
        mysql_query($sql);

        $sql = "UPDATE
                    ".$PREFIX."_counter
                SET
                    number = number+1
                WHERE
                    date = CURDATE()
               ";
        mysql_query($sql);
    }
    else {
        $sql = "UPDATE
                            ".$PREFIX."_online
                SET
                            date = NOW()
                WHERE
                            ip = '".$ip."'
               ";
        mysql_query($sql);
    }
?>
