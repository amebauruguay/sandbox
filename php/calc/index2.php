<? if(isset($_POST['que']) && $_POST['que']!==''){$que = $_POST['que'];}else {$que='';} ?>

<html>
<head>
<meta charset="UTF-8">
<meta name="description" content="Free Web tutorials">
<meta name="keywords" content="HTML,CSS,XML,JavaScript">
<meta name="author" content="Hege Refsnes">
</head>
	<body>

	<h1></h1>
		<form action="?calculalo" method="post">
		<input type="text" value="<?= $que ?>" name="que" placeholder="">
		<input type="submit">
		</form>

	<?php 

	// declaro variables;
	$mensajes = ['Por favor, dame algo para hacer', 'Voy a ', 'Resultado: ', 'Cha chan!'];
	$operadores =array('sumar'=>'+','multiplicar'=>'*','restar'=>'-','dividir'=>'/');
	$queDecir = 0;
	$operacionGuardada[] = 'Operación no válida...';

	// verifico que se haya enviado algo por el formulario y que sea differente de vacio
	if(isset($_POST['que']) && $_POST['que']!==''){

		// tomo la variable que me pasa por GET
		$que = $_POST['que'];
		$queDecir ++;
		$charTolook=1;
		$poss=0;

		//recorro el string que pasaron desde la posicion 1 en adelante: +5/-3+4
		for ($charTolook=1; $charTolook < strlen($que); $charTolook++) {

			// comparo cada caracter con un simbolo pero ignoro el primer caracter porque no voy a operar con el
			foreach ($operadores as $operacion => $operador){

			if($que[$charTolook]==$operador) {   // 5 == +, 5==*, 5 == -, 5==/, / == +, /==*, / == -, /==/ Si
				
				// guardo la operación en una variable
				$operacionGuardada[$poss] = $operacion; // 'dividir'

				//Guardo los dos numeros en un array, ambos estan en $que
				// El primero esta desde la posicion 0 hasta la posicion del operador 
				$numeros[$poss] = (integer)substr($que,0,$charTolook);  //  $numeros[0] = +5
				// re-defino donde buscar a todo lo que sigue 
				$que = substr($que,$charTolook+1);  // ahora $que vale -3+4
				// con (integer) al principio me aseguro de convertirlos a numeros matematicamente hablando.
				$poss++;
				$charTolook=0;

			}
		}

			
		}

		$numeros[$poss] = (integer)$que;

		 /*//para ver el array de numeros	
			echo '<pre>';
			print_r($numeros);
			echo '</pre>';
		 //para ver el array de operaciones	
			echo '<pre>';
			print_r($operacionGuardada);
			echo '</pre>';
		 */

		$indiceOperaciones=0;

		foreach ($operacionGuardada as $opera){
			if(count($numeros)>1){
				echo $opera.': '.$numeros[0].' con '.$numeros[1].'</br>';

				switch ($opera) {
					case 'sumar':
						$numeros[0] = $numeros[0]+$numeros[1];
						break;
					case 'multiplicar':
						$numeros[0] = $numeros[0]*$numeros[1];
						break;
					case 'restar':
						$numeros[0] = $numeros[0]-$numeros[1];
						break;
					case 'dividir':
						if($numeros[1]==0){$numeros[0]='Bananas';}
						else{$numeros[0] = $numeros[0]/$numeros[1];}
						break;
					
					default:
						$numeros[0] = 'Operación no válida...';
						break;
				}
				$numeros[1] = array_pop($numeros);
				$indiceOperaciones++;
			}else{ $numeros[0] = $que.' porque no usaste ningún operador.';}
			
		}

		$queDecir++;
		echo '<br><h2>'.$mensajes[$queDecir].$numeros[0].'</h2>';
		$queDecir ++;
	}

	echo $mensajes[$queDecir];





	?>

	</body>
</html>