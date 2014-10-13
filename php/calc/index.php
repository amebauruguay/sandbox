<html>
<head>
<meta charset="UTF-8">
<meta name="description" content="Free Web tutorials">
<meta name="keywords" content="HTML,CSS,XML,JavaScript">
<meta name="author" content="Hege Refsnes">
</head>
	<body>

	<h1></h1>
		<form action="?calculalo" method="get">
		<input type="text" value="" name="que" placeholder="5*20">
		<input type="submit">
		</form>

	<?php 

	// declaro variables;
	$mensajes = ['Por favor, dame algo para hacer', 'Voy a ', 'Resultado: ', 'Gracias'];
	$operadores =array('sumar'=>'+','multiplicar'=>'*','restar'=>'-');
	$queDecir = 0;
	$operacionGuardada = 'Operación no válida...';

	// verifico que se haya enviado algo por el formulario y que sea differente de vacio
	if(isset($_GET['que']) && $_GET['que']!==''){

		// tomo la variable que me pasa por GET
		$que = $_GET['que'];
		$queDecir ++;

		$explicacion = 'Para ver que operación tengo que hacer voy a buscar en '.$que.' por cada posible operador.</br>';
		$explicacion .= 'La función: strpos() devuelve la posición de un caracter en un string</br>';
		$explicacion .= '<ul>';

		//determino que operación voy a hacer.
		foreach ($operadores as $operacion => $operador){

			$explicacion .= '<li>';
			$explicacion .= $operador.' está en la posición:'.strpos($que,$operador,1).'</br>';
			$explicacion .= '</li>';

			if(strpos($que,$operador,1)>0) {
				echo $mensajes[$queDecir].$operacion.' '.$que.'<br>';
				$explicacion .= '<small>encontre '.$operador. ' y entonces corto el foreach con un break</small>';
				
				// guardo la operación en una variable
				$operacionGuardada = $operacion;

				//Guardo los dos numeros en un array, ambos estan en $que
				// El primero esta desde la posicion 0 hasta la posicion del operador 
				$numeros[] = (integer)substr($que,0,strpos($que,$operador,1));
				// El segundo desde el operador + 1 hasta el final
				$numeros[] = (integer)substr($que,strpos($que,$operador,1)+1);
				// con (integer) al principio me aseguro de convertirlos a numeros matematicamente hablando.
				break;
			}
		}

		/* //para ver el array de numeros	
			echo '<pre>';
			print_r($numeros);
			echo '</pre>';
		*/
		switch ($operacionGuardada) {
			case 'sumar':
				$resultado = $numeros[0]+$numeros[1];
				break;
			case 'multiplicar':
				$resultado = $numeros[0]*$numeros[1];
				break;
			case 'restar':
				$resultado = $numeros[0]-$numeros[1];
				break;
			
			default:
				$resultado = 'Operación no válida...';
				break;
		}

		$explicacion .= '</ul>';

		echo $explicacion;

		$queDecir++;
		echo $mensajes[$queDecir].$resultado.'<br>';
		$queDecir ++;
	}

	echo $mensajes[$queDecir];





	?>

	</body>
</html>