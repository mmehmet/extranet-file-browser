<?
session_start(); 
unset($_SESSION['GEEK_NUM']);
unset($_SESSION['GEEK_NAME']);
unset($_SESSION['GEEK_LOGIN']);
$_SESSION = array(); // reset session array
session_destroy();   // destroy session.
header('location:index.php');
?>
