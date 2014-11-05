<?php 

function validate($nombre, $pass='no definido'){return (NOMBRE === $nombre && $pass === PASS);} 

function autentificacion_requerida(){
if(isset($_POST['nombre'])){
	if(!validate($_POST['nombre'],$_POST['pass'])){header('Location:login.php');}
	else{$_SESSION['mensaje']='usuario y contraseña incorrectos';}
}else{$_SESSION['mensaje']='debes estar logueado'; header('Location:login.php');}
}

?>