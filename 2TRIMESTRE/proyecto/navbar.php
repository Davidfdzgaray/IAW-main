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
          <a class="nav-link active" style="color: black;" aria-current="page" href="users.php">Panel de Administración</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" style="color: black;" aria-current="page" href="logout.php">Cerrar Sesión</a>
        </li>
        <li class="nav-item" style="text-align:center;margin-left:100px">
        <?php
            $username = $_SESSION["usuario"];
            $query = "SELECT * FROM usuarios WHERE username = '$username'";
            $vista_usuario= mysqli_query($conn,$query);

            while($row = mysqli_fetch_assoc($vista_usuario)) {
                //avatar
                if (empty($row['imagen'])) {
                    //por defecto
                    $imagen='3289576_user_icon.png';
                } else {
                    $imagen=$row['imagen'];
                }

                //ip y ultima conexion
                $last_access = $row['last_access'];
                $ip = $row['IP'];

                if (empty($row['last_access']) && empty($row['IP'])) {
                    date_default_timezone_set("Europe/Madrid");
                    setlocale(LC_TIME, 'es_ES.UTF-8');
                    $date = strftime("%d de %B de %Y");
                    $time = date("H") . ":" . date("i");
                    $last_access = $date . " a las " . $time;
                    $ip = $_SERVER['REMOTE_ADDR'];
                }
            }
        ?>
        Está usted conectado como: <img src="<?php echo './media/' . $imagen; ?>" width="20" height="20" alt=""> <?php echo $_SESSION["usuario"] . ' con rol de "' . $_SESSION["rol"] . '"';?><br>
        <?php echo "Ultima Conexión: " . $last_access;?><br>
        <?php echo "Dirección de Ultima Conexión: " . $ip;?>
        </li>
      </ul>
    </div>
  </nav>