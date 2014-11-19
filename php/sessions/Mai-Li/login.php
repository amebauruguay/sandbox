<?php 

session_start();

//para Registrarse: chequea que se haya cliqueado el botón de sign in
if (isset ($_POST ['signin'])) {

	//Convierte los datos del array post en variables independientes y usables
	extract($_POST);
	//escribe los datos del post en un formato usable para convertir luego en un array
	$datosForm = serialize($_POST);
	//validar
	
	$statusSingIn ='';

	if (file_exists('users/'.$_POST ['username'].'.txt')) {
	 	//valida si el nombre de usuario existe ya
	  	$statusSingIn .= 'el nombre de usuario ya existe';
	}
	if ($password!=$password2){
		$statusSingIn .= '<br/> Contraseñas no coinciden';
	}
	if (!filter_var($mail, FILTER_VALIDATE_EMAIL)){
		//toma la inicial del nombre ingresado
		//$username = strtolower(substr( $name, 0, 1). $apellido); 
		$statusSingIn .= '<br/> Mail no valido';
	}
	if ($statusSingIn=='') {
		//Escribe una cadena a un archivo - filename es el nombre del archivo y la ruta, data es la informacion que se le pasa
		file_put_contents('users/'. $username .'.txt', $datosForm);
		$statusSingIn .= 'Se registro correctamente';
	}
}

//busca el archivo en la carpeta users con el nombre que se haya ingresado

//abre el archivo y chequea si la contrasena coincide con la ingresada


// PARA LOGEARSE: si el campo login existe. para identificar cual formulario esta mandando
if (isset ($_POST ['login'])) {
	//buscar el archivo y lo abre
	$archivoAbrierto = fopen('users/'.$_POST ['username'].'.txt', 'r');
	//lee la linea de datos del archivo
	$linea = fgets($archivoAbrierto);
	//convierte los datos del archivo en un array
	$arrayDatos = unserialize($linea);
	
	//si el password ingresado coincide con el password del archivo
	if ($_POST ['password'] == $arrayDatos['password']) {
		//pasarle la variable a la session y redirecciona al index.php
		$_SESSION['username'] = $_POST ['username'];
		$_SESSION['name'] = $arrayDatos['name'];
		$_SESSION['apellido'] = $arrayDatos['apellido'];
		$_SESSION['mail'] = $arrayDatos['mail'];
		$_SESSION['password'] = $arrayDatos['password'];
		header("Location: index.php");
	}else{
		//define la variable para pasar el mensaje de 'error'
		$status = "Datos incorrectos!!!!";
	}

	//si las variables coinsiden con los datos definidos en la db
	//if ($username === USERNAME && $password === PASSWORD) {
		//pasarle la variable a la session y redirecciona al index.php
	//	$_SESSION['username'] = $username;
	//	header("Location: index.php");
	//else{
		//define la variable para pasar el mensaje de 'error'
		//$status = "Datos incorrectos!!!!";
	//}
}
	

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>

<!-- PARA LOGEARSE -->
<div style="border:1px solid #ccc; margin:20px; padding:20px; float: left;">
	<h2>Ingresar</h2>
	<form action="login.php" method="post">
		<label for="username">Username</label>
		<input name="username" value="" type="text"/>
		<label for="password">Password</label>
		<input name="password" value="" type="password"/>
		<input type="submit" value="Ingresar" name="login"/>

	<!-- si llega al else (los datos no coinciden) del if anterior imprime la variable status -->
		<?php if( isset($status) ) : ?>
		<p><?php echo $status; ?></p>
	<?php endif; ?>

	</form>
</div>

<!-- PARA INSCRIBIRSE -->
<div style="border:1px solid #ccc; margin:20px; padding:20px; float: left;">
	<h2>Registrarse</h2>
	<form action="login.php" method="post">
		<label for="name">Nombre</label>
		<input name="name" value="" type="text"/>
		<label for="apellido">Apellido</label>
		<input name="apellido" value="" type="text"/>
		<label for="mail">e-mail</label>
		<input name="mail" value="" type="text"/>
		<label for="username">Nombre de usuario</label>
		<input name="username" value="" type="text"/>
		<label for="password">Password</label>
		<input name="password" value="" type="password"/>
		<label for="password2">Repita el Password</label>
		<input name="password2" value="" type="password"/>
		<input type="submit" value="Registrarse" name="signin"/>

	<!-- si llega al else (las contraseñas coinciden) imprime la variable statusSingIn -->
		<?php if( isset($statusSingIn) ) : ?>
		<p><?php echo $statusSingIn; ?></p>
	<?php endif; ?>

	</form>
</div>

</body>

<!-- crear un campo usuario: 
preguntar si el usuario existe y si existe, que use otro usuario 
mandar por mail el usuario y contraseña
que fucnionen los tildes y mayusculas 
que pasa si los usuarios escriben dos apellidos/apellidos compuestos
fun. para corregir tildes y carateres raros-->

</html>