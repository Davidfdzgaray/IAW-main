<?php include "header.php" ?>
<?php include "navbar.php" ?>
<?php 
    if ($_SESSION['rol']!='administrador') {
        header("Location: home.php");
        exit();
    }
    
    if (isset($_POST['crear_aula'])) {
        $aula= htmlspecialchars($_POST["aula"]);

        $result = $conn->query("SELECT * FROM aulas WHERE nombre_aula = '$aula'");

        if ($row = $result->fetch_assoc()) {
            echo "<script>alert('Esta aula ya existe.')</script>";
        }
        else {
            $sql = "INSERT INTO aulas (nombre_aula) VALUES ('$aula')";

            if ($conn->query($sql) == TRUE) {
                echo "<script>alert('Aula añadida correctamente.')</script>";
                header("location: users.php");
            } 
            else {
                echo "<script>alert('Error en la creación del aula.')</script>";
            }
        }    
        $conn->close();
    }
?>

<div class="container mt-5">
    <h1 class="text-center">Crear Aula</h1>
        <p class="text-center">
            Introduzca el Nombre de la Nueva Aula:
        </p>
  <div class="container">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        <div class="from-group text-center">
            <label for="aula">Añadir Nueva Aula:</label><br>
            <input type="text" name="aula" id="aula" required><br><br>

            <input type="submit" name='crear_aula' class="btn btn-primary mt-2" value="Crear Aula">
        </div>
    </form>
  </div>
</div>