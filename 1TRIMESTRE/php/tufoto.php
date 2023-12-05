<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TU FOTO</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        Nombre: <input type="text" name="nombre"><br><br>
        Foto: <input type="file" name="foto"><br><br>
        
        <input type="submit" value="Enviar" name='submit'>
    </form>
    <?php
        $nombre = htmlspecialchars($_POST['nombre']);
        $foto = htmlspecialchars($_POST['foto']);

        if(isset($_POST["submit"])) {
            echo $nombre . "<br><br>";
            echo '<img src="media/'.$foto.'">';
        }
    ?>
</body>
</html>