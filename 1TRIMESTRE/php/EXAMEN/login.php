<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
    <form action="" method="post">
        Usuario: <input type="text" name="usuario"/><br/><br/>
        Contraseña: <input type="password" name="contrasena"/><br/><br/>
        <input type="submit" name="submit" value="ACCEDER"/> 
    </form>

    <?php
        include 'config2.php';

        $usuario = htmlspecialchars($_POST["usuario"]);
        $contrasena = htmlspecialchars($_POST["contrasena"]);

        if(isset($_POST["submit"])) {
            if ($usuario==usuario && $contrasena==contrasena) {
                echo 'Acceso Aceptado';
            }
            else {
                echo 'Acceso Denegado';
            }
        }
    ?> 
</body>
</html>