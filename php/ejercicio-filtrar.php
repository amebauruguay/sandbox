<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php 

$companias = array(
	array('nombre' => 'lemon','rubro'=>'ropa', 'descuento'=>'20%', 'descuentoActivo' => 1 ),
	array('nombre' => 'sisi','rubro'=>'ropa interior', 'descuento'=>'25%', 'descuentoActivo' => 1 ),
	array('nombre' => 'stadium','rubro'=>'zapatos', 'descuento'=>'15%', 'descuentoActivo' => 1 ),
	array('nombre' => 'tata','rubro'=>'supermercado', 'descuento'=>'0%', 'descuentoActivo' => 0 ),
	array('nombre' => 'Daniel Casin','rubro'=>'ropa', 'descuento'=>'0%', 'descuentoActivo' => 0 ),
	);

// echo '<pre>';
// print_r($companias);
// echo '</pre>';

$companiasMostrar = $companias;



///////////////////////////

if(isset($_GET['filtrar'])){

	$companiasMostrar=array();

	$filtrar=$_GET['filtrar'];

	foreach ($companias as $compania) {

		extract($compania);

		if($filtrar=='porDesc'){
			if(!$descuentoActivo){
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
			$ret[] = $cadaCompania[$itemDeComp];
		}
		return $ret;
	};

	$itemDescuento = descuento('descuentoActivo', $companias);
	print_r($itemDescuento);

	if ($itemDescuento == 0) {
		
	}else {
	
	}
 ?>

</body>
</html>