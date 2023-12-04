<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOREACH2</title>
</head>
<body>
    <?php
        $traduccion = [
            "HOLA"=>"HELLO",
            "BYE"=>"ADIOS",
            "ROCK"=>"ROCA",
            "PHONE"=>"TELEFONO",
            "KEYBOARD"=>"TECLADO"
        ];
        
        foreach ($traduccion as $es => $en) {
            echo "$es = $en<br>";
        }

        $palabras=count($traduccion,1);
        echo "<p>Hay $palabras palabras.</p>";
    ?>
</body>
</html>