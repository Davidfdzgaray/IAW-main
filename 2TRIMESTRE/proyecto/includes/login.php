<?php include "../header.php" ?>
<?php 
    if (isset($_POST['submit'])) {
        $usuario= htmlspecialchars($_POST["usuario"]);
        $contrasena= htmlspecialchars($_POST["contrasena"]);

        $result = $conn->query("SELECT * FROM usuarios WHERE username = '$nombre' AND password = '$contrasena'");

        if(!$result){
            echo "Usuario o contraseña incorrecta.";
        }
        else { 
            echo "<script>window.location='home.php';</script>";
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

            <input type="submit" name='submit' class="btn btn-primary mt-2" value="Iniciar Sesión">
        </div>
    </form>
  </div>
</div>
<?php include "../footer.php" ?>