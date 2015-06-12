<?php session_start();

 ?>
<html>
<head>
	<title>Editar</title>
</head>
<body>

<?php
include 'funcion.php';

validacion();



	

// COMENTAMOS TODA LA VALIDACION PARA PROBAR QUE FINCION DESDE UNA FUNCION CRADA EN OTRO ARCHIVO
/*if (isset($_POST['username'])) {
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
}*/

$abrir = fopen ($_SESSION['username'].'.txt','r'); // abre el .txt
$obtener = fgets ($abrir); // lee todo el archivo .txt
$datos = unserialize($obtener); // te lo convierte en un array
?>

<h1>Hola <?php echo $datos['username'] ?></h1> 

<form action ="editar.php" method="post">
	<label for="nombre">Nombre</label> 
	<input type="text" name="nombre" value="<? echo $datos['nombre'] ?>" ><br>	
	<label for="apellido">Apellido</label> 
	<input type="text" name="apellido" value="<? echo $datos['apellido'] ?>" ><br>
	<label for="username">Username</label>
	<input type="text" name="username" value="<? echo $datos['username'] ?>" ><br>
	<label for="email">Email</label>
	<input type="text" name="email" value="<? echo $datos['email'] ?>" ><br>
	<label for="contrasena">Contrasena</label>
	<input type="password" name="contrasena" value="<? echo $datos['contrasena'] ?>" ><br>	
	<label for="repit_contrasena">Repetir Contrasena</label>
	<input type="password" name="repit_contrasena" value="<? echo $datos['contrasena'] ?>" ><br>	
	<input type="submit" value="Guardar">	
</form>


</body>
</html>