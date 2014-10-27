<html>
<head>
</head>
<body>

	<form action="?calculalo" method="get">
		<input type="text" value=""  name="busqueda" placeholder="rubro">
		<input type="submit">
	</form>


<?php
$todo = array(
	array('nombre'=>'sisi', 'rubro'=>'lenceria', 'descuento'=>'20%'),
	array('nombre'=>'toto', 'rubro'=>'zapateria', 'descuento'=>'50%'),
	array('nombre'=>'daniel cassin', 'rubro'=>'ropa', 'descuento'=>'30%'),
	array('nombre'=>'tata', 'rubro'=>'comestibles', 'descuento'=>'20%'),
	array('nombre'=>'disco', 'rubro'=>'comestibles', 'descuento'=>'15%'),
	array('nombre'=>'estadium', 'rubro'=>'zapateria', 'descuento'=>'35%'),
	array('nombre'=>'candy sweet', 'rubro'=>'golosinas', 'descuento'=>'60%'),
);

// funcion para ver los arrays en pantalla
	function pp($arr, $titulo = ''){
		echo '<pre>'.$titulo;
		print_r($arr);
		echo '</pre><hr>';
	}

//pp($todo, $titulo = 'TABLA');

/*$rubro = filtrando ('rubro', $todo);
$nombre = filtrando ('nombre', $todo);
$descuento = filtrando ('descuento', $todo);*/

//print_r($rubro);


if(isset($_GET['busqueda'])){
			$busqueda=$_GET['busqueda'];	
		}
/*function filtrando($info, $busca){
	$encuentra = array();

	foreach ($busca as $item ) {
		$encuentra[]=$item [$info];
	}
	//pp($encuentra);
	return $encuentra;
}

$devol = filtrando ('nombre', $todo);

//echo $encuentra[5];
pp($devol);*/

foreach ($todo as $item ) {
	if($busqueda == $item['rubro']) {
		pp($item);		
	}elseif($busqueda == $item['nombre']) {
		pp($item);		
	}elseif($busqueda == $item['descuento']) {
		pp($item);		
	}
};


?>
</body>
</html>
