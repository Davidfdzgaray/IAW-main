<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INCLUDE</title>
</head>
<body>
    <?php
        include 'config.php';

        echo "CONSTANTES: " . saludo . " " . edad;
        echo "VARIABLES: " . $nombre . " " . $apellidos;
    ?> 
</body>
</html>