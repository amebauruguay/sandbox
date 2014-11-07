<?php 

session_start();

define('USERNAME', 'Li');
define('PASSWORD', '123123');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$username = $_POST ['username'];
	$password = $_POST ['password'];

	if ($username === USERNAME && $password === PASSWORD) {
		
		$_SESSION['username'] = $username;
		header("Location: index.php");
	}else{
		$status = "Please Login!";
	}
}

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

	<?php if( isset($status) ) : ?>
	<p><?php echo $status; ?></p>
<?php endif; ?>

</form>

</body>
</html>