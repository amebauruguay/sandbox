
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {   //simplemente le decimos que si tiene datos entonces los envie al email siguiente
	if ( mail('alaxalde@ameba.com.uy', 'Email del Formulario', $_POST['message']) ) {
		$status = "Gracias por su mensaje";
	}else{$status = "no enviado";}
}
?>
<html>
<head>
<style>
form ul {margin:0; padding:0;}
form li {list-style:none; margin-bottom: 1em;}
</style>
</head>
<body>
	<h1>Formulario Contacto</h1>
	<form action="" method="post">  
		<ul>
			<li>
				<label for="name"> Nombre:</label>
				<input type="text" name="name" id="name">

			</li>
			<li>
				<label for="email"> Email:</label>
				<input type="text" name="email" id="email">

			</li>
			<li>
				<label for="name"> Comentario:</label>
				<textarea name="message" id="message"></textarea>

			</li>
		
			<li>
				<input type="submit" value="Enviar">
			</li>

		</ul>

	</form>

	<?php if(isset($status))echo $status; ?>
</body>
</html>

