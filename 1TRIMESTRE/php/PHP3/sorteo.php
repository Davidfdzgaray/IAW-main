<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SORTEO</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        Nº DE PARTICIPANTES: <input type="text" name="numero"><br><br>
        
        <input type="submit" value="REGISTRAR" name='submit'>
    </form>
    <?php
       if (isset($_POST['submit'])) {
            $numero = htmlspecialchars($_POST['numero']);
            $numero_aleatorio = rand(1,$numero);

            echo "<br>El número ganador será " . $numero_aleatorio;

        }
    ?>
</body>
</html>