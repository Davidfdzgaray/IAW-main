<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRYPT</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        Cifrar texto:<br><br>
        <input type="text" name="texto">
        <input type="submit" value="CIFRAR" name='submit'>
    </form>
</body>
</html>

<?php
    if (isset($_POST['submit'])) {
        $texto = htmlspecialchars($_POST['texto']);
        echo $texto."<br><br>";

        $cifrado1 = crypt($texto,'rl');
        echo "Standard DES:<br>";
        echo $cifrado1."<br><br>";
    
        $cifrado2 = crypt($texto,'_J9..rasm');
        echo "Extended DES:<br>";
        echo $cifrado2."<br><br>";

        $cifrado3 = crypt($texto,'$1$rasmusle$');
        echo "MD5:<br>";
        echo $cifrado3."<br><br>";
    }
?>
