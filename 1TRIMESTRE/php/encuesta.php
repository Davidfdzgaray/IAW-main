<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENCUESTA</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        Nombre: <input type="text" name="nombre"><br>
        <input name="check" type="checkbox">Mayor de edad<br>
        Que prefieres:<br>
        <input name="intereses" type="radio" value="op1">Películas<br>
        <input name="intereses" type="radio" value="op2">Libros<br>
        <input name="intereses" type="radio" value="op3" checked="checked">AudioLibro<br>
        Elige un coche:
        <select name="coches">
            <option value="volvo">Volvo</option>
            <option value="bmw">BMW</option>
            <option value="opel">Opel</option>
            <option value="audi">Audi</option>
        </select><br>
        <input type="submit" value="Enviar" name='submit'>
    </form>
    <?php
        $nombre = htmlspecialchars($_POST['nombre']);
        $intereses = htmlspecialchars($_POST['intereses']);
        $coches = htmlspecialchars($_POST['coches']);

        if(isset($_POST["submit"])) {
            if (isset($_POST["check"])) {
                $mayorf='Si';
            } else {
                $mayorf='No';
            }

            echo "Nombre: " . $nombre . "<br>Mayor de edad:" . $mayorf . "<br>Mayor interés:" . $intereses . "<br>Coche preferido:" . $coches;
        }
    ?>
</body>
</html>