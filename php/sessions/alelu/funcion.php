<?php

function validacion(){
if (isset($_POST['username'])) {
	extract($_POST); // tranformamos las key en variables
	$serialize =serialize ($_POST);
		if ($nombre ==='') {
	 		echo 'Ingrese su nombre, bobo';
	 	}else if($apellido === ''){
	 		echo 'Ingrese su apellido'; 	 		
	 	}else if ( $username ===''){
	 		echo 'ingrese un nombre de usuario';
	 	}else if (file_exists($_POST ['username'].'.txt') && $_SESSION ['username'] != $_POST['username'] ) {  // comprueba de que el archivo existe y que es mio, si existe otro que no es el mio no te permite usar ese usuario
	 		echo 'Mongo ese usuario ya existe';
	 	}else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){ // valida el email
	 		echo 'Su email no es correcto'; 	 		
	 	}else if($contrasena != $repit_contrasena){
	 		echo 'Su contrasena no es valida';
	 	}else {
	 	unlink($_SESSION['username'].'.txt'); // borrar el archivo
	 	file_put_contents($_POST['username'].'.txt', $serialize);  // crea el archivo .txt que lo va a guardar en la carpeta donde tenemos nuestros archivos
		$_SESSION ['username'] = $_POST['username']; // redefinimos la variable
		
		}
}
}

?>


// explicasion de la clase pasa para solucionar problema de validacion entre lo publico y lo privado
if (file_exists($_POST. txt){
if!isset($_session[......]){
	ya existe
}
else if($_POST ['userdname']!== $_POST['username'])
no podes cagar a otro usurario
} else (unlink ($_SESSION['username'].'.txt')
