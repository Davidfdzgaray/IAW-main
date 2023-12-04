<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="30">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FECHA</title>
</head>
<body>
    <?php
        date_default_timezone_set('Spain/Madrid');
        setlocale(LC_ALL, 'es_ES.UTF-8');
    ?>
    <p>Fecha Español = <?php echo strftime("%A %d %B %Y %H:%M"); ?></p>
</body>
</html>