<?php
    if (isset($_GET['submit'])) {
        $asunto=htmlspecialchars($_GET['asunto']);
        $destinatario=htmlspecialchars($_GET['destinatario']);
        $mensaje=htmlspecialchars($_GET['mensaje']);
        $remitente=htmlspecialchars($_GET['remitente']);

        //COMPROBAR EMAILS
        if (false !== filter_var($destinatario, FILTER_VALIDATE_EMAIL) and false !== filter_var($remitente, FILTER_VALIDATE_EMAIL)) {
            //COMPROBAR SI HAY ERRORES
            ini_set( 'display_errors', 1 );
            error_reporting( E_ALL );
            
            $cabecera = "De:" . $remitente;
            mail($destinatario,$asunto,$mensaje, $cabecera);
            echo '<script>alert("MENSAJE ENVIADO");</script>';
        }
        else {
            echo '<script>alert("ERROR");</script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CORREO</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="get">
        Introduce tu Correo Electrónico:
        <input type="text" name="remitente"><br><br>
        Asunto:
        <input type="text" name="asunto"><br><br>
        Destinatario:
        <input type="text" name="destinatario"><br><br>
        Mensaje: <br><br>
        <textarea name="mensaje" cols="50" rows="10"></textarea><br><br>
        <input type="submit" value="ENVIAR" name='submit'>
    </form>
</body>
</html>