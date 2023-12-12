<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HABITACION</title>
</head>
<style>
    input[type=number]::-webkit-inner-spin-button, 
    
    input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none; 
        margin: 0; 
    }
    
    input[type=number] { -moz-appearance:textfield; }
</style>
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

        Nº Personas:
        <input type="text" name="personas"><br><br>

        Nº Habitaciones:
        <input type="text" name="nhabitaciones"><br><br>

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
    <?php
        if (isset($_POST['submit'])) {
            $errores=0;
            $caben = 0;
            $precioh = 0;
            $simple='../media/hab0.png';
            $doble='../media/hab1.png';
            $triple='../media/hab2.png';
            $suite='../media/hab3.png';

            //NOMBRE Y APELLIDOS
            $nombre = $_POST["nombre"];
            $apellidos = $_POST["apellidos"];
            
            if ($nombre == "" || $apellidos == ""){
                $errores+=1;
            }

            //EMAIL
            $email = $_POST["email"];

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errores += 1;
            }

            //DNI
            $dni = $_POST["dni"];

            if (!preg_match('/^[0-9]{8}[a-zA-Z]$/', $dni)) {
                $errores+=1;
            }

            //Nº HABITACION Y PERSONAS
            $personas = $_POST["personas"];
            $nhabitaciones = $_POST["nhabitaciones"];
            
            if ($nhabitaciones == "" || $nhabitaciones < 0){
                $errores+=1;
            }

            if ($personas == "" || $personas < 0){
                $errores+=1;
            }
            
            //HABITACION
            $habitacion = $_POST["habitacion"];
            
            if ($habitacion == 0){
                $errores+=1;
            }
            else if ($habitacion == 1) {
                $caben=1;
                $precioh = 65;
            }
            else if ($habitacion == 2) {
                $caben=2;
                $precioh = 80;
            }
            else if ($habitacion == 3) {
                $caben=3;
                $precioh = 140;
            }
            else if ($habitacion == 4){
                $caben=4;
                $precioh = 180;
            }

            //COMPROBACIONES
            $perxhab = $caben * $nhabitaciones;
            $precio = $precioh * $nhabitaciones;

            if ($errores != 0) {
                echo "<script>alert('HAY ERRORES');</script>";
            }
            else {
                if ($personas>$perxhab) {
                    echo "<script>alert('HAS ELEGIDO MÁS PERSONAS DE LAS QUE CABEN EN LAS HABITACIONES SELECCIONADAS');</script>";
                }
                else {
                    echo "<br>";
                    echo "RESUMEN DE LA RESERVA:<br>";
                    echo "Nombre y apellidos: " .$nombre. " ". $apellidos."<br>";
                    echo "Email: ".$email."<br>";
                    echo "DNI: ".$dni."<br>";
                    echo "Precio: ".$precio."€<br>";
                    echo "Habitación elegida:<br><br>";
                    
                    switch ($habitacion) {
                        case 1:
                            echo "<img src=\"" . $simple . "\" alt=\"\">";
                            break;
                        case 2:
                            echo "<img src=\"" . $doble . "\" alt=\"\">";
                            break;
                        case 3:
                            echo "<img src=\"" . $triple . "\" alt=\"\">";
                            break;
                        default:
                            echo "<img src=\"" . $suite . "\" alt=\"\">";
                    }
                }
            }
        }
    ?>
</body>
</html>