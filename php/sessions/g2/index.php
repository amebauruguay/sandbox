<?php 
include 'header.php'; 
if(isset($_POST['nombre']))
if(!validate($_POST['nombre'],$_POST['pass'])){header('Location:login.php');}
?>
estás logeado como: <?= $_POST['nombre'] ?>
<?php include 'footer.php'; ?>

