<?php 
//funcion para chequear los datos ingresados en el formulario de registro de usuario
function comprobar_datos_ingresados(){ 

   //Convierte los datos del array post en variables independientes y usables
   extract($_POST);
    
   //escribe los datos del post en un formato usable para convertir luego en un array
   $datosForm = serialize($_POST);

   $statusSingIn ='';
//hay que preguntar si se esta dentro del sistema o no, que es la diferencia entre los dos formularios, si se esta dentro del sistema que no te valide y si no que si
   if (file_exists('users/'.$username.'.txt')) {
      //valida si el nombre de usuario existe ya
      $statusSingIn .= 'el nombre de usuario ya existe';
   }
   if (comprobar_nombre_usuario($username)===false) {
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

   return $statusSingIn;
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