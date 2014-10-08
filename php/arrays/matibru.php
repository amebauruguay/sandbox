<?php 
$amitra = array('foto' => 'img/default_speaker.png','nombre' => 'Abhijeet Mitra', 'rol' => 'Managing Consultant, Communication and Media', 'compania' => 'Wipro Technologies' );
$areho = array('foto' => 'img/default_speaker.png','nombre' => 'Akseli Reho','rol' => 'CEO','compania' => 'Clothing+' );
$akahlow = array('foto' => 'img/default_speaker.png','nombre' => 'Amanda Kahlow','rol' => 'CEO and Founder','compania' => '6Sense' );
$acanessa = array('foto' => 'img/default_speaker.png','nombre' => 'Andrea Canessa','rol' => 'Director, Solutions Marketing','compania' => 'Oracle Communications' );
$akohli = array('foto' => 'img/default_speaker.png','nombre' => 'Arun Kohli','rol' => 'VP, IT, Telco Services, APAC','compania' => 'Alcatel-Lucent', );
$usuarios = [$amitra, $areho, $akahlow, $acanessa, $akohli];
?>

<!DOCTYPE html>
<html>
   <head>
      <title>Arrays y echos</title>
      <link rel="stylesheet" type="text/css" href="basico.css">
   </head>
   <body>
      <div class="container">
		<?php 
			foreach ($usuarios as $usuario) {

			$variable='<div class="speaker-item span6">';
         	$variable.='<a href="/speaker-profile/?id=88" title="View'.$usuario['nombre'].'page">';
         	$variable.='<span class="speaker-info">';
         	$variable.='<span class="thumb"><img src="'.$usuario['foto'].'" alt="'.$usuario['nombre'].'"></span>';
         	$variable.='<span class="name">'.$usuario['nombre'].'</span>';
         	$variable.='<span class="role">'.$usuario['rol'].'</span>';
         	$variable.='<strong class="company">'.$usuario['compania'].'</strong>';
         	$variable.='<i class="highlighted"></i><i class="keynote"></i>';
	        $variable.='</span></a></div>';

	        echo $variable;
			}
		?>
      </div>
   </body>
</html>

