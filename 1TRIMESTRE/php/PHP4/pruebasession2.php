<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SESSION 2</title>
</head>
<body>
    <?php
        // Continuamos la sesión
        session_start();
        // Devolver los valores de sesión
        echo "Nombre de usuario: " . $_SESSION["usuario"];
    ?>
    <input type="submit" value="CERRAR SESION" name='submit'>
    
    <?php
        if (isset($_POST['submit'])) {
            // Terminar la sesión:
            session_destroy();

            header("Location: pruebasession.php");
            exit();
        }
    ?>
</body>
</html>