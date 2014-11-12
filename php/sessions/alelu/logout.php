<?php 

session_start();
session_destroy();
$_SESSION = array();
setcookie("PHPSESSID","",time()-3600,"/"); // delete session cookie
header('Location: login.php');

?>