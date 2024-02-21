<?php include_once "header.php"; ?>
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
        <a class="nav-link active" style="color: black;"  aria-current="page" href="home.php">Inicio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" style="color: black;" aria-current="page" href="view2.php">Ver Incidencias</a>
      </li>
      <li class="nav-item" <?php if ($_SESSION['rol']!='administrador') echo 'hidden';?>>
        <a class="nav-link active" style="color: black;" aria-current="page" href="users.php">Administrar Usuarios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" style="color: black;" aria-current="page" href="logout.php">Cerrar Sesión</a>
      </li>
    </ul>
  </div>
</nav>

  <div class="container">
    <h1 class="text-center" >Gestión de incidencias (CRUD)</h1><br>
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
              <th  scope="col" colspan="3" class="text-center">Operaciones</th>
            </tr>  
          </thead>
            <tbody>
              <tr>
                <?php
                  $total=0;
                  $num_pend=0;
                  $num_res=0;

                  $query="SELECT * FROM incidencias";               
                  $vista_incidencias= mysqli_query($conn,$query);

                  while($row= mysqli_fetch_assoc($vista_incidencias)){
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
                    echo " <td >";
                    if ($fecha_rev != '0000-00-00') echo $fecha_rev;
                    echo "</td>";
                    echo " <td >";
                    if ($fecha_sol != '0000-00-00') echo $fecha_sol;
                    echo "</td>";
                    echo " <td >{$comentario} </td>";
                    echo " <td class='text-center'> <a href='view.php?incidencia_id={$id}' class='btn btn-primary'> <i class='bi bi-eye'></i> Ver</a> </td>";
                    echo " <td class='text-center' >";
                    if ($fecha_sol == '0000-00-00' || $fecha_rev == '0000-00-00') {
                      if ($_SESSION["rol"] != 'profesor') {
                        echo "<a href='update.php?editar&incidencia_id={$id}' class='btn btn-secondary'><i class='bi bi-pencil'></i> Editar</a> </td>";
                    
                      }
                    }
                    if ($_SESSION["rol"] != 'profesor' && $_SESSION["rol"] != 'direccion') {
                      echo " <td class='text-center'>  <a href='delete.php?eliminar={$id}' class='btn btn-danger'> <i class='bi bi-trash'></i> Eliminar</a> </td>";
                    }
                    echo " </tr> ";

                    if ($fecha_sol == '0000-00-00' && $fecha_rev == '0000-00-00') {
                      $total++;
                      $num_pend++;
                      echo "<script>document.getElementById('$numero').style.backgroundColor = 'rgba(255,0,0,0.3)'</script>";
                    }
                    else if ($fecha_sol == '0000-00-00' && $fecha_rev != '0000-00-00') {
                      $total++;
                      $num_pend++;
                      echo "<script>document.getElementById('$numero').style.backgroundColor = 'rgba(255,255,0,0.3)'</script>";
                    }
                    else if ($fecha_sol != '0000-00-00' && $fecha_rev != '0000-00-00') {
                      $total++;
                      $num_res++;
                      echo "<script>document.getElementById('$numero').style.backgroundColor = 'rgba(0,255,0,0.3)'</script>";
                    }
                  }  

                  echo "<h2 class='text-center'>Nº total de incidencias: {$total}</h2>";
                  echo "<h2 class='text-center'>Nº de incidencias pendientes: {$num_pend}</h2>";
                  echo "<h2 class='text-center'>Nº de incidencias resueltas: {$num_res}</h2>";
                ?>
              </tr>  
            </tbody>
      </table>
  </div>
<div class="container text-center mt-5">
  <a href="create.php" class='btn btn-outline-dark mb-2'> <i class="bi bi-person-plus"></i> Añadir incidencia</a><br>
<div>

<?php include "footer.php" ?>