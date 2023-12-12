<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>webscrapping</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        URL:<br><br>
        <input type="text" name="url">
        <input type="submit" value="BUSCAR" name='submit'>
    </form>
    <?php
        if (isset($_POST['submit'])) {
            $url = $_POST['url'];

            // Validar la URL
            if (filter_var($url, FILTER_VALIDATE_URL)) {
                // Descargar el contenido remoto en una cadena
                $content = file_get_contents($url);

                // Buscar direcciones de correo electrónico en el contenido
                $emails = [];
                preg_match_all('/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/', $content, $matches);

                if (!empty($matches[0])) {
                    $emails = $matches[0];
                }

                // Mostrar las direcciones de correo electrónico por pantalla
                if (!empty($emails)) {
                    echo '<h2>Direcciones de correo electrónico encontradas:</h2>';
                    echo '<ul>';
                    foreach (array_unique($emails as $email)) {
                        echo '<li>' . $email . '</li>';
                    }
                    echo '</ul>';
                } else {
                    echo '<p>No se encontraron direcciones de correo electrónico en la página.</p>';
                }
            } 
            else {
                echo '<p>La URL proporcionada no es válida.</p>';
            }
        }
    ?>
</body>
</html>