<!DOCTYPE html>
<html>
<head>
	<title>Calculadora</title>
</head>
<body>

<h1></h1>
<form method="GET">
	<input type="number" name="campo1" />	
	<input type="text" name="operador" />
	<input type="number" name="campo2" />
	<button type="submit" value="calcular">ENVIAR</button>
</form>

<?php 

$cifra1 = "";
$cifra2 = "";
$operaciones = "";
$resultado = "";

if(isset($_GET['campo1']) && $_GET['campo1']!=='' && isset($_GET['campo2']) && $_GET['campo2']!=='' && isset($_GET['operador']) && $_GET['operador']!==''){
	$cifra1 	 =  (integer)$_GET['campo1'];
	$cifra2 	 =  (integer)$_GET['campo2'];
	$operaciones =  $_GET['operador'];
	if ($operaciones == '+') {
		$resultado = $cifra1 + $cifra2;
	}elseif ($operaciones == '-') {
		$resultado = $cifra1 - $cifra2;
	}elseif ($operaciones == '*') {
		$resultado = $cifra1 * $cifra2;
	};
};
?>

<p><?php echo $resultado; ?></p>

</body>
</html>