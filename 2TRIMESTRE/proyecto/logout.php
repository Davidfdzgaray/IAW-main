<?php include "header.php" ?>
<?php 
    date_default_timezone_set("Europe/Madrid");
    $date = date("d") . "/" . date("m") . "/" . date("Y");
    $time = date("H") . ":" . date("i");
    $username =  $_SESSION['usuario'];

    $query = "UPDATE usuarios SET last_date = '{$date}' , last_time = '{$time}' WHERE username = '{$username}'";
      
    mysqli_query($conn, $query);

    session_destroy();
    header("Location: login.php");
?>