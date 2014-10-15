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

		
		if(isset($_GET['que'])){
			$que=$_GET['que'];	
		}

		$largo = strlen($que);                              
  
	    for($i=0; $i<$largo;$i++){                          
			$char=$que[$i];                                    
				foreach ($simbolos as $operacion) {          
					/*echo"$char==$operacion</br>";*/
					if ($char==$operacion){
						/*echo 'wooow!</br></br>';*/

						if($char==$simbolos[0]){
							/*echo $mensajes[0];*/
							$primero= substr ($que , 0, $i); //busca los caracteres antes del simbolo'-'en este caso
							/*echo $primero; */                  // lo escupe
							$segundo= substr ($que, $i+1, $largo); // busca los caracteres despues del simbolo -
							/*echo $segundo;  */                        // lo escupe
							echo $primero - $segundo;


						}elseif($char==$simbolos[1]){
							$primero= substr ($que , 0, $i); 							            
							$segundo= substr ($que, $i+1, $largo); 							                  
							echo $primero + $segundo;

						}elseif($char==$simbolos[2]){
							$primero= substr ($que , 0, $i); 							            
							$segundo= substr ($que, $i+1, $largo); 							                  
							echo $primero * $segundo;
						}

																
					}

				}
		}
						
		?>
	</body>
	

</html>

