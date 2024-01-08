<?php
$host = 'loading.thsite.top';   
$user = 'thsi_35748555';   
$pass = "31ZGu!vR";   
$database = 'thsi_35748555_bdpruebas';     
$conn = mysqli_connect($host,$user,$pass,$database);   
if (!$conn) {                                             
    die("Conexión fallida con base de datos: " . mysqli_connect_error());     
  }
echo "Connected successfully";
?>


