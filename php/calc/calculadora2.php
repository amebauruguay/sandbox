<<<<<<< HEAD
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
	
	$campoinput  =  $_GET['campo1'];  //23+36
	$largo = strlen($campoinput);  //5

	for ($i=1; $i < $largo; $i++) {   
		$char = $campoinput[$i];    // +  
		
		foreach ($operadores as $operador => $value) {

			//echo 'con $i='.$i.' tengo>'.$char.'=='.$value.'<br>';

			if ($char == $value) {   // + = +
				$primero= substr ($campoinput , 0, $i);
				$segundo= substr ($campoinput , $i+1, $largo);

				if ($value == '+') {
					echo $primero + $segundo;

				}elseif ($value == '-') {   // - = -
					echo $primero - $segundo;

				}elseif ($value == '*') {   // * = *
					echo $primero * $segundo;
				};

			$i= $largo;
			};
		};
		
	};
};
?>

</body>
</html>
=======
>>>>>>> origin/master
