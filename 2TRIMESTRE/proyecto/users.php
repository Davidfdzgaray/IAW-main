<?php include "header.php" ?>
<?php 
  if ($_SESSION['rol']!='administrador') {
    header("Location: home.php");
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
<script>
    function confirmarEliminacion(id) {
      var confirmacion = confirm('¿Estás seguro de que deseas eliminar este usuario?');
      if (confirmacion) {
          // Si el usuario confirma, redirigir a eliminar_usuario.php con el ID del usuario
          window.location = 'deleteuser.php?eliminarusuario=' + id;
      } else {
          // Si el usuario cancela, no hacer nada
      }
    }
</script>
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

<br>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
  Foto: <input type="file" name="foto"><br><br>
  <input type="submit" value="Enviar" name='submit'>
</form>
<?php
  if (isset($_POST['submit'])) {
    $foto = htmlspecialchars($_POST['foto']);
    $tmpfoto = $_FILES["foto"]["tmp_name"];
  
    if (is_uploaded_file($tmpfoto)) {
      $rutadestino =  "media/";
      move_uploaded_file($tmpfoto, $rutadestino); 
      echo "Correcto";
    } 
    else {
      echo "Error";
    }
  } 
?>

<h1 class="text-center">Usuarios del Sistema</h1>
  <div class="container">
    <table class="table table-striped table-bordered table-hover">
      <thead class="table-dark">
        <tr>
              <th scope="col">ID</th>
              <th  scope="col">Nombre de Usuario</th>
              <th  scope="col">Correo Eléctronico</th>
              <th  scope="col">Contraseña</th>
              <th  scope="col">Rol</th>
              <th  scope="col">Nº Incidencias</th>
              <th  scope="col" colspan="2" class="text-center">Operaciones</th>
        </tr>  
      </thead>
        <tbody>
          <tr>    
            <?php
              $query="SELECT * FROM usuarios";  
              $vista_usuarios= mysqli_query($conn,$query);            

              while($row = mysqli_fetch_assoc($vista_usuarios))
              {
                $id = $row['id'];                
                $usuario = $row['username'];        
                $contrasena = $row['password'];
                $rol = $row['role'];
                $email = $row['email'];
                
                if ($usuario!=$_SESSION['usuario']) {
                  echo "<tr>";
                  echo " <td >{$id}</td>";
                  echo " <td > {$usuario}</td>";
                  echo " <td > {$email}</td>";
                  echo " <td > {$contrasena}</td>";
                  echo " <td > {$rol}</td>";

                  /*N INCIDENCIAS*/
                  $queryi="SELECT count(id) FROM incidencias WHERE id_usuario = {$id}";            
                  $vista_incidencias= mysqli_query($conn,$queryi);

                  while($row= mysqli_fetch_assoc($vista_incidencias)){
                    $nincidencias=$row['count(id)'];
                    echo "<td>{$nincidencias}</td>";
                  }

                  //ELIMINAR
                  echo " <td class='text-center'>  <a onclick=\"confirmarEliminacion($id)\" class='btn btn-danger'> <i class='bi bi-trash'></i> Eliminar</a> </td>";
                  //MODIFICAR
                  echo " <td class='text-center'> <a href='updateuser.php?editarusuario&usuario_id={$id}' class='btn btn-secondary'><i class='bi bi-pencil'></i> Editar</a> </td>";
                  echo " </tr> ";
                }
              }
            ?>
          </tr>  
          <div class="container text-center mt-5">
            <a href='create_user.php' class='btn btn-outline-dark mb-2'> <i class="bi bi-person-plus"></i> Añadir Usuario</a><br>
          <div>
        </tbody>
    </table>
  </div>
  <?php include "footer.php" ?>