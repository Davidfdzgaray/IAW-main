<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SORTEO</title>
</head>
<body>
    <?php
        $palabras = [
            "HOLA",
            "HELLO",
            "BYE",
            "ADIOS",
            "ROCK",
            "ROCA",
            "PHONE",
            "TELEFONO",
            "KEYBOARD",
            "TECLADO"
        ];

        sort($palabras);

        foreach ($palabras as $val) {
            echo "$val <br>";
        }
    ?>
</body>
</html>