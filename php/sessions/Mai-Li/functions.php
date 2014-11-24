<?php 
//funcion para chequear los datos ingresados en el formulario de registro de usuario
function comprobar_datos_ingresados(){ 
   //para Registrarse: chequea que se haya cliqueado el botón de sign in
      //Convierte los datos del array post en variables independientes y usables
      extract($_POST);
      //escribe los datos del post en un formato usable para convertir luego en un array
      $datosForm = serialize($_POST);
      //validar
      
      $statusSingIn ='';

      if (file_exists('users/'.$_POST ['username'].'.txt')) {
         //valida si el nombre de usuario existe ya
         $statusSingIn .= 'el nombre de usuario ya existe';
      }
      if (comprobar_nombre_usuario($username)== false) {
         $statusSingIn .= 'usuario no válido';
      }
      if ($password!=$password2){
         $statusSingIn .= '<br/> Contraseñas no coinciden';
      }
      if (!filter_var($mail, FILTER_VALIDATE_EMAIL)){
         //toma la inicial del nombre ingresado
         //$username = strtolower(substr( $name, 0, 1). $apellido); 
         $statusSingIn .= '<br/> Mail no valido';
      }
      if ($statusSingIn=='') {
         //Escribe una cadena a un archivo - filename es el nombre del archivo y la ruta, data es la informacion que se le pasa
         file_put_contents('users/'. $username .'.txt', $datosForm);
         $statusSingIn = 'Se registro correctamente,';
         //enviar nombre de usuario y contraseña por al mail.
         if (mail($mail, "Usuario y contraseña", $datosForm)) {
            $statusSingIn .= '<br/>y su usuario y contraseña se han enviado a su mail';
         }else{
            $statusSingIn .= '<br/>pero ha habido un error al enviar el mail';
         }
      }

      return true;
}

//funcion para chequear si el nombre de usuario tiene caracteres validos o no
function comprobar_nombre_usuario($nombre_usuario){ 
   //compruebo que el tamaño del string sea válido. 
   if (strlen($nombre_usuario)<3 || strlen($nombre_usuario)>20){ 
      return false; 
   } 

   //compruebo que los caracteres sean los permitidos 
   $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_"; 
   for ($i=0; $i<strlen($nombre_usuario); $i++){ 
      if (strpos($permitidos, substr($nombre_usuario,$i,1))===false){ 
         return false; 
      } 
   } 
   //echo $nombre_usuario; 
   return true; 
}
?>