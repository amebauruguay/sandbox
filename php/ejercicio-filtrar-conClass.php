<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php

class empresa{
	public $nombre;
	public $rubro;
	public $descuento;

	public function __construct($n, $r, $d){
		$this->nombre = $n;
		$this->rubro = $r;
		$this->descuento = $d;
	}
}

$tata = new empresa('Tata','supermercado','15%');
$lemon = new empresa('Lemon','ropa','25%');
$stadium = new empresa('Stadium','zapatos','20%');
$daniel = new empresa('Daniel Casin','ropa',0);
$sisi = new empresa('Sisi','ropa interior',0);

$companias = array(	$tata,$lemon,$stadium,$daniel,$sisi);

$companiasMostrar = $companias;



///////////////////////////

if(isset($_GET['filtrar'])){ // isset es la forma de preguntar si la variable esta definida

	$companiasMostrar=array();

	$filtrar=$_GET['filtrar'];

	foreach ($companias as $compania) {


		//extract($compania); ahora es un obj


		if($filtrar=='porDesc'){
			if($compania->descuento){
				$companiasMostrar[]=$compania;
			}
		}

	}

//////////////////////////
}

?>
<table>
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Rubro</th>
			<th>Descuento</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($companiasMostrar as $compania) {
			$table = '<tr>';
			foreach ($compania as $item => $value) {
				$table .= '<td>';
				$table .= $value;
				$table .= '</td>';
			};
			$table .= '</tr>';
			echo $table;
		};
		
		?>
	</tbody>
</table>
<label>Con Descuento<input unchecked="" type="checkbox" value="<?= $descuentoActivo ?>" name="conDescuento" /></label>

<?php 

	function descuento($itemDeComp, $arr) {
		$ret = array();
		foreach ($arr as $cadaCompania) {
			$ret[] = $cadaCompania->$itemDeComp;
		}
		return $ret;
	};

	$itemDescuento = descuento('descuento', $companias);
	print_r($itemDescuento);

	if ($itemDescuento == 0) {
		
	}else {
	
	}
 ?>

</body>
</html>