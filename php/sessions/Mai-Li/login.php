<?php 

session_start();

define('USERNAME', 'Li');
define('PASSWORD', '123123');


// PARA LOGEARSE: si el campo login existe. para identificar cual formulario esta mandando
if (isset ($_POST ['login'])) {
	//define las variables que son los input de username y password
	$username = $_POST ['username'];
	$password = $_POST ['password'];

//si las variables coinsiden con los datos definidos en la db
	if ($username === USERNAME && $password === PASSWORD) {
		//pasarle la variable a la session y redirecciona al index.php
		$_SESSION['username'] = $username;
		header("Location: index.php");
	}else{
		//define la variable para pasar el mensaje de 'error'
		$status = "Please Login!";
	}
}

//para Registrarse: chequea que se haya cliqueado el botón de sign in
if (isset ($_POST ['signin'])) {
	//Convierte los datos del array post en variables independientes y usables
	extract($_POST);
	//Escribe una cadena a un archivo - filename es el nombre del archivo y la ruta, data es la informacion que se le pasa
	file_put_contents('users/jcarlos.txt', $_POST)


	//$nuevoUsuario = 'jcarlos.txt';
	// Abre el fichero para obtener el contenido existente
	//$actual = file_get_contents($nuevoUsuario);
	// Escribe el contenido al fichero
	//file_put_contents($nuevoUsuario, $actual);
	//}
?>

<!DOCTYPE html>
<html>
<head>
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
		<label for="password">Password</label>
		<input name="password" value="" type="password"/>
		<label for="password2">Repita el Password</label>
		<input name="password2" value="" type="password"/>
		<input type="submit" value="Registrarse" name="signin"/>
	</form>
</div>

</body>
</html>