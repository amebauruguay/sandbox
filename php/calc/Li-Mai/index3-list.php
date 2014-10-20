<? 
    // verifico que se haya enviado algo por el formulario y no sea vacio.
	if(isset($_POST['que']) && $_POST['que']!==''){$que = $_POST['que'];}else {$que='';} 

	// funcion para ver los arrays en pantalla
	function pp($arr, $titulo = ''){
		echo '<pre>'.$titulo;
		print_r($arr);
		echo '</pre><hr>';
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Calculadora basica</title>
	<style>
		body{margin:auto; width:500px; text-align: center; font-family: sans-serif;}
		.operaciones{display: block;background: grey;margin: -5px 0;color: white;padding: 5px;}
		input[type="text"]{padding: 5px; border: 1px solid gray; width:397px;}
		input[type="submit"]{padding: 5px; border: 1px solid gray;background: none;	text-transform: uppercase;}
		input[type="submit"]:hover{color:white;background: gray;cursor: pointer;}
		</style>
</head>
<body>

	<h1>Calculin200</h1>
		<form action="?calculalo" method="post">
		<!-- uso el valor de $que para mostrar -->
		<input type="text" value="<?= $que ?>" name="que" placeholder="Ingrese su operación">
		<input type="submit" value="calcular">
	</form>
	<br>

	<?php 

	// declaro variables
	$mensajes = ['Por favor, dame algo para hacer', 'Resultado: ', 'Cha chan!'];
	// array asociativo de operaciones
	$operadores =array('sumar'=>'+','multiplicar'=>'*','restar'=>'-','dividir'=>'/');
	// indice de mensajes
	$queDecir = 0;
	// array de operaciones a ejecutar 
	$operacionGuardada = array();
	
	// si se envió algo... 
	if($que!==''){
		
		// indice para recorrer el string con la operación ($que)
		$charTolook=1;
		
		// indice para guardar los números y operaciones
		$poss=0;


		list($n1,$op,$n2) = sscanf($que,'%d %[^0-9]{1} %d');

		echo $n1.'<br>'.$op.'<br>'.$n2;

				// Digo que voy a hacer
				echo '<span class="operaciones">'.ucwords($op).': '.$n1.' con '.$n2.'</span><hr>';

				// En cada caso ejecuto una opreacion diferente
				// guardando el resultado de la operación en la posicion 1 del array
				switch ($op) {
					case '+':
						$resultado = $n1+$n2;
						break;
					case '*':
						$resultado = $n1*$n2;
						break;
					case '-':
						$resultado = $n1-$n2;
						break;
					case '/':
						if($resultado==0){$n2='Bananas';}
						else{$resultado = $n1/$n2;}
						break;
					default:
						$resultado = 'Operación no válida...';
						break;
				}	

		// Escribo el resultado
		$queDecir++;
		echo '<h2>'.$mensajes[$queDecir].$resultado.'</h2>';
		$queDecir ++;


	}// termina el  "si se envió algo..."

	// Escribo "dame algo para hacer" o "Cha Chan!" según si se envió algun dato o no
	echo $mensajes[$queDecir];

	?>
	</body>
</html>