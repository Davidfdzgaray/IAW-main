<?php
  // Inicia o continua la sesión
  session_set_cookie_params(300);
  session_start();
  $usuario=$_SESSION['usuario'];

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


