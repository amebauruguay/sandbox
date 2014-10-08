  <?php
  $nombre = array('Juan','Pedro','Luis', );
  $rol = array('Vendedor','Piloto','Obrero', );
  $empresa = array('ATR','POP','MAM', );
  $foto= array ('img/default_speaker.png','img/default_speaker.png','img/default_speaker.png' );
 // $id = array('/speaker-profile/?id=62','/speaker-profile/?id=86','/speaker-profile/?id=58', );

 $div='';

//echo $nombre[0].' - '.$rol[0].' ,'.$empresa[0];
  ?>
  <html>
<head>
    <title>Arrays</title>
</head>
<body>
<ul>
<li>
 <?php
  for ($i = 0; $i<3; $i++){
  $div= '<p>'. $nombre[$i].'</p>';
  $div.= '<p>'. $rol[$i].'</p>';
  $div.= '<p>'. $empresa[$i].'</p>';
  $div.= '<img src="'. $foto[$i].'" alt="Abhijeet Mitra">';

  $div.='</div>';  
  echo $div;}

    ?>
</li>
</ul>
</body>
</html>



 