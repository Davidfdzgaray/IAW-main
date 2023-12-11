<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RENTA</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        Nombre: <input type="text" name="nombre"><br><br>
        Apellidos: <input type="text" name="apellidos"><br><br>
        Email: <input type="email" name="correo"><br><br>
        DNI: <input type="text" name="dni"><br><br>
        Salario Bruto: <input type="number" name="salario">euros<br><br>
        Donación (Reducción del 2% dirigido a ONGs)<input name="donacion" type="checkbox"><br>
        
        <input type="submit" value="Calcular" name='submit'>
    </form>
    <?php
        if (isset($_POST['submit'])) {
            $apellidos = htmlspecialchars($_POST['apellidos']);
            $nombre = htmlspecialchars($_POST['nombre']);
            $correo = htmlspecialchars($_POST['correo']);
            $dni = htmlspecialchars($_POST['dni']);
            $salario = htmlspecialchars($_POST['salario']);
            $donacion = htmlspecialchars($_POST['donacion']);
        
            if ($salario < 10000) {
                $hacienda = $salario*0.05;
                if (isset($_POST["donacion"])) {
                    $reduccion = $hacienda - ($salario*0.02);
                    echo "Su tipo impositivo es del 5% y pagará a hacienda: " . $reduccion . " euros.";
                }
                else {
                    echo "Su tipo impositivo es del 5% y pagará a hacienda: " . $hacienda . " euros.";
                }
            } 
            else if ($salario < 20000) {
                $hacienda = $salario*0.15;
                if (isset($_POST["donacion"])) {
                    $reduccion = $hacienda - ($salario*0.02);
                    echo "Su tipo impositivo es del 15% y pagará a hacienda: " . $reduccion. " euros.";
                }
                else {
                    echo "Su tipo impositivo es del 15% y pagará a hacienda: " . $hacienda. " euros.";
                }
            } 
            else if ($salario < 35000) {
                $hacienda = $salario*0.20;
                if (isset($_POST["donacion"])) {
                    $reduccion = $hacienda - ($salario*0.02);
                    echo "Su tipo impositivo es del 20% y pagará a hacienda: " .  $reduccion . " euros.";
                }
                else {
                    echo "Su tipo impositivo es del 20% y pagará a hacienda: " .  $hacienda . " euros.";
                }
            } 
            else if ($salario < 60000) {
                $hacienda = $salario*0.30;
                if (isset($_POST["donacion"])) {
                    $reduccion = $hacienda - ($salario*0.02);
                    echo "Su tipo impositivo es del 30% y pagará a hacienda: " . $reduccion . " euros.";
                }
                else {
                    echo "Su tipo impositivo es del 30% y pagará a hacienda: " . $hacienda . " euros.";
                }
            } 
            else {
                $hacienda = $salario*0.45;
                if (isset($_POST["donacion"])) {
                    $reduccion = $hacienda - ($salario*0.02);
                    echo "Su tipo impositivo es del 45% y pagará a hacienda: " . $reduccion . " euros.";
                }
                else {
                    echo "Su tipo impositivo es del 45% y pagará a hacienda: " . $hacienda . " euros.";
                }
            }
        }
        
    ?>
</body>
</html>