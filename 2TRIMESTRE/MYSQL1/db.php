<?php
$servername = 'sql307.thsite.top';   
$username = 'thsi_35748555';   
$password = "31ZGu!vR";   
$dbname = 'thsi_35748555_bdpruebas';     

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 
?>

