<?php
    if (isset($_POST['submit'])) {
        // Comienzo de la sesión
        session_start();
        // Guardar datos de sesión
        $_SESSION["usuario"] = $_POST['usuario'];
        
        header("Location: pruebasession2.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SESSION</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        Usuario:<br><br>
        <input type="text" name="usuario">
        <input type="submit" value="INICIAR SESION" name='submit'>
    </form>
</body>
</html>