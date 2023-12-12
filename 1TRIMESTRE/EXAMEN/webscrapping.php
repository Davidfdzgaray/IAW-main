<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEBSCRAPPING</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        Ciudad:<br><br>
        <input type="text" name="ciudad">
        <input type="submit" value="BUSCAR" name='submit'>
    </form>
    <?php
        if (isset($_POST['submit'])) {
            $ciudad = htmlspecialchars($_POST['ciudad']);
            $pagina = 'https://www.tiempo.com/' . $ciudad . '.htm';
            $html = file_get_contents($pagina);
            $patron_dia='/<span class="col day_col">(.*?)<\/span>/s';
            $patron_tiempo='/<span class="temp">(.*?)<\/span>/s';

            preg_match_all($patron_dia, $html, $coincidencias_d);
            preg_match_all($patron_tiempo, $html, $coincidencias_t);

            //DIA
            if (!empty($coincidencias_d[1])) {
                foreach ($coincidencias_d[1] as $dia) {
                    echo $dia . "<br>";
                }
            } 
            else {
                echo "No se encontró información sobre el dia.";
            }

            //TIEMPO    
            if (!empty($coincidencias_t[1])) {
                foreach ($coincidencias_t[1] as $tiempo) {
                    echo $tiempo . "<br>";
                }
            } 
            else {
                echo "No se encontró información sobre el tiempo.";
            }
        }
    ?>
</body>
</html>