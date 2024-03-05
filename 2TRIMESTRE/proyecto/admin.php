<?php include "header.php" ?>
<?php 
    if ($_SESSION['rol']!='administrador') {
        header("Location: home.php");
        exit();
    }

    $username =  $_SESSION['usuario'];
    $query="SELECT * FROM usuarios WHERE username = '{$username}'"; 
    $vista_usuarios= mysqli_query($conn,$query);            

    while($row = mysqli_fetch_assoc($vista_usuarios))
    {
        $date = $row['last_date'];
        $time = $row['last_time'];
        $ip = $row['IP'];
    }

    if ($date == "" && $time  ==  "") {
        date_default_timezone_set("Europe/Madrid");
        $date = date("d") . "/" . date("m") . "/" . date("Y");
        $time = date("H") . ":" . date("i");
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
<?php include "footer.php" ?>