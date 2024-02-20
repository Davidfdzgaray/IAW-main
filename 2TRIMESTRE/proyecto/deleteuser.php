<?php include "header.php" ?>
<?php 
    if ($_SESSION['rol']!='administrador') {
        header("Location: home.php");
        exit();
    }
    
    if(isset($_GET['eliminarusuario'])) {
        $id= htmlspecialchars($_GET['eliminarusuario']);
        $username = $_SESSION['usuario'];
        $query="SELECT * FROM usuarios WHERE username = '{$username}'"; 
        $vista_usuarios= mysqli_query($conn,$query);            

        while($row = mysqli_fetch_assoc($vista_usuarios))
        {
            $mio = $row['id'];
        }

        if ($mio == $id) {
            echo "<script type='text/javascript'>alert('¡No te puedes eliminar a ti mismo!')</script>";
            echo "<script>window.location='users.php';</script>";
            exit();
        } else {
            $query = "DELETE FROM usuarios WHERE id = {$id}"; 
            $delete_query= mysqli_query($conn, $query);

            $queryr = "DELETE FROM incidencias WHERE id_usuario = {$id}"; 
            $delete_queryr= mysqli_query($conn, $queryr);

            echo "<script>window.location='users.php';</script>";
        }
    }
?>