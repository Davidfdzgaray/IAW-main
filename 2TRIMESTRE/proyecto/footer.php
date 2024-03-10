<footer class="blockquote-footer"><br><br>
Gestión de incidencias del <a href="https://iesamachado.org" target="_blank">IES Antonio Machado</a>. Desarrollado por David Fernández Garay<br>
<span class="navbar-text" style="color: black;">
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
                $date = date("d") . "/" . date("m") . "/" . date("Y");
                $time = date("H") . ":" . date("i");
                $last_access = $date . " " . $time;
                $ip = $_SERVER['REMOTE_ADDR'];
            }
        }
    ?>
    <img src="<?php echo './media/' . $imagen; ?>" width="20" height="20" alt=""> <?php echo $_SESSION["usuario"];?><br>
    <?php echo "Ultima Conexión: " . $last_access;?><br>
    <?php echo "Dirección de Ultima Conexión: " . $ip;?>
</span>
</footer>
</body>
</html>