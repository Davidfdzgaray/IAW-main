<?php
    session_start();
    echo $_GET["fin"];
    if ($_GET["fin"])
        session_destroy();
?>
<?php include_once "header.php" ?>

<div class="container mt-5">
    <h1 class="text-center"> Gestión simple de incidencias</h1>
        <p class="text-center">
            Ejemplo sin uso de cookies ni sesiones para implementar un CRUD en PHP con MySQL
        </p>
  <div class="container">
    <form action="login.php" method="post">
        <div class="from-group text-center">
            <input type="submit" class="btn btn-primary mt-2" value="¡Al lío!">
        </div>
    </form>
  </div>
</div>
<?php include_once "footer.php" ?>