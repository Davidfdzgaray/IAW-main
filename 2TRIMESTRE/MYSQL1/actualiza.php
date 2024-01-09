<?php
  include "db.php";
  include "header.php";

  $sql = "UPDATE usuario SET USERNAME='paco' WHERE ID=2";

  if ($conn->query($sql) === TRUE) {
    echo "Cambio realizado correctamente";
  } else {
    echo "Error: " . $conn->error;
  }

  $conn->close();
?>