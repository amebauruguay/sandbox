<html>
<head>
</head>

<body>

<h1>Contact Form</h1>
<form action="" method="post">
  <ul>
    <li>
      <label for="name">name: </label>
      <input type="text" name="name"/>
    </li>
    <li>
      <label for="email">email: </label>
      <input type="text" name="email"/>
    </li>
    <li>
      <label for="mensaje">mensaje: </label>
      <textarea name="mensaje"></textarea>
    </li>
    <li>
      <button type="summit">SUMMIT</button>
    </li>
  </ul>
</form>

<?php

if (!empty($_POST)) {
  //print_r($_POST);
  if (mail("lmazzilli@ameba.com.uy", "Nuevo mensaje", $_POST['mensaje'])) {
    $status = "Gracias por su mensaje";
    echo $status;
  }
}


?>

</body>

</html>