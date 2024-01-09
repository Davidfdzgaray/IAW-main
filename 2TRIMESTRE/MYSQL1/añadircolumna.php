<?php
  include "db.php";
  include "header.php";

  $sql = "ALTER TABLE usuario ADD COLUMN DESCRIPTION varchar";

  if ($conn->query($sql) == TRUE) {
    echo "Columna añadida correctamente";
  } else {
    echo "Error: " . $conn->error;
  }

  $conn->close();
?>