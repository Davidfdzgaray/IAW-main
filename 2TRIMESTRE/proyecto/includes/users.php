<?php  include '../header.php'?>
<?php
  // Inicia o continua la sesión
  session_start();
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
        <a class="nav-link active" style="color: black;" aria-current="page" href="../index.php">Cerrar Sesión<?php session_destroy();?></a>
      </li>
    </ul>
    <span class="navbar-text">
      Sesión Iniciada Como: <?php echo $_SESSION["usuario"]?>
    </span>
  </div>
</nav>

<h1 class="text-center">Usuarios del Sistema</h1>
  <div class="container">
    <table class="table table-striped table-bordered table-hover">
      <thead class="table-dark">
        <tr>
              <th scope="col">ID</th>
              <th  scope="col">Nombre de Usuario</th>
              <th  scope="col">Contraseña</th>
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

                echo "<tr>";
                echo " <td >{$id}</td>";
                echo " <td > {$usuario}</td>";
                echo " <td > {$contrasena}</td>";
                //ELIMINAR
                echo " <td class='text-center'>  <a href='deleteuser.php?eliminarusuario={$id}' class='btn btn-danger'> <i class='bi bi-trash'></i> Eliminar</a> </td>";
                //MODIFICAR
                echo " <td class='text-center'> <a href='updateuser.php?editarusuario&usuario_id={$id}' class='btn btn-secondary'><i class='bi bi-pencil'></i> Editar</a> </td>";
                echo " </tr> ";
              }
            ?>
          </tr>  
        </tbody>
    </table>
  </div>

<?php include "../footer.php" ?>