<?php
error_reporting(0);
include 'inc/h.php';
$smilies = '1';
$subsite_title = l92;
include 'design/header.php';
include 'inc/check.php';
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
                     WHERE
                         id = '".presql($_SESSION['id'])."'
                    ";
            $dbpre = $dbc->prepare($sql);
            $dbpre->execute();
            $row = $dbpre->fetch(PDO::FETCH_ASSOC);
?>
<h2><?php echo l92; ?>:</h2><br>
<div class="spalte">
<?php
        if(isset($_POST['submit']) AND $_POST['submit']== l93){
	$url = presql($_POST["website"]);
	$user_website = ( substr($url, 0, 7) != 'http://' ? 'http://'.$url : $url );  
            $errors = array();
            if(!isset($_POST['Email'],
                      $_POST['Show_Email']))
                $errors = l94;
            else{
                $emails = array();
                $sql = "SELECT
                               email
                        FROM
                               ".$PREFIX."_user
                       ";
                $dbpre = $dbc->prepare($sql);
                $dbpre->execute();
                while($row = $dbpre->fetch(PDO::FETCH_ASSOC))
                    $emails[] = $row['email'];
                $sql = "SELECT
                               email
                        FROM
                               ".$PREFIX."_user
                        WHERE
                               id = '".presql($_SESSION['id'])."'
                       ";
                $dbpre = $dbc->prepare($sql);
                $dbpre->execute();
                $row = $dbpre->fetch(PDO::FETCH_ASSOC);

                if(trim($_POST['Email'])=='')
                    $errors[]= l95;
                elseif(!filter_var(trim($_POST['Email']), FILTER_VALIDATE_EMAIL))
                    $errors[]= l96;
                elseif(in_array(trim($_POST['Email']), $emails) AND trim($_POST['Email'])!= $row['email'])
                    $errors[]= l97;
                }
                if(count($errors)){
                    echo l98.
                         "<br>\n";
                    foreach($errors as $error)
                        echo $error."<br>\n";
                    echo "<br>\n".
                         "\n";
                }
                else{
                $sql = "UPDATE
                                ".$PREFIX."_user
                        SET
                                email =  '".presql(trim($_POST['Email']))."',
                                show_email = '".presql(trim($_POST['Show_Email']))."',
								firstname =  '".presql(trim($_POST['firstname']))."',
								lastname =  '".presql(trim($_POST['lastname']))."',
								website =  '".$user_website."',
								facebook =  '".presql(trim($_POST['facebook']))."',
								twitter =  '".presql(trim($_POST['twitter']))."',
								googleplus =  '".presql(trim($_POST['googleplus']))."',
								signature =  '".presql(trim($_POST['signature']))."'
                        WHERE
                                id = '".presql($_SESSION['id'])."'
                       ";
                $dbpre = $dbc->prepare($sql);
                $dbpre->execute();
                echo l99.
                     "\n";
            }
        }
?>
<form action="myprofile.php" method="post" enctype="multipart/form-data">
<table>
<tr><td><b><?php echo l79; ?></b>: </td><td>
<input type="text" name="firstname" value="<?php if (isset($row['firstname'])) { echo nocss($row['firstname']); } else { echo ''; } ?>" size="50">
</td></tr>
<tr><td><b><?php echo l80; ?></b>: </td><td>
<input type="text" name="lastname" value="<?php if (isset($row['lastname'])) { echo nocss($row['lastname']); } else { echo ''; } ?>" size="50">
</td></tr>
<tr><td><b><?php echo l81; ?></b>: </td><td>
<input type="text" name="website" value="<?php if (isset($row['website'])) { echo nocss($row['website']); } else { echo 'http://'; } ?>" size="50">
</td></tr>
<tr><td><b>Facebook (<?php echo l86; ?>)</b>: </td><td>
<input type="text" name="facebook" value="<?php if (isset($row['facebook'])) { echo nocss($row['facebook']); } else { echo 'http://facebook.com/'; } ?>" size="50">
</td></tr>
<tr><td><b>Twitter (<?php echo l86; ?>)</b>: </td><td>
<input type="text" name="twitter" value="<?php if (isset($row['twitter'])) { echo nocss($row['twitter']); } else { echo 'http://twitter.com/'; } ?>" size="50">
</td></tr>
<tr><td><b>Google+ (<?php echo l86; ?>)</b>: </td><td>
<input type="text" name="googleplus" value="<?php if (isset($row['googleplus'])) { echo nocss($row['googleplus']); } else { echo 'http://plus.google.com/'; } ?>" size="50">
</td></tr>
<tr><td><b><?php echo l100; ?></b>: </td><td>
<input type="text" name="Email" value="<?php if (isset($row['email'])) { echo nocss($row['email']); } else { echo ''; } ?>" size="50">
</td></tr>
<?php
           echo "<tr><td><b>\n".
                 "".l101."\n".
                 "</b>: </td><td>\n";
            if($row['show_email']==1){
                echo "<input type=\"radio\" name=\"Show_Email\" value=\"1\" checked> ".l102."\n";
                echo "<input type=\"radio\" name=\"Show_Email\" value=\"0\"> ".l103."\n";
            }
            else{
                echo "<input type=\"radio\" name=\"Show_Email\" value=\"1\"> ".l102."\n";
                echo "<input type=\"radio\" name=\"Show_Email\" value=\"0\" checked> ".l103."\n";
            }
?>
</td></tr>
<tr><td><b><?php echo l167; ?></b>: </td><td>
<?php
include 'inc/sbbcb.php';
?>
<textarea id="nachricht" name="signature" cols="55" rows="5"><?php if (isset($row['signature'])) { echo nocss($row['signature']); } else { echo ''; } ?></textarea></td></tr>
</table>
<input name="submit" type="submit" value="<?php echo l93; ?>">
</form>
</div>

<div class="spalte">
<?php
        if(isset($_POST['submit']) AND $_POST['submit'] == l104) {
            $errors=array();
            $sql = "SELECT
                        password
                    FROM
                        ".$PREFIX."_user
                    WHERE
                        id = '".presql($_SESSION['id'])."'
                   ";
            $dbpre = $dbc->prepare($sql);
            $dbpre->execute();
            $row = $dbpre->fetch(PDO::FETCH_ASSOC);
            if(!isset($_POST['Passwort'],
                      $_POST['Passwortwiederholung'],
                      $_POST['Altes_Passwort']))
                $errors[]= l105;
            else {
                if(trim($_POST['Passwort'])=="")
                    $errors[]= l106;
                elseif(strlen(trim($_POST['Passwort'])) < 6)
                    $errors[]= l107;
                if(trim($_POST['Passwortwiederholung'])=="")
                    $errors[]= l108;
                elseif(trim($_POST['Passwort']) != trim($_POST['Passwortwiederholung']))
                    $errors[]= l109;
                if(trim($row['password']) != md5(trim($_POST['Altes_Passwort'])))
                    $errors[]= l110;
            }
            if(count($errors)){
                echo l111.
                     "<br>\n";
                 foreach($errors as $error)
                     echo $error."<br>\n";
                 echo "<br>\n".
                      "\n";
            }
            else{
                $sql = "UPDATE
                                ".$PREFIX."_user
                        SET
                                password ='".md5(trim($_POST['Passwort']))."'
                        WHERE
                                id = '".$_SESSION['id']."'
                       ";
                $dbpre = $dbc->prepare($sql);
                $dbpre->execute();
      $auesql = "
	  SELECT
            email
        FROM
            ".$PREFIX."_user
	    WHERE id  = '".presql($_SESSION['id'])."'
	  ";
	   $aue2 = $dbc->prepare($auesql);
	   $aue2->execute();
	   while ($auerow = $aue2->fetch(PDO::FETCH_ASSOC)) {
		  $autoremail = $auerow['email'];
   }
                $from = "From: ".$site_email."\n";
$from .= "Content-Type: text/html; charset=UTF-8\n";
if($site_user_act == '1') { mail(presql(trim($autoremail)), l316,"".l317." "."<br>"."<a href=\"".$site_url."/forgotten.php\">".$site_url."/forgotten.php</a>", $from); }
                echo l112.
                     "\n";
            }
        }
?>
<table>
<form action="myprofile.php" method="post" enctype="multipart/form-data">
<tr><td><b><?php echo l113; ?></b>: </td><td>
<input type="password" name="Altes_Passwort" value="" size="20">
</td></tr>
<tr><td><b><?php echo l114; ?></b>: </td><td>
<input type="password" name="Passwort" value="" size="20">
</td></tr>
<tr><td><b><?php echo l115; ?></b>: </td><td>
<input type="password" name="Passwortwiederholung" value="" size="20">
</td></tr>
<tr><td></td><td><input name="submit" type="submit" value="<?php echo l104; ?>"><br><br></td></tr>
</form>
<tr><td>
<?php
            echo "<form ".
                 " name=\"Avatar\" ".
                 " action=\"myprofile.php\" ".
                 " method=\"post\" ".
                 " enctype=\"multipart/form-data\" ".
                 " accept-charset=\"UTF-8\">\n";
            echo "<span style=\"font-weight:bold;\" ".
                 " title=\"".l116."\">\n".
                 "".l117.":\n".
                 "</span>\n";
?>
</td><td>
<?php
        if(isset($_POST['submit']) AND $_POST['submit'] == l118) {
            $errors = array();
            switch ($_FILES['pic']['error']){
                case 1: $errors[] = l119;
                                    break;
                case 2: $errors[] = l119;
                                    break;
                case 3: $errors[] = l120;
                                    break;
                case 4: $errors[] = l121;
                                    break;
                default : break;
            }
            if(!@getimagesize($_FILES['pic']['tmp_name']))
                $errors[] = l122;
            else {
                $erlaubte_typen = array('image/pjpeg',
                                        'image/jpeg',
                                        'image/gif',
                                        'image/png'
                                       );
                if(!in_array($_FILES['pic']['type'], $erlaubte_typen))
                    $errors[] = l123;
                $erlaubte_endungen = array('jpeg',
                                           'jpg',
                                           'gif',
                                           'png'
                                          );
                $endung = strtolower(substr($_FILES['pic']['name'], strrpos($_FILES['pic']['name'], '.')+1));
                    if(!in_array($endung, $erlaubte_endungen))
                        $errors[] = l124;
                $size = getimagesize($_FILES['pic']['tmp_name']);
                    if ($size[0] > 150 OR $size[1] > 150)
                        $errors[] = l125;
            }
            if($_FILES['pic']['size'] > 0.2*1024*1024)
                $errors[] = l119;

            if(count($errors)){
                echo l126.
                     "<br>\n";
                foreach($errors as $error)
                    echo $error."<br>\n";
                echo "<br>\n".
                     "\n";
            }
            else {
                $uploaddir = 'images/avatare/';
                $Name = "IMG_".substr(microtime(),-8).".".$endung;
                if (move_uploaded_file($_FILES['pic']['tmp_name'], $uploaddir.$Name)) {
                    $sql = "UPDATE
                                    ".$PREFIX."_user
                            SET
                                    avatar = '".presql(trim($Name))."'
                            WHERE
                                    id = ".$_SESSION['id']."
                           ";
                    $dbpre = $dbc->prepare($sql);
                    $dbpre->execute();

                    echo l127.
                         "\n";
						 header("Location: " . $_SERVER['PHP_SELF']);
                }
                else {
                    echo l128.
                         "\n";
                }
            }
        }
        elseif(isset($_POST['submit']) AND $_POST['submit'] == l130){
            $sql = "SELECT
                        avatar
                    FROM
                        ".$PREFIX."_user
                    WHERE
                        id = '".$_SESSION['id']."'
                   ";
            $dbpre = $dbc->prepare($sql);
            $dbpre->execute();
            $row = $dbpre->fetch(PDO::FETCH_ASSOC);
            unlink('avatare/'.$row['Avatar']);
            $sql = "UPDATE
                        ".$PREFIX."_user
                    SET
                        avatar = ''
                    WHERE
                        id = '".$_SESSION['id']."'
                   ";
            $dbpre = $dbc->prepare($sql);
            $dbpre->execute();
            echo l129.
                 "\n";
				 header("Location: " . $_SERVER['PHP_SELF']);
        }
            if($row['avatar']=='') {
                $avatar = $site_url.'/images/icons/standard/avatar.png';
				$grav_url = "http://www.gravatar.com/avatar/".md5(strtolower(trim($row['email'])))."?d=".urlencode($avatar)."&s=150";
				echo '<img class="avatar" src="'.$grav_url.'" alt=""/><br>';
				}
            else {
                echo "<img alt=\"\" src=\"images/avatare/".htmlentities($row['avatar'], ENT_QUOTES)."\"><br>\n";
				}
            if($row['avatar']=='') {
                echo "<input class=\"normalinput3\" type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"".(0.02*1024*1024)."\">";
                echo "<input class=\"normalinput3\" name=\"pic\" type=\"file\">";
                echo "<br><input class=\"loginbuttonb\" type=\"submit\" name=\"submit\" value=\"".l118."\"><br>\n";
            }
            else {
                echo "<input class=\"loginbuttonb\" type=\"submit\" name=\"submit\" value=\"".l130."\">\n";
            echo "</form>\n";
			}
?>
</td></tr>
</table>
</div>
<?php
include 'design/footer.php';
?>
