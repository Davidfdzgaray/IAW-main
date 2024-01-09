<?php
  include "db.php";
  include "header.php";

  $result = $conn->query("SELECT * FROM usuario LIMIT 1");

    if ($result->num_rows > 0) {
      echo "<table><tr><th>ID</th><th>Name</th></tr>";
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["username"]."</td></tr>";
      }
      echo "</table>";
    } else {
      echo "0 results";
    }
    $conn->close();
?>