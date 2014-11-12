<?php 
$nombre = $apellido = $password = $checkpass = $mail = "";
$erNombre = $erApellido = $erPassword = $erCheck = $erCheckpass = $erMail = $erValid = "";
$mensajes = array();

//validacion del formulario preguntando si obtengo el nombre
if (isset($_POST ["nombre"])) {
	if (empty($_POST["nombre"])) {
		$erNombre = "Por favor ingrese su nombre correctamente";
		$mensajes[] = $erNombre;
	}
	else {
		$nombre = $_POST["nombre"];
	}

	if (empty($_POST["apellido"])) {
		$erApellido = "Por favor ingrese su apellido correctamente";
		$mensajes[] = $erApellido;
	}
	else {
		$apellido = $_POST["apellido"];
	}
	if (empty($_POST["password"])) {
		$erPassword = "Por favor ingrese su contraseña correctamente";
		$mensajes[] = $erPassword;
	}
	else {
		$password = $_POST["password"];
	}
	if ($_POST["checkpass"] !== $_POST["password"]) {
		$erCheck = "Las contraseñas no son iguales";
		$mensajes[] = $erCheck;
	}
	else {
	}
	if (empty($_POST["mail"])) {
		$erMail = "Por favor ingrese su e-mail correctamente";
		$mensajes[] = $erMail;
	}
	else {
		//validacion del email
		if(!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
		 $erValid = "Por favor ingrese un e-mail válido";
		 $mensajes[] = $erValid;
		 } else
		 {
		 $mail = $_POST["mail"];
		 }
	}
	if (empty($mensajes)) {
		//borra los espacios
		$n = trim($nombre);
		$a = trim($apellido);
		//lo hace lowercase
		$n = strtolower($n);
		$a = strtolower($a);
		$usuario = $n[0].'.'.$a;
		//print_r($_POST);
		$ruta = "admin/usuarios/";
		$ext = ".txt";
		//file_put_contents($ruta.$usuario.$ext, $_POST); opcion1
		
		$imploded = implode('\n',$_POST);
		$serialized = serialize($_POST);
		$exported_var = var_export($_POST, true);

		file_put_contents($ruta.$usuario.$ext, $imploded);
		file_put_contents($ruta.$usuario.'1'.$ext, $serialized);
		file_put_contents($ruta.$usuario.'2'.$ext, $exported_var); 
	}
} 
//validacion si recibo el usuario
elseif (isset($_POST["usuario"])) {
	# code...
}

?>