<?php include "header.php" ?>
<?php
  if (!isset($_SESSION["usuario"]) || empty($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
  }
?>

<?php include_once "navbar.php"; ?>

<h1 class="text-center">Detalles de incidencias</h1>
  <div class="container">
    <table class="table table-striped table-bordered table-hover">
      <thead class="table-dark">
        <tr>
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
                  $numero++;
                  $id = $row['id'];                
                  $planta = $row['planta'];        
                  $aula = $row['aula'];         
                  $descripcion = $row['descripcion'];        
                  $fecha_alta = $row['fecha_alta'];        
                  $fecha_rev = $row['fecha_rev'];        
                  $fecha_sol = $row['fecha_sol'];        
                  $comentario = $row['comentario'];

                      echo "<tr id='$numero'>";
                      echo " <td > {$planta}</td>";
                      echo " <td > {$aula}</td>";
                      echo " <td >{$descripcion} </td>"; 
                      echo " <td >{$fecha_alta} </td>";
                      echo " <td >{$fecha_rev} </td>";
                      echo " <td >{$fecha_sol} </td>";
                      echo " <td >{$comentario} </td>";
                      echo " </tr> ";

                      if ($fecha_sol == '0000-00-00' && $fecha_rev == '0000-00-00') {
                        echo "<script>document.getElementById('$numero').style.backgroundColor = 'rgba(255,0,0,0.3)'</script>";
                      }
                      else if ($fecha_sol == '0000-00-00' && $fecha_rev != '0000-00-00') {
                        echo "<script>document.getElementById('$numero').style.backgroundColor = 'rgba(255,255,0,0.3)'</script>";
                      }
                      else {
                        echo "<script>document.getElementById('$numero').style.backgroundColor = 'rgba(0,255,0,0.3)'</script>";
                      }
                }
                
            ?>
          </tr>  
        </tbody>
    </table>
  </div>

  <div class="container text-center mt-5">
    <a href="home.php" class="btn btn-warning mt-5"> Volver </a>
  <div>

<?php include "footer.php" ?>