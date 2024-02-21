<?php include "header.php" ?>
<?php 
    date_default_timezone_set("Europe/Madrid");
    $date = date("d") . "/" . date("m") . "/" . date("Y");
    $time = date("H") . ":" . date("i");
    $last_access = $date . " " . $time;
    $ip = $_SERVER['REMOTE_ADDR']; 
    $username =  $_SESSION['usuario'];

    $query = "UPDATE usuarios SET last_access = '{$last_access}', IP = '{$ip}' WHERE username = '{$username}'";
      
    mysqli_query($conn, $query);

    session_destroy();
    header("Location: login.php");
?>