<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

<form action ="login.php" method="post">
	<label for="nombre">Nombre</label> 
	<input type="text" name="nombre" id="nombre"> <br>	
	<label for="apellido">Apellido</label> 
	<input type="text" name="apellido" id="apellido"> <br>	
	<label for="contrasena">Contrasena</label>
	<input type="password" name="contrasena" id="contrasena"> <br>	
	<label for="repit-contrasena">Repetir Contrasena</label>
	<input type="password" name="repit-contrasena" id="repit-contrasena"><br>	
	<input type="submit" value="OK">	
</form>


<?php 

if (isset($_POST['nombre'])) {
	//el array se crea automatico con el post
	extract($_POST); // tranformamos las key en variables
	$n=strtolower($nombre); //convertimos en minusculas los caracteres
	$n=trim($n); // sacamos los espacios
	$n=$n[0];  // toma el primer caracter
	$a=strtolower($apellido); // convierte en minuscula el apellido
	
	$serialize =serialize ($_POST); // Genera una representación apta para el almacenamiento de un valor, Esto es útil para el almacenamiento de valores en PHP sin perder su tipo y estructura.

	file_put_contents($n.'.'.$a.'.txt',$serialize); //crea el archivo .txt que lo va a guardar en la carpeta donde tenemos nuestros archivos
	$username = $n.'.'.$a; // le decimos que su userename se llama igual que el archivo .txt ej (l.caffa)
	echo $username;
	/*foreach ($_POST as $key => $val) {  // para que te guarde un .txt con salto de linas (pero no funciona)
		$file= $username.'.txt'; // creamos el .txt
		$handle= fopen ($file,'a'); // te abre el archovo
		$data=$key.'=>'.$val.'/n'; // te separa los datos  y te los escribe lindo
		fwrite($handle, $data); // esribio el handle y la data
		fclose($handle); // cierra el archivo
	}*/
	//print_r($final); 
	//
	//
	}
	
?>

<form action="login.php" method="post">
	<label for="username">Username</label>
	<input name="username" value="" type="text"/>
	<label for="contrasena">Password</label>
	<input name="contrasena" value="" type="password"/>
	<input type="submit" value="Submit!"/>

	<?php 
	
	if (isset($_POST['username'])) {
		$get_user = $_POST ['username'];
		$password = $_POST ['contrasena'];
		$username = $_POST ['username'];
		$abrir = fopen ($username.'.txt','r'); // abre el .txt
		$obtener = fgets ($abrir); //lee todo el archivo .txt
		$final = unserialize($obtener); // te lo convierte en un array

		print_r($final);

		if ($password == $final['contrasena']) {
		
			$_SESSION['username'] = $username; //Es un array asociativo que contiene variables de sesión disponibles para el script actual.
			header("Location: index.php");
			
		}else{
			$status = "Please Login!";
			echo $status;
					}
	}

	?>
	

	
</form>



</body>
</html>