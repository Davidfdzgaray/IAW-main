<?php include_once "header.php" ?>
<?php
  if (isset($_SESSION["usuario"])) {
    header("Location: home.php");
    exit();
  }
?>
<?php
    if (isset($_POST['iniciosesion'])) {
        $usuario= htmlspecialchars($_POST["usuario"]);
        $contrasena= htmlspecialchars($_POST["contrasena"]);
        $codificada = base64_encode($contrasena);

        $result = $conn->query("SELECT * FROM usuarios WHERE username = '$usuario'");
        $result2 = $conn->query("SELECT * FROM usuarios WHERE email = '$usuario'");

        if($row = $result->fetch_assoc()){
            //Si el usuario es correcto ahora validamos su contraseña
            if ($codificada == $row["password"]){ 
                $rol=$row["role"];
                // Guardar datos de sesión
                $_SESSION['usuario']=$usuario;
                $_SESSION['rol']=$rol;
                if ($_SESSION['rol']=='administrador') {
                    header("location: admin.php");
                }
                else {
                    header("location: home.php");
                }
            }
            else {
                echo "<script>alert('Contraseña incorrecta')</script>";
            }
        }
        else if($row = $result2->fetch_assoc()){
            //Si el correo es correcto ahora validamos su contraseña
            if ($codificada == $row["password"]){ 
                $rol=$row["role"];
                // Guardar datos de sesión
                $_SESSION['usuario']=$usuario;
                $_SESSION['rol']=$rol;
                if ($_SESSION['rol']=='administrador') {
                    header("location: admin.php");
                }
                else {
                    header("location: home.php");
                }
            }
            else {
                echo "<script>alert('Contraseña incorrecta')</script>";
            }
        }
        else {
            echo "<script>alert('Email o usuario incorrecto')</script>";
        }
        $conn->close();
    }
?>
<div class="container mt-5">
    <h1 class="text-center">Inicio de Sesión</h1>
        <p class="text-center">
            Introduzca su Usuario y Contraseña:
        </p>
  <div class="container">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        <div class="from-group text-center">
            <label for="usuario">Usuario o Correo Eléctronico:</label><br>
            <input type="text" name="usuario" id="usuario" required><br><br>

            <label for="contrasena">Contraseña:</label><br>
            <input type="password" name="contrasena" id="contrasena" required><br><br>

            <input type="submit" name='iniciosesion' class="btn btn-primary mt-2" value="Iniciar Sesión">
        </div>
    </form>
  </div>
</div>