<?php include "header.php" ?>
<?php 
    if(isset($_GET['eliminarusuario'])) {
        $id= htmlspecialchars($_GET['eliminarusuario']);
        $query = "DELETE FROM usuarios WHERE id = {$id}"; 
        $delete_query= mysqli_query($conn, $query);
        echo "<script>window.location='users.php';</script>";
    }
?>
<?php include "../footer.php" ?>