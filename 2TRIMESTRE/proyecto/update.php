<!-- Header -->
<?php include "header.php" ?>
<?php
  if ($_SESSION["usuario"]=="") {
    echo "<script>window.location='login.php';</script>"; 
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

<?php
   if(isset($_GET['incidencia_id']))
    {
      $incidenciaid = htmlspecialchars($_GET['incidencia_id']); 
    }

      $query="SELECT * FROM incidencias WHERE id = $incidenciaid ";
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
        }
    
    if(isset($_POST['editar'])) 
    {
      $planta = htmlspecialchars($_POST['planta']);
      $aula = htmlspecialchars($_POST['aula']);
      $descripcion = htmlspecialchars($_POST['descripcion']);
      $fecha_rev = htmlspecialchars($_POST['fecha_rev']);
      $fecha_sol = htmlspecialchars($_POST['fecha_sol']);
      $comentario = htmlspecialchars($_POST['comentario']);

      $query = "UPDATE incidencias SET planta = '{$planta}' , aula = '{$aula}' , descripcion = '{$descripcion}', fecha_alta = '{$fecha_alta}', fecha_rev = '{$fecha_rev}', fecha_sol = '{$fecha_sol}', comentario = '{$comentario}' WHERE id = {$id}";
      
      $incidencia_actualizada = mysqli_query($conn, $query);
      if (!$incidencia_actualizada)
        echo "Se ha producido un error al actualizar la incidencia.";
      else
        echo "<script type='text/javascript'>alert('¡Datos de la incidencia actualizados!')</script>";
        echo "<script>window.location='home.php';</script>";
    }             
?>

<h1 class="text-center">Actualizar incidencia <?php echo 'Nº '. $_GET['incidencia_id']?></h1>
  <div class="container ">
    <form action="" method="post">
      <div class="form-group">
        <label for="planta" >Planta</label>
        <select name="planta" class="form-control" size="1" disabled>
            <option value='Primera Planta' <?php if ($planta=='Primera Planta') echo 'selected'; ?>>Primera Planta</option>
            <option value='Segunda Planta' <?php if ($planta=='Segunda Planta') echo 'selected'; ?>>Segunda Planta</option>
            <option value='Tercera Planta' <?php if ($planta=='Tercera Planta') echo 'selected'; ?>>Tercera Planta</option>
        </select>
      </div>
      <div class="form-group">
        <label for="aula" >Aula</label>
        <select name="aula" class="form-control" size="1" disabled>
            <option value='Aula 1' <?php if ($aula=='Aula 1') echo 'selected'; ?>>Aula 1</option>
            <option value='Aula 2' <?php if ($aula=='Aula 2') echo 'selected'; ?>>Aula 2</option>
            <option value='Aula 3' <?php if ($aula=='Aula 3') echo 'selected'; ?>>Aula 3</option>
            <option value='Aula 4' <?php if ($aula=='Aula 4') echo 'selected'; ?>>Aula 4</option>
            <option value='Aula 5' <?php if ($aula=='Aula 5') echo 'selected'; ?>>Aula 5</option>
        </select>
      </div>
      <div class="form-group">
        <label for="descripcion" >Descripción</label>
        <input type="text" name="descripcion" class="form-control" value="<?php echo $descripcion  ?>">
      </div>
      <div class="form-group">
        <label for="fecha_alta" >Fecha alta</label>
        <input type="date" name="fecha_alta" class="form-control" value="<?php echo $fecha_alta;?>" disabled>
      </div>
      <div class="form-group">
        <label for="fecha_rev" >Fecha revisión</label>
        <input type="date" <?php if ($fecha_rev != '0000-00-00') echo 'disabled';?> max="<?php echo date('Y-m-d');?>" min="<?php echo $fecha_alta;?>" name="fecha_rev" class="form-control" value="<?php echo $fecha_rev  ?>">
      </div>
      <div class="form-group">
        <label for="fecha_sol" >Fecha solución</label>
        <input type="date" max="<?php echo date('Y-m-d');?>" min="<?php echo $fecha_alta;?>" name="fecha_sol" class="form-control" value="<?php echo $fecha_sol  ?>">
      </div>
      <div class="form-group">
        <label for="comentario" >Comentario</label>
        <input type="text" name="comentario" class="form-control" value="<?php echo $comentario  ?>">
      </div>
      <div class="form-group">
         <input type="submit"  name="editar" class="btn btn-primary mt-2" value="editar">
      </div>
    </form>    
  </div>

    <div class="container text-center mt-5">
      <a href="home.php" class="btn btn-warning mt-5"> Volver </a>
    <div>

<?php include "footer.php" ?>