<?php
  include "db.php";
  include "header.php";

  $sql = "ALTER TABLE usuario ADD COLUMN DESCRIPTION text";

  if ($conn->query($sql) === TRUE) {
    echo "Columna añadida correctamente";
  } else {
    echo "Error: " . $conn->error;
  }

  $conn->close();
?>
 $query="ALTER TABLE costo_cuotas ADD COLUMN '$campos' text NOT NULL";
