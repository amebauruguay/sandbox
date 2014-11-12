<?php 

session_start();

define('USERNAME', 'Li');
define('PASSWORD', '123123');



?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

<form action="login.php" method="post">
	<label for="username">Username</label>
	<input name="username" value="" type="text"/>
	<label for="password">Password</label>
	<input name="password" value="" type="password"/>
	<input type="submit" value="Submit!"/>



	<?php 
	if (isset($_POST['username'])) {
		$username = $_POST ['username'];
		$password = $_POST ['password'];

		if ($username === USERNAME && $password === PASSWORD) {
		
			$_SESSION['username'] = $username;
			header("Location: index.php");
		}else{
			$status = "Please Login!";
		}
	}

	if( isset($status) ) : ?>
	<p><?php echo $status; ?></p>
<?php endif; ?>

</form>

<form action ="login.php" method="post">
	<label for="nombre">Nombre</label> 
	<input type="text" name="nombre" id="nombre"> <br>	
	<label for="apellido">Apellido</label> 
	<input type="text" name="apellido" id="apellido"> <br>	
	<label for="contrasena">Contrasena</label>
	<input type="password" name="contrasena" id="contrasena"> <br>	
	<label for="repit-contrasena">Repetir Contrasena</label>
	<input type="password" name="repit-contrasena	" id="repit-contrasena">	<br>	
	<input type="submit" value="OK">	

	<?php
	//$_POST=['nombre'=>'Lucia','apellido'=>'Caffa','password'=>'123'];
	extract($_POST);
	$n=strtolower($nombre);
	$n=trim($n);
	$n=$n[0];
	$a=strtolower($apellido);
	
	file_put_contents($n.'.'.$a.'.txt',$_POST);

	//int file_put_contents ( string $filename , mixed $data [, int $flags = 0 [, resource $context ]] )
	?>

</form>


</body>
</html>