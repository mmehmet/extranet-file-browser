<?
// Start the session
session_start();

// Include database connection details
require_once('connect.php');

// Function to sanitize values received from the form. Prevents SQL injection
function clean($str) {
    $str = @trim($str);
    if(get_magic_quotes_gpc()) {
        $str = stripslashes($str);
    }
    return mysql_real_escape_string($str);
}

// Throw up an error message
function errorFlag($msg) {
    $_SESSION['LOGIN_FAIL'] = $msg;
    session_write_close();
    echo "<meta http-equiv=\"Refresh\" content=\"0;url=$HTTP_SERVER_VARS[PHP_SELF]\">";
}

/**
 * Return true if the username has been taken
 * by another user, false otherwise.
 */
function usernameTaken($login) {
	$qry = "SELECT * FROM forms_users WHERE goc_login = '$login'";
	$result = mysql_query($qry);
	return (mysql_num_rows($result) > 0);
}

// Check database for email address, return username if found
function emailTaken($eml) {
    $qry = mysql_query("SELECT * FROM forms_users WHERE goc_email = '$eml'");
    $fetch = mysql_fetch_array($qry);
    return $fetch['goc_login'];
}

// Check database for employee number, return username if found
function geeknumTaken($empnum) {
    $qry = mysql_query("SELECT * FROM forms_users WHERE goc_number = '$empnum'");
    $fetch = mysql_fetch_array($qry);
    return $fetch['goc_login'];
}

/**
 * Inserts the provided details into the database.
 * Returns true on success, false otherwise.
 */
function addNewUser($login, $password, $name, $email, $geeknum){
	$addq = "INSERT INTO forms_users VALUES ('$login', '$password', '$name', '$email', '$geeknum')";
	return mysql_query($addq);
}

/**
 * If successful registration, create work directories
 * and then take user to file browser
 */
if(isset($_SESSION['registered'])) {
	$ulogin = $_SESSION['regulogin'];
	$jsd = "$ulogin/jobsheets";
	$ind = "$ulogin/invoices";
	$bkd = "$ulogin/banking";
	$pmd = "$ulogin/payments";
	if($_SESSION['regresult']) {
		mkdir($ulogin);
		exec("cd geeks; ln -s ../$ulogin .");
		mkdir($jsd);
		mkdir($ind);
		mkdir($bkd);
		mkdir($pmd);
		chdir($jsd);
		exec("ln -s ../../display.xsl .");
		$_SESSION['SESS_SID'] = session_id();
		$_SESSION['GEEK_LOGIN'] = $ulogin;
		$_SESSION['GEEK_NUM'] = $_SESSION['regunum'];
		$_SESSION['GEEK_NAME'] = $_SESSION['reguname'];
		$_SESSION['SESS_LAST_UA'] = $_SERVER['HTTP_USER_AGENT'];
		$_SESSION['SESS_LAST_IP'] = ip2long($_SERVER['REMOTE_ADDR']);
		unset($_SESSION['regulogin']);
		unset($_SESSION['regunum']);
		unset($_SESSION['reguname']);
		unset($_SESSION['registered']);
		unset($_SESSION['regresult']);
		header("location:upload.php");
	}
	return;
}

/**
 * Determines whether or not to show the sign-up form
 * based on whether the form has been submitted, If it
 * has, check the database for consistency and create
 * the new account.
 */
if(isset($_POST['regsubmit'])) {
    $addr = clean($_POST['email']);
    $pass = clean($_POST['pass']);
	$md5pass = md5($pass);
	$uname = clean($_POST['user']);
	$geekno = clean($_POST['num']);
	$geekname = clean($_POST['name']);

	// Make sure all fields were entered
	if(!$_POST['user'] || !$_POST['pass'] || !$_POST['pass2'] || !$_POST['name'] || !$_POST['email'] || !$_POST['num']) {
		$errmsg = 'You didn\'t fill in a required field.';
        return(errorFlag($errmsg));
	}

	// Check the two passwords match
	if($_POST['pass'] != $_POST['pass2']){
		$errmsg = 'Passwords did not match.';
        return(errorFlag($errmsg));
	}

    // check email
    if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $addr)) {
        $errmsg = "$addr doesn't look like a valid email address.";
        return(errorFlag($errmsg));
    }

    // Check if email is already in use
    $chkmail = emailTaken($addr);
	if ($chkmail != '') {
        $errmsg = "That email is already registered with the username: <b>$chkmail</b>";
		return(errorFlag($errmsg));
    }

	// Check if username is already in use
	if (usernameTaken($uname)) {
		$errmsg = "The username <strong>$uname</strong> is already taken.";
        return(errorFlag($errmsg));
	}

	// Check employee number
	if (($geekno < 1) || ($geekno > 99)) {
		$errmsg = "$geekno Invalid employee number.";
		return(errorFlag($errmsg));
	}
	$chknum = geeknumTaken($geekno);
	if ($chknum != '') {
		$errmsg = "Employee number already registered with username: <b>$chknum</b>";
        return(errorFlag($errmsg));
	}

	// Add the new account to the database
    $_SESSION['regulogin'] = $uname;
    $_SESSION['regunum'] = $geekno;
	$_SESSION['reguname'] = $geekname;
	$_SESSION['regresult'] = addNewUser($uname, $md5pass, $geekname, $addr, $geekno);
	$_SESSION['registered'] = true;
	echo "<meta http-equiv=\"Refresh\" content=\"0;url=$HTTP_SERVER_VARS[PHP_SELF]\">";
	return;
} else {
	/* Display the signup form */
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-AU" lang="en-AU">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Expires" content="-1">
	<title>Registration Page</title>
	<link href="favicon.ico" rel="icon" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body onLoad="document.theForm.user.focus()">
<h1>Create a new account</h1>
<div class="msg" style="color:red">&nbsp;
<?php
if(isset($_SESSION['LOGIN_FAIL'])) {
        echo $_SESSION['LOGIN_FAIL'];
        unset($_SESSION['LOGIN_FAIL']);
}
?>
</div>
<form name="theForm" action="<? echo $HTTP_SERVER_VARS['PHP_SELF']; ?>" method="post">
<div id="login">
	<div><div class="formL">Username:</div><div class="formR"><input type="text" name="user" maxlength="10" size="10"></div></div>
	<div><div class="formL">Full Name:</div><div class="formR"><input type="text" name="name" maxlength="64" size="16"></div></div>
	<div><div class="formL">Email:</div><div class="formR"><input type="text" name="email" maxlength="64" size="16"></div></div>
    <div><div class="formL">Employee Number:</div><div class="formR"><input type="text" name="num" maxlength="3" size="2"></div></div>
    <div><div class="formL">Password:</div><div class="formR"><input type="password" name="pass" maxlength="30" size="10"></div></div>
    <div><div class="formL">Confirm Password:</div><div class="formR"><input type="password" name="pass2" maxlength="30" size="10"></div></div>
    <div class="formR"><input type="submit" name="regsubmit" value="REGISTER"></div>
    <div class="fine"><a href="index.php">back to login</a></div>
</div>
</form>
</body>
</html>
<?
}
?>
