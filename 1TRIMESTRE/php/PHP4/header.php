<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HEADER</title>
</head>
<body>
    <form action="saludo.php" method="post">
        Usuario: <input type="text" name="usuario"/><br/><br/>
        Contraseña: <input type="password" name="contrasena"/><br/><br/>
        <input type="submit" name="submit" value="ACCEDER"/>
    </form>

    <?php
        if(isset($_POST["submit"])) {
            $host  = $_SERVER['HTTP_HOST'];
            $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = 'saludo.php';
            header("Location: http://$host$uri/$extra");
            exit;
        }
    ?>
</body>
</html>