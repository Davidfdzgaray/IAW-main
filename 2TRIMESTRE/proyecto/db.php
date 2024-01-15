<?php
  // Inicia o continua la sesión
session_start();
$usu = $_SESSION["usuario"];
echo "<p>$usu</p>"; 

$servername = 'sql307.byetcluster.com';   
$username = 'thsi_35748555';   
$password = "31ZGu!vR";   
$dbname = 'thsi_35748555_proyecto';     

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}
?>

