<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
//Start session
if (!isset($_SESSION)) {
session_start();
}
//Reset session variables
unset($_SESSION['GEEK_NUM']);
unset($_SESSION['GEEK_NAME']);
unset($_SESSION['GEEK_LOGIN']);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Expires" content="-1">
	<title>Back Office Paperwork Utility</title>
	<link href="favicon.ico" rel="icon" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body onLoad="document.loginForm.login.focus()">
<div class="msg" style="color:red">&nbsp;
<?php
if(isset($_SESSION['LOGIN_FAIL'])) {
	echo $_SESSION['LOGIN_FAIL'];
	unset($_SESSION['LOGIN_FAIL']);
}
?>
</div>
<form id="loginForm" name="loginForm" method="post" action="login.php">
<div id="login">
	<div><div class="formL">Username</div><div class="formR"><input name="login" type="text" maxlength="10" size="10" /></div></div>
	<div><div class="formL">Password</div><div class="formR"><input name="password" type="password" size="16" /></div></div>
	<div class="formR" style="width:350px"><input type="submit" name="Submit" value="Login" /></div>
	<div class="fine">create a <a href="register.php">new account</a></div>
	<div class="fine"><a href="forgotp.php">forgot password</a></div>
	<div class="fine" style="margin-bottom:25px"><a href="forgotu.php">forgot username</a></div>
</form>
<div><p>for test purposes, the following accounts have already been created:</p>
	<ul><li>admin/admin (access to all user documents)</li>
		<li>mic/password (regular user)</li></ul>
	<p>This server doesn't send emails so the "forgot password" form has been disabled</p>
</div></div>
</body>
</html>
