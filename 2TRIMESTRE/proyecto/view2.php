<?php include "header.php" ?>
<?php
  if (!isset($_SESSION["usuario"]) || empty($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
  }

  $username =  $_SESSION['usuario'];
  $query="SELECT * FROM usuarios WHERE username = '{$username}'"; 
  $vista_usuarios= mysqli_query($conn,$query);            

  while($row = mysqli_fetch_assoc($vista_usuarios))
  {
    $date = $row['last_date'];
    $time = $row['last_time'];
    $ip = $row['IP'];
  }

  if ($date == "" && $time  ==  "") {
    date_default_timezone_set("Europe/Madrid");
    $date = date("d") . "/" . date("m") . "/" . date("Y");
    $time = date("H") . ":" . date("i");
  }
?>
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
        <a class="nav-link active" style="color: black;" aria-current="page" href="logout.php">Cerrar Sesión</a>
      </li>
    </ul>
    <span class="navbar-text">
      <img src="./media/3289576_user_icon.png" width="20" height="20"  alt=""> <?php echo $_SESSION["usuario"]; ?>
    </span>
  </div>
</nav>

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