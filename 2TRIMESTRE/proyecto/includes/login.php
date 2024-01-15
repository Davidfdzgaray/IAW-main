<?php include "../header.php" ?>
<?php 
    if (isset($_POST['iniciosesion'])) {
        $usuario= htmlspecialchars($_POST["usuario"]);
        $contrasena= htmlspecialchars($_POST["contrasena"]);
        $codificada = base64_encode($contrasena);

        $result = $conn->query("SELECT * FROM usuarios WHERE username = '$usuario'");

        if($row = $result->fetch_assoc()){
            //Si el usuario es correcto ahora validamos su contraseña
            if ($codificada == $row["password"]){ 
                // Comienzo de la sesión
                session_start();
                // Guardar datos de sesión
                $_SESSION["usuario"] = $_POST['usuario'];
                
                if ($usuario=='admin') {
                    echo "<script>window.location='admin.php';</script>"; 
                }
                else {
                    echo "<script>window.location='home.php';</script>"; 
                }
            }
            else {
                echo "<script>alert('Contraseña incorrecta.')</script>";
            }
        }
        else {
            echo "<script>alert('Usuario incorrecto.')</script>";
        }
        $conn->close();
    }

    if (isset($_POST['crearusuario'])) {
        $usuario= htmlspecialchars($_POST["usuario"]);
        $contrasena= htmlspecialchars($_POST["contrasena"]);
        $codificada = base64_encode($contrasena);

        $result = $conn->query("SELECT * FROM usuarios WHERE username = '$usuario'");

        if ($row = $result->fetch_assoc()) {
            echo "<script>alert('Este usuario ya existe.')</script>";
        }
        else {
            $sql = "INSERT INTO usuarios (username, password) VALUES ('$usuario', '$codificada')";

            if ($conn->query($sql) == TRUE) {
                echo "<script>alert('Usuario añadido correctamente.')</script>";
            } 
            else {
                echo "<script>alert('Error en la creación del usuario.')</script>";
            }
        }    
        $conn->close();
    }
?>
<div class="container mt-5">
    <h1 class="text-center">Inicio de Sesión</h1>
        <p class="text-center">
            Introduzca su usuario y contraseña:
        </p>
  <div class="container">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        <div class="from-group text-center">
            <label for="usuario">Usuario:</label><br>
            <input type="text" name="usuario" id="usuario" required><br><br>

            <label for="contrasena">Contraseña:</label><br>
            <input type="password" name="contrasena" id="contrasena" required><br><br>

            <input type="submit" name='iniciosesion' class="btn btn-primary mt-2" value="Iniciar Sesión">
            <input type="submit" name='crearusuario' class="btn btn-primary mt-2" value="Crear Usuario">
        </div>
    </form>
  </div>
</div>
<?php include "../footer.php" ?>