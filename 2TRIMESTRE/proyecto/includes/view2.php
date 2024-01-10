<?php  include '../header.php'?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <ul class="navbar-nav me-auto mb-2">
      <li class="nav-item">
        <a class="nav-link active" style="color: black;" aria-current="page" href="home.php">Inicio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" style="color: black;" aria-current="page" href="view2.php">Ver Incidencias</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" style="color: black;" aria-current="page" href="../index.php">Cerrar sesión</a>
      </li>
      <li class="nav-item" style="position: relative;right: -200%;">
        <a class="nav-link active" style="color: black;" aria-current="page">Sesión iniciada como:</a>
      </li>
    </ul>
  </div>
</nav>

<h1 class="text-center">Detalles de incidencias</h1>
  <div class="container">
    <table class="table table-striped table-bordered table-hover">
      <thead class="table-dark">
        <tr>
              <th scope="col">ID</th>
              <th  scope="col">Planta</th>
              <th  scope="col">Aula</th>
              <th  scope="col">Descripción</th>
              <th  scope="col">Fecha alta</th>
              <th  scope="col">Fecha revisión</th>
              <th  scope="col">Fecha solución</th>
              <th  scope="col">Comentario</th>
        </tr>  
      </thead>
        <tbody>
          <tr>
               
            <?php
                $query="SELECT * FROM incidencias";  
                $vista_incidencias= mysqli_query($conn,$query);            

                while($row = mysqli_fetch_assoc($vista_incidencias))
                {
                  $id = $row['id'];                
                  $planta = $row['planta'];        
                  $aula = $row['aula'];         
                  $descripcion = $row['descripcion'];        
                  $fecha_alta = $row['fecha_alta'];        
                  $fecha_rev = $row['fecha_rev'];        
                  $fecha_sol = $row['fecha_sol'];        
                  $comentario = $row['comentario'];

                      echo "<tr >";
                      echo " <td >{$id}</td>";
                      echo " <td > {$planta}</td>";
                      echo " <td > {$aula}</td>";
                      echo " <td >{$descripcion} </td>"; 
                      echo " <td >{$fecha_alta} </td>";
                      echo " <td >{$fecha_rev} </td>";
                      echo " <td >{$fecha_sol} </td>";
                      echo " <td >{$comentario} </td>";
                      echo " </tr> ";
                }
                
            ?>
          </tr>  
        </tbody>
    </table>
  </div>

  <div class="container text-center mt-5">
    <a href="home.php" class="btn btn-warning mt-5"> Volver </a>
  <div>

<?php include "../footer.php" ?>