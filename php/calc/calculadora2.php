<!DOCTYPE html>
<html>
<head>
	<title>Calculadora</title>
</head>
<body>

<h1></h1>
<form method="GET">
	<input type="text" name="campo1" />	
	<button type="submit" value="calcular">ENVIAR</button>
</form>

<?php 

$campoinput = "";
$operadores = array('sumar' => '+', 'restar' => '-', 'multiplicar' => '*' );

if(isset($_GET['campo1']) && $_GET['campo1']!==''){
	
	$campoinput  =  $_GET['campo1'];
	$largo = strlen($campoinput);

	for ($i=0; $i < $largo; $i++) { 
		$char = $campoinput[i];
		
		foreach ($operadores as $operador => $value) {
		$op = $char == $value;
		echo $op;
		};
		
	};
};
?>

<p></p>

</body>
</html>