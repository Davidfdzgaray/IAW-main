<?php include "header.php" ?>
<?php 
    if ($_SESSION['rol']!='administrador') {
        header("Location: home.php");
        exit();
    }
    
    if (isset($_POST['create_user'])) {
        $usuario= htmlspecialchars($_POST["usuario"]);
        $contrasena= htmlspecialchars($_POST["contrasena"]);
        $codificada = base64_encode($contrasena);
        $roln='profesor';

        $result = $conn->query("SELECT * FROM usuarios WHERE username = '$usuario'");

        if ($row = $result->fetch_assoc()) {
            echo "<script>alert('Este usuario ya existe.')</script>";
        }
        else {
            $sql = "INSERT INTO usuarios (username, password, role) VALUES ('$usuario', '$codificada', '$roln')";

            if ($conn->query($sql) == TRUE) {
                echo "<script>alert('Usuario añadido correctamente.')</script>";
                header("location: users.php");
            } 
            else {
                echo "<script>alert('Error en la creación del usuario.')</script>";
            }
        }    
        $conn->close();
    }
?>

<div class="container mt-5">
    <h1 class="text-center">Crear Usuario</h1>
        <p class="text-center">
            Introduzca Nombre de Usuario y Contraseña:
        </p>
  <div class="container">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        <div class="from-group text-center">
            <label for="usuario">Usuario:</label><br>
            <input type="text" name="usuario" id="usuario" required><br><br>

            <label for="contrasena">Contraseña:</label><br>
            <input type="password" name="contrasena" id="contrasena" required><br><br>

            <input type="submit" name='create_user' class="btn btn-primary mt-2" value="Crear Usuario">
        </div>
    </form>
  </div>
</div>