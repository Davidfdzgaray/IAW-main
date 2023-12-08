<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OPERADORES CADENA</title>
</head>
<body>
    <?php
        // Definir variables de tipo cadena
        $cadena1 = "Hola Mundo";
        $cadena2 = "Mundo De David";

        // Operadores con cadenas
        $concatenacion = $cadena1 . " " . $cadena2;
        $cambio = str_replace("Mundo", "Fernando", $cadena1); 
        $longitudCadena1 = strlen($cadena1);
        $npalabras = str_word_count($cadena2);
        $reves = strrev($cadena1);
        $comparacion = ($cadena1 == $cadena2) ? "Las cadenas son iguales" : "Las cadenas son diferentes";
        $subcadena = substr($cadena1, 0, 2); // Extraer los primeros 2 caracteres de $cadena1

        // Mostrar resultados
        echo "<p>Cadena 1: $cadena1</p>";
        echo "<p>Cadena 2: $cadena2</p>";
        echo "<p>Concatenación: $concatenacion</p>";
        echo "<p>Longitud de Cadena 1: $longitudCadena1</p>";
        echo "<p>Palabras de Cadena: $npalabras</p>";
        echo "<p>Comparación: $comparacion</p>";
        echo "<p>Subcadena de Cadena 1: $subcadena</p>";
        echo "<p>Del revés: $reves</p>";
        echo "<p>Cambio: $cambio</p>";
    ?>
</body>
</html>