<?php include "header.php" ?>
<?php 
    date_default_timezone_set("Europe/Madrid");
    setlocale(LC_TIME, 'es_ES.UTF-8');
    $date = strftime("%d de %B de %Y");
    $time = date("H") . ":" . date("i");
    $last_access = $date . " a las " . $time;
    $ip = $_SERVER['REMOTE_ADDR']; 
    $username =  $_SESSION['usuario'];

    $query = "UPDATE usuarios SET last_access = '{$last_access}', IP = '{$ip}' WHERE username = '{$username}'";
      
    mysqli_query($conn, $query);

    session_destroy();
    header("Location: login.php");
?>