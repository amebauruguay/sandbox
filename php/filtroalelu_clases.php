<html>
<head>
</head>
<body>

	<form action="?calculalo" method="get">
		<input type="text" value=""  name="busqueda" placeholder="rubro">
		<input type="submit">
	</form>


<?php

//definimos una clase para las empresas ya que todas tienen la misma estructura

class empresa{
	public $nombre;
	public $rubro;
	public $descuento;

	public function __construct($n,$r,$d){
		$this->nombre=$n;
		$this->rubro=$r;
		$this->descuento=$d;

	}
}

$sisi = new empresa ('sisi','lenceria','20%');
$toto = new empresa ('toto','zapateria','50%');
$danielcassin = new empresa ('daniel cassin','ropa','30%');
$tata = new empresa ('tata','comestibles','20%');
$disco = new empresa ('disco','comestibles','15%');
$stadium = new empresa ('stadium','zapateria','35%');
$candy = new empresa ('candy sweet','golosinas','60%');


$todo = array($sisi, $toto, $danielcassin, $tata, $disco, $stadium, $candy);



echo $sisi->nombre;





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
	if($busqueda == $item->rubro) {
		pp($item);		
	}elseif($busqueda == $item->nombre) {
		pp($item);		
	}elseif($busqueda == $item->descuento) {
		pp($item);		
	}
};


?>
</body>
</html>
