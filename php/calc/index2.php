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

		//recorro el string que pasaron desde la posicion 1 en adelante: +5/-3+4
		// Igonoro el caracter en la poscion 0 porque aunque sea un operador no voy a operar con él, por eso definí $charToLook = 1
		for ($charTolook=1; $charTolook < strlen($que); $charTolook++) {

			// comparo cada caracter con un operador (+,*,-,/).
			foreach ($operadores as $operacion => $operador){

				// si el caracter es un operador
			
				if($que[$charTolook]==$operador) {   // : 5 == + no, 5==* no, 5 == - no, 5==/ no, / == + no, /==* no, / == - no, /==/ SI
					

					//Guardo el número que esta antes del operador en un array
					
					// Convierto a número (integer) lo que encuentre en $que desde la posicion 0 hasta la posicion del operador encontrado
					// y lo guardo en la posición determinada dentro del array de números 
					

					if(strlen(substr($que,0,$charTolook))){

					$numeros[] = (integer)substr($que,0,$charTolook);  //  $numeros[0] = +5
					// lo guardo en $operacionGuardada en posición determinada
					$operacionGuardada[] = $operacion; // $operacionGuardada[0] = 'dividir'
					
					}
					
					// re-defino $que para buscar el siguiente operador
					$que = substr($que,$charTolook+1);  // ahora $que = -3+4 
					$poss++;  // incremento uno la posición de los arrays donde guardo la información
					$charTolook=0; // como re-definí la variable $que y le saque la pimera parte lo vuelvo a recorrer desde el principio 

				} // termina el if
		
			} // termina el foreach
		} // termina el for 

		// el último número es lo que sea que haya quedado en la variable $que
		$numeros[$poss] = (integer)$que;

		//descomentar para ver el array de operaciones
		pp($operacionGuardada, 'Operaciones: ');

		// Ahora que tenemos un array con números y un array con operaciones, vamos a hacer las cuentas
		// Esta versión de calculin no respeta la propiedad asociativa. 
		// Es decir: 5+5*2 = 10*2 = 20 cuando en realidad debería ser 50

		// variable para cambiar de operación 
		$indiceOperaciones=0;

		// por cada operacion
		foreach ($operacionGuardada as $opera){

			// descomentar para ver como va quedan el array de números
			pp($numeros, 'Números vez '.$indiceOperaciones.': ');

			// si tengo más de un número
			if(count($numeros)>1){

				// Digo que voy a hacer
				echo '<span class="operaciones">'.ucwords($opera).': '.$numeros[0].' con '.$numeros[1].'</span><hr>';

				// En cada caso ejecuto una opreacion diferente
				// guardando el resultado de la operación en la posicion 1 del array
				switch ($opera) {
					case 'sumar':
						$numeros[1] = $numeros[0]+$numeros[1];
						break;
					case 'multiplicar':
						$numeros[1] = $numeros[0]*$numeros[1];
						break;
					case 'restar':
						$numeros[1] = $numeros[0]-$numeros[1];
						break;
					case 'dividir':
						if($numeros[1]==0){$numeros[1]='Bananas';}
						else{$numeros[1] = $numeros[0]/$numeros[1];}
						break;
					default:
						$numeros[1] = 'Operación no válida...';
						break;
				}

				// En este momento en el array de números la posicion 1 tiene ahora el resultado de la primer operación
				// Elimino el elemento de la posición 0 pues ya no lo voy a usar
				array_shift($numeros);

				// cambio de operación a realizar y vuelvo a empezar
				$indiceOperaciones++;		

			}else{ 
				// Mensaje de error por su no usa ningún operador
				$numeros[0] = $que.' <br><small>no usaste ningún operador.</small>';
			}// temrina el if
			
		}// termina el foreach

		// Escribo el resultado
		$queDecir++;
		echo '<h2>'.$mensajes[$queDecir].$numeros[0].'</h2>';
		$queDecir ++;


	}// termina el  "si se envió algo..."

	// Escribo "dame algo para hacer" o "Cha Chan!" según si se envió algun dato o no
	echo $mensajes[$queDecir];

	?>
	</body>
</html>