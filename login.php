<?php
// Start the session
session_start();

// Include database connection details
require_once('connect.php');
	
// Function to throw up an error message
function errorFlag($msg) {
    $_SESSION['LOGIN_FAIL'] = $msg;
    session_write_close();
	header("location: index.php");
}

// Function to sanitize values received from the form. Prevents SQL injection
function clean($str) {
	$str = @trim($str);
	if(get_magic_quotes_gpc()) {
		$str = stripslashes($str);
	}
	return mysql_real_escape_string($str);
}
	
// Sanitize the POST values
$login = clean($_POST['login']);
$password = clean($_POST['password']);

// Input Validations
if($login == '') {
    $errmsg = 'UserID missing';
    errorFlag($errmsg);
}
if($password == '') {
    $errmsg = 'Password missing';
    errorFlag($errmsg);
}
	
// Create query
$qry="SELECT * FROM forms_users WHERE goc_login='$login' AND goc_password='".md5($password)."'";
$result=mysql_query($qry);
	
// Check whether the query was successful or not
if($result) {
	if(mysql_num_rows($result) == 1) {
		// Login Successful
		session_regenerate_id();
		$geek = mysql_fetch_assoc($result);
		$geekno = $geek['goc_number'];
		$_SESSION['SESS_SID'] = session_id();
		$_SESSION['GEEK_NUM'] = $geekno;
		$_SESSION['GEEK_NAME'] = $geek['goc_name'];
		$_SESSION['GEEK_LOGIN'] = $geek['goc_login'];
		$_SESSION['SESS_LAST_UA'] = $_SERVER['HTTP_USER_AGENT'];
		$_SESSION['SESS_LAST_IP'] = ip2long($_SERVER['REMOTE_ADDR']);
		session_write_close();
		if($geek['goc_login'] == "admin") {
			header("location: adm.php?Dir=geeks");
		} else {
			header("location: upload.php");
		}
		exit();
	}else {
		// Login failed
		$errmsg = 'incorrect username or password';
		errorFlag($errmsg);
	}
}else {
	die("Query failed");
}
?>
