<?php 
include 'header.php'; 
autentificacion_requerida();
?>
seguís logueado como: <?= $_POST['nombre'] ?>
<a href="login.php?chau">logout</a>
<?php include 'footer.php'; ?>

