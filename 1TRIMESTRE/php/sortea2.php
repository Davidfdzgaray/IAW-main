<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SORTEA 2</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        Escribe los participantes del sorteo:<br><br>
        Lista de participantes:<br>
        <textarea name="participantes" cols="50" rows="20"></textarea> <br>
        Debe tener como mínimo dos participantes. <br><br>
        Nº de premios: <br>
        <input type="number" name="premios"><br>
        <input type="submit" value="REGISTRAR" name='submit'>
        <input type="submit" value="BORRAR" id='borrar'>
    </form>

    <?php
        if (isset($_POST['submit']) && $premios>=1) {
            $participantes = htmlspecialchars($_POST['participantes']);
            $premios = htmlspecialchars($_POST['premios']);
            $separador = " ";
            $final = explode($separador, $participantes);
            $inicio=1;

            if ($final.length>1) {
                while ($inicio<=$premios) {
                    $aleatorio = rand(0,$premios);
                    echo "<br>" . $final[$aleatorio]; 
                    $inicio++;
                }
            }
        }
    ?>
</body>
</html>