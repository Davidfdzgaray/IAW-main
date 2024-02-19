<!-- Header -->
<?php include "header.php" ?>
<?php 
  if ($_SESSION['rol']!='administrador') {
    header("Location: home.php");
    exit();
  }
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <ul class="navbar-nav me-auto mb-2">
      <li class="nav-item">
        <a class="nav-link active" style="color: black;" aria-current="page" href="users.php">Inicio</a>
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
          $contrasena_antigua_c = $row['password'];
          $contrasena_antigua = base64_decode($contrasena_antigua_c);
          $rol = $row['role'];   
        }
 
    if(isset($_POST['editarusuario'])) {
      $usuario = htmlspecialchars($_POST['usuario']);
      $contrasena = htmlspecialchars($_POST['contrasena']);
      $codificada = base64_encode($contrasena);
      $contrasena_antigua_usu = htmlspecialchars($_POST['contrasena_antigua_usu']);
      $roln = htmlspecialchars($_POST['rol']);

      if ($contrasena == "" && $contrasena_antigua_usu == "" && $usuario != "" && $roln != "") {
        $query = "UPDATE usuarios SET username = '{$usuario}' , role = '{$roln}' WHERE id = {$id}";
          
        $usuario_actualizada = mysqli_query($conn, $query);
        if (!$usuario_actualizada) {
          echo "Se ha producido un error al actualizar el usuario.";
        }
        else {
          echo "<script type='text/javascript'>alert('¡Datos de usuario actualizados!')</script>";
          echo "<script>window.location='users.php';</script>";
        }
      } else { 
          if  ($contrasena == "" || $usuario == "" || $contrasena_antigua_usu == ""){
            echo '<script type="text/javascript"> alert("No se admiten vacios")</script>';
          } else {
            if  ($contrasena_antigua_usu != $contrasena_antigua) {
              echo '<script type="text/javascript"> alert("La contraseña actual es errónea")</script>';
            } else {
              $query = "UPDATE usuarios SET username = '{$usuario}' , password = '{$codificada}' , role = '{$roln}' WHERE id = {$id}";
          
              $usuario_actualizada = mysqli_query($conn, $query);
              if (!$usuario_actualizada) {
                echo "Se ha producido un error al actualizar el usuario.";
              }
              else {
                echo "<script type='text/javascript'>alert('¡Datos de usuario actualizados!')</script>";
                echo "<script>window.location='users.php';</script>";
              }
            }
          }
        }
    }             
?>

<h1 class="text-center">Actualizar usuario <?php echo 'Nº '. $_GET['usuario_id']?></h1>
  <div class="container ">
    <form action="" method="post">
      <div class="form-group">
        <label for="usuario" >Modificar Nombre de Usuario:</label>
        <input type="text" name="usuario" class="form-control" value="<?php echo $usuario  ?>">
      </div>
      <div class="form-group">
        <label for="contrasena_antigua_usu" >Contraseña Actual:</label>
        <input type="password" name="contrasena_antigua_usu" class="form-control">
      </div>
      <div class="form-group">
        <label for="contrasena" >Nueva Contraseña:</label>
        <input type="password" name="contrasena" class="form-control">
      </div>
      <div class="form-group">
        <label for="rol" >Rol:</label>
        <select name="rol" class="form-control" size="1">
            <option value='usuario' <?php if ($rol=='usuario') echo 'selected'; ?>>Usuario</option>
            <option value='profesorado' <?php if ($rol=='profesorado') echo 'selected'; ?>>Profesorado</option>
            <option value='administrador' <?php if ($rol=='administrador') echo 'selected'; ?>>Administrador</option>
        </select>
      </div>
      
      <div class="form-group">
         <input type="submit"  name="editarusuario" class="btn btn-primary mt-2" value="Editar Usuario">
      </div>
    </form>    
  </div>

<?php include "footer.php" ?>