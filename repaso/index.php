<?php 


$texto= 'Did you know that there are SQL and NodeJS sandboxing tools out there? It is so convenient to quickly mess around with';
$numero= '20.5';

echo '<br>Es '.$numero.' un numero?<br>';
var_dump(is_int($numero));

$numeroReal = (float)$numero;
$numeroEntero = (int)$numero;

echo '<br>es entero?<br>';
var_dump(is_int($numeroEntero));


echo '<br>es real?<br>';
var_dump(is_float($numeroReal));

echo '<br><br>';
echo $numeroReal;
echo '<br>';	
echo $numeroEntero;



 ?>