<?php
error_reporting(0);
include 'inc/h.php';
$subsite_title = l36;
include 'design/header.php';
?>
<h2>Login:</h2><br>
<?php
if(!isset($_POST['submit'])){
if(trim($_POST['Username'])=='Username') {
$_POST['Username'] = '';
}
if(trim($_POST['Password'])==l37) {
$_POST['Password'] = '';
}
if (('' == $Username = trim($_POST['Username'])) OR
   ('' == $Password = trim($_POST['Password']))) {
echo l38;
   }
else {
        $sql22 = "SELECT
                        id,
						username
                FROM
                        ".$PREFIX."_user
                WHERE
                        username = '".presql(trim($_POST['Username']))."' AND
                        password = '".md5(trim($_POST['Password']))."'
               ";
    if($site_user_act == '1') { $sql22 .= "AND act = 'yes'";}
        $dbpre = $dbc->prepare($sql22);
        $dbpre->execute();
        $row22 = $dbpre->fetch(PDO::FETCH_ASSOC);
		if ($dbpre->rowCount() == 1){
			$_SESSION["id"] = $row22['id'];
			header("Location: " . $_SERVER['HTTP_REFERER']);
		}
        else{
             echo l39.
                  l40.
				  "\n".
                  l41;
        }
}
}
else {
echo l42;
}
include 'design/footer.php';
?>
