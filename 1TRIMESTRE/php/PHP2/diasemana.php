<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIA</title>
</head>
<body>
    <?php
        $dia=date("w");
        
        switch ($dia) {
            case 1:
                echo "Hoy es Lunes";
            break;
            case 2:
                echo "Hoy es Martes";
            break;
            case 3:
                echo "Hoy es Miercoles";
            break;
            case 4:
                echo "Hoy es Jueves";
            break;
            case 5:
                echo "Hoy es Viernes";
            break;
            case 6:
                echo "Hoy es Sabado";
            break;
            case 0:
            echo "Hoy es Domingo";
            break;
            default:
        } 
    ?>
</body>
</html>