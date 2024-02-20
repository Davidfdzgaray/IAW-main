<?php include "header.php" ?>
<?php 
    $date = date("d") . " de " . date("m") . " de " . date("Y");
    $time = date("H") . ":" . date("i");
    $username =  $_SESSION['usuario'];

    $query = "UPDATE usuarios SET last_date = '{$date}' , last_time = '{$time}' WHERE username = '{$username}'";
      
    mysqli_query($conn, $query);

    session_destroy();
    header("Location: login.php");
?>