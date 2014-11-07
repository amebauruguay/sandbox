<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
    </head>
    <body>
    	<div style="width:50%; float:left;">
    	<h1>Ingresa al sitio</h1>
    	<form action="admin/check.php" method="post">
        	<label for="usuario">Usuario</label>
        	<input name="usuario" type="text"><br>	
        	<label for="Password">Password</label>
        	<input name="password" type="password"><br>
        	<input type="button" class="submit"	value="enviar">
        </form>
        </div>
        <div style="width:50%; float:left;">
        <h1>Si no tenes usuario crealo</h1>
        <form action="admin/check.php" method="post">
        	<label for="Nombre">Nombre</label>
        	<input name="nombre" type="text"><br>
        	<label for="Apellido">Apellido</label>
        	<input name="apellido" type="text"><br>
        	<label for="Password">Password</label>
        	<input name="password" type="password"><br>
        	<label for="CheckPass">Confirmar password</label>
        	<input name="checkpass" type="password"><br>
        	<label for="mail">E-mail</label>
        	<input name="mail" type="text"><br>
        	<input type="button" class="submit"	value="enviar">
        </form>
        </div>
        <div style="clear:both;"></div>
    </body>
</html>