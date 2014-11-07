<?php 

session_start();
session_destroy();
$_SESSION = array(); // vasia los datos de la sessions
setcookie("PHPSESSID","",time()-3600,"/"); // delete session cookie
header('Location: login.php'); //te manda a la pagina de logearte de nuevo

?>