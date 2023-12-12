<?php
    if (isset($_POST['submit'])) {
        $errores=0;
        $simple='../media/hab0.png';
        $doble='../media/hab1.png';
        $triple='../media/hab2.png';
        $suite='../media/hab3.png';

        //NOMBRE Y APELLIDOS
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        
        if ($nombre == "" or $apellidos == ""){
            $errores+=1;
        }

        //EMAIL
        $email = $_POST["email"];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errores += 1;
        }

        //DNI
        $dni = $_POST["dni"];

        if (preg_match('/^[0-9]{8}[a-zA-Z]$/', $dni)) {
            
        } 
        else {
            $errores+=1;
        }

        //HABITACION
        $habitacion = $_POST["habitacion"];
        
        if ($habitacion == 0){
            $errores+=1;
        }

        if ($errores != 0) {
            echo "<script>alert('HAY ERRORES');</script>";
        }
        else {
            echo "RESUMEN DE LA RESERVA:<br>";
            echo "Nombre y apellidos: " .$nombre. " ". $apellidos."<br>";
            echo "Email: ".$email."<br>";
            echo "DNI: ".$dni."<br>";
            echo "Habitación elegida: ".$habitacion."<br>";
            
            switch ($habitacion) {
                case 1:
                  echo "<img src=". $simple ." alt="">";
                  break;
                case 2:
                    echo "<img src=". $doble ." alt="">";
                  break;
                case 3:
                    echo "<img src=". $triple ." alt="">";
                  break;
                default:
                    echo "<img src=". $suite ." alt="">";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HABITACION</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        Nombre:
        <input type="text" name="nombre"><br><br>
        
        Apellidos:
        <input type="text" name="apellidos"><br><br>

        Email:
        <input type="text" name="email"><br><br>

        DNI:
        <input type="text" name="dni"><br><br>

        Habitación:
        <select name="habitacion" size="1">
            <option value=0>Selecciona</option>
            <option value=1>Simple 65€</option>
            <option value=2>Doble 80€</option>
            <option value=3>Triple 140€</option>
            <option value=4>Suite 180€</option>
        </select><br><br>

        <input type="submit" value="Comprar" name='submit'>
    </form>
</body>
</html>