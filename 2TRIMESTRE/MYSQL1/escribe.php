<?php
  include "db.php";
  include "header.php";

  $sql = "INSERT INTO usuario (USERNAME, PASSWORD) VALUES ('ander', 'ander')";

  if ($conn->query($sql) == TRUE) {
    echo "Usuario añadido correctamente";
  } 
  else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
?>