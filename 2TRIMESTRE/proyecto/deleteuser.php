<?php include "header.php" ?>
<?php 
    if ($_SESSION['rol']!='administrador') {
        header("Location: home.php");
        exit();
    }

    if(isset($_GET['eliminarusuario'])) {
        $id= htmlspecialchars($_GET['eliminarusuario']);
        $query = "DELETE FROM usuarios WHERE id = {$id}"; 
        $delete_query= mysqli_query($conn, $query);

        $queryr = "DELETE FROM incidencias WHERE id_usuario = {$id}"; 
        $delete_queryr= mysqli_query($conn, $queryr);

        echo "<script>window.location='users.php';</script>";
    }
?>