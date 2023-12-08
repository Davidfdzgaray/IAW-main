<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOREACH1</title>
</head>
<body>
    <?php
        $refranes = [
            'Cuando el abad está contento, lo está todo el convento.',
            'Calenturas otoñales, o muy largas o mortales.',
            'En todos tiempos y en todas partes hay domingos que son martes.',
            'Ni en lunes ni en martes vayas sin dinero a ninguna parte.',
            'Amor de padre, que todo lo demás es aire.'
        ];
        
        foreach ($refranes as $refran) {
            echo "<p>$refran</p>";
        }
    ?>
</body>
</html>