<?php 
//si es el nombre usuarion no existe que te mande al login
session_start(); 
if ( !isset($_SESSION['username']) ) {
	header('Location: login.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<h1>Hola <?php echo $_SESSION['username'] ?></h1>
<p><a href="logout.php">Logout!</a></p>

</body>
</html>