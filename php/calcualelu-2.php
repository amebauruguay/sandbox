<html>
	<head>
	</head>
	<body>
		<form action="?calculalo" method="get">

		<input type="text" value=""  name="que" placeholder="acs">
		<input type="submit">
		</form>	

		<?php
		$simbolos=['-','+','*'];
		$mensajes=['resta','suma','multiplicar','operacion invalida'];

			
		if(isset($_GET['que'])){   // definimos variable que
			$que=$_GET['que'];	
		}

		$largo = strlen($que); 

	    foreach ($simbolos as $simbolo){  //de decimos que el array simbolos es igual a la variable simbolo (tiene q ser un string no una array para que nos tire la posicion del simbolo buscado)
			$posicionsimbolo = strpos($que, $simbolo);
			/*echo $posicionsimbolo;*/
   			 if($posicionsimbolo>0){                              // posicion simbolo existe, osea es mayor que cero
				$primero = substr ($que, 0, $posicionsimbolo);    // que busque la cifra antes del simbolo
				/*echo $primero.'<br>';*/
				$segundo = substr ($que, $posicionsimbolo+1);     // que busque la cifra despues del simbolo
				/*echo $segundo;*/
					if($simbolo == $simbolos[0]){                 // si simbolo es igual a -, osea posicion 0 del array
						echo $primero - $segundo;                 // que reste
					} elseif ($simbolo == $simbolos[1]){
						echo $primero + $segundo;
					}elseif ($simbolo == $simbolos[2]){
						echo $primero * $segundo;
					}
			}
				
			
		}
		
								
		?>





	</body>
	

</html>

