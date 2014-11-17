<?php 
//si es el nombre usuarion no existe que te mande al login
session_start(); 
if ( !isset($_SESSION['username']) ) {
	header('Location: login.php');
}

//define los datos que aparecen en el formulario
$newName = $_SESSION['name'];
$newApellido = $_SESSION['apellido'];
$newMail = $_SESSION['mail'];
$newPassword = $_SESSION['password'];
$newPassword2 = $_SESSION['password'];

//para guardar los nuevos datos: chequea que se haya cliqueado el botón de guardar
if (isset ($_POST ['guardar'])) {

	//Convierte los datos del array post en variables independientes y usables
	extract($_POST);
	//escribe los datos del post en un formato usable para convertir luego en un array
	$datosForm = serialize($_POST);
	//validar
	if ($password==$password2){
		if (filter_var($mail, FILTER_VALIDATE_EMAIL)){
			//toma la inicial del nombre ingresado
			$username = strtolower(substr( $name, 0, 1). $apellido); 
			//Escribe una cadena a un archivo - filename es el nombre del archivo y la ruta, data es la informacion que se le pasa
			file_put_contents('users/'. $_SESSION['username'] .'.txt', $datosForm);

			$statusSingIn = 'se guardaron los cambios correctamente';
			$newName = $_POST['name'];
			$newApellido = $_POST['apellido'];
			$newMail = $_POST['mail'];
			$newPassword = $_POST['password'];
			$newPassword2 = $_POST['password2'];	
		}else{
			$statusSingIn = 'mail no valido';
		}
	}else{ 
		$statusSingIn = 'Contraseñas no coinciden';
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<h1>Hola <?php echo $newName ?></h1>
<p><a href="logout.php">Cerrar sesión!</a></p>

<div style="border:1px solid #ccc; margin:20px; padding:20px; float: left;">
	<h2>Editar datos</h2>
	<form action="" method="post">
		<label for="name">Nombre</label>
		<input name="name" value="<?php echo $newName ?>" type="text"/>
		<label for="apellido">Apellido</label>
		<input name="apellido" value="<?php echo $newApellido ?>" type="text"/>
		<label for="mail">e-mail</label>
		<input name="mail" value="<?php echo $newMail ?>" type="text"/>
		<label for="password">Nueva Contraseña</label>
		<input name="password" value="<?php echo $newPassword ?>" type="password"/>
		<label for="password2">Repita Nueva Contraseña</label>
		<input name="password2" value="<?php echo $newPassword2 ?>" type="password"/>
		<input type="submit" value="Guardar" name="guardar"/>

	<!-- si llega al else (los datos no coinciden) del if anterior imprime la variable status -->
		<?php if( isset($statusSingIn) ) : ?>
		<p><?php echo $statusSingIn; ?></p>
	<?php endif; ?>

	</form>
</div>

</body>
</html>