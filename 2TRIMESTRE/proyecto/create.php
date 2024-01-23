<!-- Header -->
<?php include "header.php" ?>
<?php
  if ($_SESSION["usuario"]=="") {
    echo "<script>window.location='login.php';</script>"; 
  }
  $fecha_hoy = date("Y-m-d");
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
  if(isset($_POST['crear'])) {
    $fecha_alta = $fecha_hoy;
    $planta = htmlspecialchars($_POST['planta']);
    $aula = htmlspecialchars($_POST['aula']);
    $descripcion = htmlspecialchars($_POST['descripcion']);
    $comentario = htmlspecialchars($_POST['comentario']);
    $fecha_rev = htmlspecialchars($_POST['fecha_rev']);
    $fecha_sol = htmlspecialchars($_POST['fecha_sol']);

    $username = $_SESSION["usuario"];
    $query="SELECT * FROM usuarios WHERE username = '$username'";  
    $vista_usuarios= mysqli_query($conn,$query);            

    while($row = mysqli_fetch_assoc($vista_usuarios))
    {
      $id = $row['id'];  
    }
     
    $sql= "INSERT INTO incidencias (id_usuario, planta, aula, descripcion, fecha_alta, fecha_rev, fecha_sol, comentario) VALUES ('$id','$planta','$aula','$descripcion','$fecha_alta','$fecha_rev','$fecha_sol','$comentario')";

    if ($conn->query($sql) == TRUE) {
      echo "<script type='text/javascript'>alert('¡Incidencia añadida con éxito!')</script>";
      echo "<script>window.location='home.php';</script>";
    } 
    else {
      echo "Algo ha ido mal añadiendo la incidencia.";
    }      
  }
?>
<h1 class="text-center">Añadir incidencia</h1>
  <div class="container">
    <form action="" method="post">
      <div class="form-group">
        <label for="planta" class="form-label">Planta</label>
        <select name="planta" class="form-control" size="1">
            <option value='Primera Planta'>Primera Planta</option>
            <option value='Segunda Planta'>Segunda Planta</option>
            <option value='Tercera Planta'>Tercera Planta</option>
        </select>
      </div>
      <div class="form-group">
        <label for="aula" class="form-label">Aula</label>
        <select name="aula" class="form-control" size="1">
            <option value='Aula 1'>Aula 1</option>
            <option value='Aula 2'>Aula 2</option>
            <option value='Aula 3'>Aula 3</option>
            <option value='Aula 4'>Aula 4</option>
            <option value='Aula 5'>Aula 5</option>
        </select>
      </div>
      <div class="form-group">
        <label for="descripcion" class="form-label">Descripcion*</label>
        <input type="text" name="descripcion" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="fecha_alta" class="form-label">Fecha Alta</label>
        <input type="date" name="fecha_alta"  class="form-control"  value="<?php echo $fecha_hoy; ?>" disabled>
      </div>
      <div class="form-group">
        <label for="fecha_rev" class="form-label">Fecha Revisión</label>
        <input type="date" name="fecha_rev" class="form-control" disabled>
      </div>
      <div class="form-group">
        <label for="fecha_sol" class="form-label">Fecha Solución</label>
        <input type="date" name="fecha_sol"  class="form-control" disabled>
      </div>
      <div class="form-group">
        <label for="comentario" class="form-label">Comentario</label>
        <input type="text" name="comentario"  class="form-control">
      </div>
      <div class="form-group">
        <input type="submit"  name="crear" class="btn btn-primary mt-2" value="Añadir">
      </div>
    </form> 
  </div>
  <div class="container text-center mt-5">
    <a href="home.php" class="btn btn-warning mt-5"> Volver </a>
  <div>
<?php include "footer.php" ?>