<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TU FOTO</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
        Nombre: <input type="text" name="nombre"><br><br>
        Foto: <input type="file" name="foto"><br><br>
        
        <input type="submit" value="Enviar" name='submit'>
    </form>
    <?php
        if (isset($_POST['submit'])) {
            $foto = htmlspecialchars($_POST['foto']);
            $nombre = htmlspecialchars($_POST['nombre']);
        
            $nombrefoto = $_FILES["foto"]["name"];
            $tmpfoto = $_FILES["foto"]["tmp_name"];
        
            if (is_uploaded_file($tmpfoto)) {
                $rutadestino =  "media/" . $nombrefoto;
                move_uploaded_file($tmpfoto, $rutadestino);
        
                echo "<br>" . $nombre . "<br><br>";
                echo '<img src="' . $rutadestino . '">';
                
            } 
            else {
                echo "Error";
            }
        }
        
    ?>
</body>
</html>