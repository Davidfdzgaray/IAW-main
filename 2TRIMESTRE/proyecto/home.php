<?php include_once "header.php"; ?>
<?php
  if (!isset($_SESSION["usuario"]) || empty($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
  }
?>

<?php include_once "navbar.html"; ?>

<form method="post" enctype="multipart/form-data">
  <h5>Cambiar Imagen de Perfil:</h5> 
  <input type="file" name="imagen"><br><br>
  <input type="submit" value="Enviar" name='submit'>
</form>

<?php
if (isset($_POST['submit'])) {
  $imagen = $_FILES["imagen"]["name"]; // Obtienes el nombre del archivo
  $tmpimagen = $_FILES["imagen"]["tmp_name"];

  if (is_uploaded_file($tmpimagen)) {
    $rutadestino = "media/" . $imagen; // Especificas la ruta de destino
    move_uploaded_file($tmpimagen, $rutadestino); 
    echo "<script type='text/javascript'>alert('Imagen Subida Correctamente')</script>";

    $username = $_SESSION["usuario"];
    $queryw = "UPDATE usuarios SET imagen = '{$imagen}' WHERE username = '{$username}'"; // Escapas el valor de username
    mysqli_query($conn, $queryw);
  } 
  else {
    echo "<script type='text/javascript'>alert('Error al Subir la Imagen')</script>";
  }
} 
?>

  <div class="container">
    <h1 class="text-center" >Gestión de incidencias (CRUD)</h1><br>
        <table class="table table-striped table-bordered table-hover">
          <thead class="table-dark">
            <tr>
              <th  scope="col">Planta</th>
              <th  scope="col">Aula</th>
              <th  scope="col">Descripción</th>
              <th  scope="col"><a href="?ordenar=fecha_alta">Fecha alta</a></th>
              <th  scope="col"><a href="?ordenar=fecha_rev">Fecha revisión</a></th>
              <th  scope="col"><a href="?ordenar=fecha_sol">Fecha solución</a></th>
              <th  scope="col">Comentario</th>
              <th  scope="col">Estado</th>
              <th  scope="col" colspan="3" class="text-center">Operaciones</th>
            </tr>  
          </thead>
            <tbody>
              <tr>
                <?php
                  $total=0;
                  $num_pend=0;
                  $num_res=0;

                  // defecto
                  $orden = 'fecha_alta';

                  if(isset($_GET['ordenar'])) {
                    $orden = $_GET['ordenar'];
                  }

                  $query="SELECT * FROM incidencias ORDER BY {$orden}"; 
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
                    //ESTADO y COLOR
                    if ($fecha_sol == '0000-00-00' && $fecha_rev == '0000-00-00') {
                      $total++;
                      $num_pend++;
                      echo "<script>document.getElementById('$numero').style.backgroundColor = 'rgba(255,0,0,0.3)'</script>";
                      $estado = 'Pendiente';
                    }
                    else if ($fecha_sol == '0000-00-00' && $fecha_rev != '0000-00-00') {
                      $total++;
                      $num_pend++;
                      echo "<script>document.getElementById('$numero').style.backgroundColor = 'rgba(255,255,0,0.3)'</script>";
                      $estado = 'Revisada';
                    }
                    else if ($fecha_sol != '0000-00-00' && $fecha_rev != '0000-00-00') {
                      $total++;
                      $num_res++;
                      echo "<script>document.getElementById('$numero').style.backgroundColor = 'rgba(0,255,0,0.3)'</script>";
                      $estado = 'Solucionada';
                    }

                    echo " <td >{$estado} </td>";
                    //OPERACIONES
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