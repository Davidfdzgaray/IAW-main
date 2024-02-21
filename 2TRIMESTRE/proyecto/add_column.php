<?php 
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

$sql = "ALTER TABLE usuarios ADD role VARCHAR(20) NOT NULL,ADD last_access VARCHAR(20) NOT NULL, ADD IP VARCHAR(20) NOT NULL"; 

if (mysqli_query($conn, $sql)) {
    echo "CORRECTO";
}
else {
    echo "ERROR";
}
?>




