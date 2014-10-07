<?php
$tuts_sites = array ('nettuts+','psdtuts+', 'march','wptuts+');
$tuts_sites = array ['nettuts+','psdtuts+', 'march','wptuts+'];


?>
<html>
	<head>
		<title>Arrays</title>
	</head>
	<body>
		<h1>Arrays</h1>
		<ul>
			<?php foreach($tuts_sites as $site){
				echo"<li>$site</li>"
			}
			?>
		</ul>
	</body>
</html>
