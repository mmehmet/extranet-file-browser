<?
// Check user actually logged in
require_once('auth.php');

// Include database connection details
require_once('connect.php');

$successful = false;
$errmsg = '';

// Function to sanitize values received from the form. Prevents SQL injection
function clean($str) {
    $str = @trim($str);
    if(get_magic_quotes_gpc()) {
        $str = stripslashes($str);
    }
    return mysql_real_escape_string($str);
}

/**
 * Return true if the current password entered
 * don't match the one in the database
 */
function passwordFail($login, $pwd) {
	$qry = mysql_query("SELECT * FROM forms_users WHERE goc_login = '$login'");
	$fetch = mysql_fetch_array($qry);
	return ($fetch['goc_password'] != $pwd);
}

// Update the database with the new password
function updatePassword($login, $newp) {
	$upq = "UPDATE forms_users SET goc_password='$newp' WHERE goc_login='$login'";
	return mysql_query($upq);
}

/* Check the form, change the password if good */
if(isset($_POST['upsubmit'])) {
    $curp = clean($_POST['curp']);
	$md5curp = md5($curp);
    $pass = clean($_POST['pass']);
	$md5pass = md5($pass);
    $uname = $_SESSION['GEEK_LOGIN'];

	// Disable password change for demo accounts
	if (($uname == 'mic') || ($uname == 'admin')) {
		$errmsg = "Cannot change password on this account";
	}

	// Make sure all fields were entered
	if(!$_POST['curp'] || !$_POST['pass'] || !$_POST['pass2']) {
		$errmsg = "You didn't fill in a required field.";
	}

	// Check the two new passwords match
	if($_POST['pass'] != $_POST['pass2']){
		$errmsg = 'New passwords did not match.';
	}

	// Check current password matches the one in the database
	if(passwordFail($uname, $md5curp)) {
		$errmsg = "That's not your old password.";
	}

	// if no errors update the password
	if ($errmsg == '') {
		updatePassword($uname, $md5pass);
		$successful = true;
	}
}
// Display the form
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-AU" lang="en-AU">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Expires" content="-1">
	<title>Update your Password</title>
	<link href="favicon.ico" rel="icon" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body onLoad="document.theForm.curp.focus()">
<div class="acctDiv">
    <table class="t"><tr>
        <td class="acct" width="200">Logged in as <?php echo $_SESSION['GEEK_NAME'];?></td>
        <td class="acct" width="40"><a href="logout.php">logout</a></td>
        <td class="acct" width="160"><a href="pwd.php">change password</a></td>
        <td>&nbsp;</td>
        <td class="acct" width="110"><a href="banking.php"><img src="coin.png" border="0" /> Banking</a></td>
    </tr></table>
</div>
<h1>Change your Password</h1>
<div class="msg" style="color:red">&nbsp;<?php if(!$successful) {echo $errmsg;} ?></div>
<form name="theForm" action="<? echo $HTTP_SERVER_VARS['PHP_SELF']; ?>" method="post">
<div id="login">
    <div><div class="formL">Current Password:</div><div class="formR"><input type="password" name="curp" maxlength="30" size="16"></div></div>
    <div><div class="formL">New Password:</div><div class="formR"><input type="password" name="pass" maxlength="30" size="16"></div></div>
    <div><div class="formL">Confirm Password:</div><div class="formR"><input type="password" name="pass2" maxlength="30" size="16"></div></div>
    <div class="formR" style="width:350px"><input type="submit" name="upsubmit" value="UPDATE"></div>
    <div class="fine"><a href="upload.php">return to file browser</a></div>
	<div class="msg" style="color:green"><?php if($successful){echo "password successfully changed";} ?></div>
</div>
</form>
</body>
</html>
