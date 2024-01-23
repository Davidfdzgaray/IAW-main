<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRYPT</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        Cifrar Usuario:<br><br>
        <input type="text" name="usuario">
        <input type="submit" value="CIFRAR" name='submit'>
    </form>
</body>
</html>

<?php
    if (isset($_POST['submit'])) {
        $usuario = htmlspecialchars($_POST['usuario']);
        echo $usuario."<br>";
        $cifrado = crypt($usuario,'rl');
        echo $cifrado;
    }
?>
