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

//para tener el sigin en el mismo documento, serian dos formularios y dos if
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

<!-- PARA LOGEARSE -->
<form action="login.php" method="post">
	<label for="username">Username</label>
	<input name="username" value="" type="text"/>
	<label for="password">Password</label>
	<input name="password" value="" type="password"/>
	<input type="submit" value="Submit!" name="login"/>

<!-- si llega al else (los datos no coinciden) del if anterior imprime la variable status -->
	<?php if( isset($status) ) : ?>
	<p><?php echo $status; ?></p>
<?php endif; ?>

</form>

<!-- PARA LOGEARSE -->
<form action="login.php" method="post">
	<label for="username">Username</label>
	<input name="username" value="" type="text"/>
	<label for="password">Password</label>
	<input name="password" value="" type="password"/>
	<input type="submit" value="Submit!" name="login"/>

<!-- si llega al else (los datos no coinciden) del if anterior imprime la variable status -->
	<?php if( isset($status) ) : ?>
	<p><?php echo $status; ?></p>
<?php endif; ?>

</form>

</body>
</html>