<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COOKIES SEGURAS</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        Usuario:<br><br>
        <input type="text" name="usuario">
        Contraseña:<br><br>
        <input type="text" name="contrasena">
        <input type="submit" value="INICIAR SESION" name='submit'>
    </form>
    <?php
        if (isset($_POST['submit'])) {
            $nombre = $_POST['usuario'];
            $contrasena = $_POST['contrasena'];
            // El tiempo de expiración es en 30 minutos. PHP traduce la fecha al formato adecuado
            $expiracion = time() + 60 * 30;
            // Ruta y dominio
            $ruta = '/php/';
            $dominio = $_SERVER['SERVER_NAME'];
            // Sólo envía la cookie con conexión HTTPs
            $seguridad = true;
            // Cookie disponible sólo para el protocolo HTTP
            $solohttp = true;
            setcookie($nombre, $contrasena, $expiracion, $ruta, $dominio, $seguridad, $solohttp);
            echo "Cookie establecida";
        }
    ?>
</body>
</html>