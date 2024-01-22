<!-- Header -->
<?php include "header.php" ?>
<?php 
    if ($_SESSION["usuario"]!='admin') {
        echo "<script>window.location='home.php';</script>"; 
    }
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <ul class="navbar-nav me-auto mb-2">
      <li class="nav-item">
        <a class="nav-link active" style="color: black;" aria-current="page" href="admin.php">Inicio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" style="color: black;" aria-current="page" href="view2.php">Ver Incidencias</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" style="color: black;" aria-current="page" href="logout.php">Cerrar Sesión</a>
      </li>
    </ul>
    <span class="navbar-text">
      Sesión Iniciada Como: <?php echo $_SESSION["usuario"]?>
    </span>
  </div>
</nav>

<?php
   if(isset($_GET['usuario_id']))
    {
      $usuarioid = htmlspecialchars($_GET['usuario_id']); 
    }
      
      $query="SELECT * FROM usuarios WHERE id = $usuarioid ";
      $vista_usuario= mysqli_query($conn,$query);

      while($row = mysqli_fetch_assoc($vista_usuario))
        {
          $id = $row['id'];                
          $usuario = $row['username'];        
          $contrasena = $row['password'];
        }
 
    if(isset($_POST['editarusuario'])) 
    {
      $usuario = htmlspecialchars($_POST['usuario']);
      $contrasena = htmlspecialchars($_POST['contrasena']);
      $codificada = base64_encode($contrasena);

      $query = "UPDATE usuarios SET username = '{$usuario}' , password = '{$codificada}' WHERE id = {$id}";
      
      $usuario_actualizada = mysqli_query($conn, $query);
      if (!$usuario_actualizada)
        echo "Se ha producido un error al actualizar el usuario.";
      else
        echo "<script type='text/javascript'>alert('¡Datos de usuario actualizados!')</script>";
        echo "<script>window.location='users.php';</script>";
    }             
?>

<h1 class="text-center">Actualizar usuario <?php echo 'Nº '. $_GET['usuario_id']?></h1>
  <div class="container ">
    <form action="" method="post">
      <div class="form-group">
        <label for="usuario" >Usuario</label>
        <input type="text" name="usuario" class="form-control" value="<?php echo $usuario  ?>">
      </div>
      <div class="form-group">
        <label for="contrasena" >Contraseña</label>
        <input type="text" name="contrasena" class="form-control">
      </div>
      
      <div class="form-group">
         <input type="submit"  name="editarusuario" class="btn btn-primary mt-2" value="Editar Usuario">
      </div>
    </form>    
  </div>

<?php include "footer.php" ?>