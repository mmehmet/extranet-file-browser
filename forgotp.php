<?
// Include database connection details
require_once('connect.php');

$foundFlag = false;

// Function to sanitize values received from the form. Prevents SQL injection
function clean($str) {
    $str = @trim($str);
    if(get_magic_quotes_gpc()) {
        $str = stripslashes($str);
    }
    return mysql_real_escape_string($str);
}

// Check database for username, return email if found
function userFound($id) {
    $qry = mysql_query("SELECT * FROM forms_users WHERE goc_login = '$id'");
    $fetch = mysql_fetch_array($qry);
    return $fetch['goc_email'];
}

// Check the form, display message
if(isset($_POST['idsubmit'])) {
    $uname = clean($_POST['user']);
    $chkid = userFound($uname);
    if ($chkid != '') {
        $foundFlag = true;
		// SEND EMAIL CODE GOES HERE
	} else {
        $errmsg = "username not found.";
    }
}
// Display the form
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-AU" lang="en-AU">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Expires" content="-1">
	<title>Check your Username</title>
	<link href="favicon.ico" rel="icon" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body onLoad="document.chkForm.email.focus()">
<h1>Enter username to fetch password</h1>
<div class="msg" style="color:red">&nbsp;<?php if(!$foundFlag) {echo $errmsg;} ?></div>
<form name="chkForm" action="<? echo $HTTP_SERVER_VARS['PHP_SELF']; ?>" method="post">
<div id="login">
    <div><div class="formL">Username:</div><div class="formR"><input type="text" name="user" maxlength="64" size="16"></div></div>
    <div><div class="formR" style="width:350px"><input type="submit" name="idsubmit" value="CHECK"></div></div>
    <div><div class="fine"><a href="index.php">return to Login</a></div></div>
</div>
</form>
<div class="msg" style="color:green"><?php if($foundFlag) {echo "email has (not) been sent with your password to: <b>$chkid</b>";} ?></div>
</body>
</html>
