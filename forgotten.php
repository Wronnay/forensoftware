<?php
error_reporting(0);
include 'inc/h.php';
$subsite_title = l3;
include 'design/header.php';
    if(isset($_POST['submit']) AND $_POST['submit']==l4){
        $errors = array();
        if(!isset($_POST['username']))
            $errors[] = l5;
        else{
            if(trim($_POST['username']) == "")
                $errors[] = l6;
            $sql = "SELECT
                        email
                    FROM
                        ".$PREFIX."_user
                    WHERE
                        username = '".presql(trim($_POST['username']))."'
                        ";
            $dbpre = $dbc->prepare($sql);
            $dbpre->execute();
            $row = $dbpre->fetch(PDO::FETCH_ASSOC);
            if(!$row)
                $errors[] = l7;
        }
        if(count($errors)){
            echo l8.
                 "<br>\n";
            foreach($errors as $error)
                echo $error."<br>\n";
            echo "<br>\n";
            echo l9;
        }
        else {
            $passwort = substr(md5(microtime()),0,8);
            $sql = "UPDATE
                        ".$PREFIX."_user
                    SET
                        password = '".md5(trim($passwort))."'
                    WHERE
                        username = '".presql(trim($_POST['username']))."'
                   ";
            $dbpre1 = $dbc->prepare($sql);
            $dbpre1->execute();
            $empfaenger = nocss($row['email']);
            $titel = l10;
            $mailbody = l11.
                        $passwort."\n\n".
                        l12;
            if(@mail($empfaenger, $titel, $mailbody)){
                echo l13.
                     l14;
            }
            else{
                echo l15.
                     l16;
            }
        }
    }
    else{
            echo "<form ".
                 " name=\"Passwort\" ".
                 " action=\"".$_SERVER['PHP_SELF']."\" ".
                 " method=\"post\" ".
                 " accept-charset=\"ISO-8859-1\">\n";
            echo "Username :\n";
            echo "<input type=\"text\" name=\"username\" maxlength=\"32\">\n";
            echo "<br>\n";
            echo "<input type=\"submit\" name=\"submit\" value=\"".l4."\">\n";
            echo "</form>\n";
    }
include 'design/footer.php';
?>
