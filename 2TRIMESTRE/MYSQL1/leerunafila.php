<?php
  include "db.php";
  include "header.php";

  $result = $conn->query("SELECT * FROM usuario LIMIT 1");

  if ($result->rowCount() > 0) {
    echo "<h1>Resultados</h1>";
    echo "<table><tr><th>ID</th><th>usuario</th><th>contraseña</th></tr>";
    
    $row = $result->fetch();
    echo "<tr><td>".$row["id"]."</td><td>".$row["username"]."</td><td>".$row["password"]."</td></tr></table>";
  } 
  else {
    echo "<p>0 results</p>";
  }
  $conn->close();
?>