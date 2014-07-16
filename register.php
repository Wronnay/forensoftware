<?php
error_reporting(0);
include 'inc/h.php';
$subsite_title = l131;
include 'design/header.php';
  if(isset($_POST['submit']) AND $_POST['submit']== l131){
  if(isset($_POST['email']) && $_POST['email']) {
	  echo"<div class=\"fehler\">You are an SPAM-Bot!</div>";
	  }
  else {
	  $act_code = rand(1, 99999999);
        $errors = array();
            $nicknames = array();
            $emails = array();
            $sql = "SELECT
                             username,
                             email
                     FROM
                             ".$PREFIX."_user
                    ";
            $result = mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
            while($row = mysql_fetch_assoc($result)){
                     $nicknames[] = $row['username'];
                     $emails[] = $row['email'];
            }
			if(trim($_POST['Username'])=='Username') {
			$_POST['Username'] = '';
			}
			if(trim($_POST['hallo'])== l100) {
			$_POST['hallo'] = '';
			}
			if(trim($_POST['Password'])== l37) {
			$_POST['Password'] = '';
			}
			if(trim($_POST['Passwordrepeat'])== l37) {
			$_POST['Passwordrepeat'] = '';
			}
            if(trim($_POST['Username'])=='')
                $errors[]= l132;
            elseif(strlen(trim($_POST['Username'])) < 3)
                $errors[]= l133;
            elseif(!preg_match('/^\w+$/', trim($_POST['Username'])))
                $errors[]= l134;
            elseif(in_array(trim($_POST['Username']), $nicknames))
                $errors[]= l135;
            if(trim($_POST['hallo'])=='')
                $errors[]= l136;
            elseif(!filter_var(trim($_POST['hallo']), FILTER_VALIDATE_EMAIL))
                $errors[]= l137;
            elseif(in_array(trim($_POST['hallo']), $emails))
                $errors[]= l138;
            if(trim($_POST['Password'])=='')
                $errors[]= l139;
            elseif (strlen(trim($_POST['Password'])) < 6)
                $errors[]= l140;
            if(trim($_POST['Passwordrepeat'])=='')
                $errors[]= l141;
            elseif (trim($_POST['Password']) != trim($_POST['Passwordrepeat']))
                $errors[]= l142;
			if (!isset($_POST['agb']))
	        $errors[]= l143; 
        if(count($errors)){
             foreach($errors as $error)
                 echo "<div class=\"fehler\">".$error."</div>\n";
        }
        else{
            $sql = "INSERT INTO
                           ".$PREFIX."_user
                            (
                             username,
                             password,
                             registerdate,
                             email,
                             show_email,
                             act_code,
                             act
                            )
                    VALUES
                            ('".presql(trim($_POST['Username']))."',
                             '".md5(trim($_POST['Password']))."',
                             now(),
                             '".presql(trim($_POST['hallo']))."',
                             '".presql(trim($_POST['Show_Email']))."',
                             '".$act_code."',
                             'no'
                            )
                   ";
            mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
 $ID = mysql_insert_id();
 $from = "From: ".$site_email."\n";
 $from .= "Content-Type: text/html; charset=ISO-8859-15\n";
  if($site_user_act == '1') { mail(presql(trim($_POST['hallo'])), "".w141." - ".$site_title."", "".w142.":"."<br>"."<a href=\"".$site_url."/act.php?id=$ID&act_code=$act_code\">".$site_url."/act.php?id=$ID&act_code=$act_code</a>", $from); }
  echo "<div class=\"erfolg\">".l144."\n<br>".
                 "".l145."\n<br>".
                 "".l146."\n<br>".
                 "";
if($site_user_act == '1') {echo "".w130."</div>";}
else {echo "</div>";}
        }
    }
	}
        echo "<h2>".l131.":</h2><br><form ".
             " name=\"Registrieren\" ".
             " action=\"register.php\" ".
             " method=\"post\" ".
             " accept-charset=\"ISO-8859-1\">\n";
		echo '<p class="hallo"><input id="email" type="text" name="email" value="" size="60" /></p>';
        echo "<input type=\"text\" name=\"Username\" value=\"Username\" onclick=\"if(this.value && this.value==this.defaultValue)this.value=''\" size=\"20\" class=\"li\">\n";
        echo "<br>\n";
        echo "<input type=\"password\" name=\"Password\" value=\"".l37."\" onclick=\"if(this.value && this.value==this.defaultValue)this.value=''\" size=\"20\" class=\"li\"> (".l37.")\n";
        echo "<br>\n";
	    echo "<input type=\"password\" name=\"Passwordrepeat\" value=\"".l37."\" onclick=\"if(this.value && this.value==this.defaultValue)this.value=''\" size=\"20\" class=\"li\"> (".l147.")\n";
        echo "<br>\n";
		echo "<input type=\"text\" name=\"hallo\" value=\"".l100."\" onclick=\"if(this.value && this.value==this.defaultValue)this.value=''\" size=\"20\" class=\"li\">\n";
        echo "<br>\n";
	    echo "<span>\n".
             "".l101.":\n".
             "</span>\n";
        echo "<input type=\"radio\" class=\"li\" name=\"Show_Email\" value=\"1\"> ".l102."\n";
        echo "<input type=\"radio\" class=\"li\" name=\"Show_Email\" value=\"0\" checked> ".l103."<br><input class=\"li\" type=\"checkbox\" name=\"agb\" /> ".l148."<br>\n";
        echo "<input type=\"submit\" name=\"submit\" value=\"".l131."\" class=\"lb\"> \n";
		echo "<input class=\"lb\" type=\"reset\" value=\"".l149."\">\n";
        echo "</form>\n";
include 'design/footer.php';
?>
