<?php

$usuarios = [['www.google.com','img/default_speaker.png','Abhijeet Mitra', 'Managing Consultant, Communication and Media', 'Wipro Technologies',],
				['www.google.com','img/default_speaker.png','Andrea Canesa', 'Managing Communication and Media', 'Wipro',],
				['www.google.com','img/default_speaker.png','Ale Lazalde', 'Managing and Media', 'Ameba',],
				['www.google.com','img/default_speaker.png','Lucia Caffa', 'Managing Media', 'Skizze',],
			]; 
?>
<!doctype html>
<html>
<head>
	<title>Arrays</title>
	<link href="basico.css" rel="stylesheet" type="text/css">
</head>
<body>
	<h1>Tuts+ Sites</h1>
	<div class="container">
		<?php 

		foreach($usuarios as $usuario) {
		 $speaker = '<div class="speaker-item span6">';
        	$speaker.='<a href="http://'.$usuario[0].'" title="'.$usuario[2].'">';
        		$speaker.='<span class="speaker-info">';
        			$speaker.='<span class="thumb">';
        				$speaker.='<img alt="'.$usuario[2].'" src="'.$usuario[1].'"/>';
        			$speaker.='</span>';
        			$speaker.='<span class="name">'.$usuario[2].'</span>';
        			$speaker.='<span class="role">'.$usuario[3].'</span>';
        			$speaker.='<strong class="company">'.$usuario[4].'</strong><i class="highlighted"></i><i class="keynote"></i></span></a>';
		$speaker.='</div><!-- End Speaker -->';
    
		echo $speaker;
		}
		// foreach($tuts_sites as $name => $url) {
		// 	echo "<li><a href='$url'>" . ucwords($name) . "+</a></li>";
		// }

		?>
	</div>
</body>
</html>