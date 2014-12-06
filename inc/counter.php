<?php
$ip = md5($_SERVER['REMOTE_ADDR'].'wyfs');
    $sql = "SELECT
                id
            FROM
                ".$PREFIX."_counter
            WHERE
                date = CURDATE()
           ";
    $dbpre = $dbc->prepare($sql);
    $dbpre->execute();
    if($dbpre->rowCount() < 1){
        $sql = "INSERT INTO
                    ".$PREFIX."_counter
                 SET
                    date = CURDATE()
                ";
       $dbpre = $dbc->prepare($sql);
       $dbpre->execute();
    }
    $sql = "DELETE FROM
                        ".$PREFIX."_online
            WHERE
                        DATE_SUB(NOW(), INTERVAL 1 DAY) > date
           ";
    $dbpre = $dbc->prepare($sql);
    $dbpre->execute();
    $sql = "SELECT
                        ip
            FROM
                        ".$PREFIX."_online
            Where
                        ip = '".$ip."'";
    $dbpre = $dbc->prepare($sql);
    $dbpre->execute();
    if ($dbpre->rowCount() < 1){
        $sql = "INSERT INTO
                            ".$PREFIX."_online
                            (ip,
                             date
                            )
                VALUES ('".$ip."',
                            NOW()
                            )
               ";
        $dbpre = $dbc->prepare($sql);
        $dbpre->execute();

        $sql = "UPDATE
                    ".$PREFIX."_counter
                SET
                    number = number+1
                WHERE
                    date = CURDATE()
               ";
        $dbpre = $dbc->prepare($sql);
        $dbpre->execute();
    }
    else {
        $sql = "UPDATE
                            ".$PREFIX."_online
                SET
                            date = NOW()
                WHERE
                            ip = '".$ip."'
               ";
        $dbpre = $dbc->prepare($sql);
        $dbpre->execute();
    }
?>
