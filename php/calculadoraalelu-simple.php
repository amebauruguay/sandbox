
		<form action="?calculalo" method="get">

		<input type="text" value=""  name="que" placeholder="acs">
		<input type="submit">
		</form>	

		<?php
		$simbolos=['-','+','*'];

		  if(isset($_GET['que'])){
			$que=$_GET['que'];	
		}   
		
		
		  list($numuno, $oper, $numdos) = sscanf($que,'%d %[^0-9] %d');    
		    
	                                 
				foreach ($simbolos as $operacion) { 					
					if ($oper==$operacion){	
						if($oper==$simbolos[0]){							
							echo $numuno - $numdos;
						}elseif($oper==$simbolos[1]){								                  
							echo $numuno + $numdos;
						}elseif($oper==$simbolos[2]){													                  
							echo $numuno * $numdos;
						}
																
					}

				}
		
						
		?>
	</body>
	

</html>

