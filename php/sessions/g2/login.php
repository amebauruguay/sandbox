<?php include 'header.php'; ?>
<form action="index.php?" method="post">
	<input type="text" name="nombre" id="">
	<input type="password" name="pass" id="">
	<input type="submit" value="enviar">
</form>

<?php 

if(isset($_GET['chau'])){$_SESSION['mensaje']='chau'; session_destroy(); setcookie("PHPSESSID","",time()-3600,"/");}
if(isset($_SESSION['mensaje'])){echo $_SESSION['mensaje'];}

include 'footer.php' 


?>
