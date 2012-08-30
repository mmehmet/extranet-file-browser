<?php
//Start session
session_start();
	
if(!isset($_SESSION['GEEK_NUM']) || (trim($_SESSION['GEEK_NUM']) == '')) {
	header("location: index.php");
	//GO BACK TO THE LOGIN FORM
	exit();
}

	//SID and UA and IP Validations
$sid = session_id();
if($_SESSION['SESS_SID'] != $sid)	{
	header("location: logout.php");
	exit();
}

$prua = $_SESSION['SESS_LAST_UA'];
if($prua != $_SERVER['HTTP_USER_AGENT'])	{
	header("location: logout.php");
	exit();
}

$prip = long2ip($_SESSION['SESS_LAST_IP']);
if($prip != $_SERVER['REMOTE_ADDR'])	{
	header("location: logout.php");
	exit();
}

?>
