<?php include "../header.php" ?>
<?php 
    if ($_SESSION["usuario"]!='admin') {
        //echo "<script>window.location='home.php';</script>"; 
    }
?>
<div class="container mt-5">
    <h1 class="text-center">Bienvenido Administrador!</h1>
        <p class="text-center">
           Gestión de Usuarios y Web
        </p>
  <div class="container">
    <form action="home.php" method="post">
        <div class="from-group text-center">
            <input type="submit" class="btn btn-primary mt-2" value="Inicio">
        </div>
    </form>
    <form action="users.php" method="post">
        <div class="from-group text-center">
            <input type="submit" class="btn btn-primary mt-2" value="Gestionar Usuarios">
        </div>
    </form>
  </div>
</div>
<?php include "../footer.php" ?>