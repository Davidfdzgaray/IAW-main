<?php include "header.php" ?>
<?php
    if (!isset($_SESSION["usuario"]) || empty($_SESSION["usuario"])) {
        header("Location: login.php");
        exit();
    }

    if(isset($_GET['eliminar'])) {
        $id= htmlspecialchars($_GET['eliminar']);
        $query = "DELETE FROM incidencias WHERE id = {$id}"; 
        $delete_query= mysqli_query($conn, $query);
        echo "<script>window.location='home.php';</script>";
    }
?>