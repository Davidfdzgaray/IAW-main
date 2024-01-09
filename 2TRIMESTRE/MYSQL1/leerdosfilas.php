<?php
  include "db.php";
  include "header.php";

  $result = $conn->query("SELECT * FROM usuario LIMIT 2");

    if ($result->num_rows > 0) {
      echo "<table><tr><th>ID</th><th>Name</th></tr>";
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["ID"]."</td><td>".$row["USERNAME"]."</td></tr>";
      }
      echo "</table>";
    } else {
      echo "0 results";
    }
    $conn->close();
?>