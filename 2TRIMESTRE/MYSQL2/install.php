<?php
  include "db.php";
  include ".";

  // sql to create table
  $sql = "CREATE TABLE usuarios (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    nombre VARCHAR(30) NOT NULL,
    apellidos VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    telefono INT(9) NOT NULL,
    rol VARCHAR(10) NOT NULL
  )";
  
  if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
    //echo file_get_contents("https:// /");
  } else {
    echo "Error creating table: " . $conn->error;
  }
  
  $conn->close();
?>