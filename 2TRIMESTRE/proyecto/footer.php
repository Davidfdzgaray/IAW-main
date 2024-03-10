<footer class="blockquote-footer fixed-bottom">Gestión de incidencias del <a href="https://iesamachado.org" target="_blank">IES Antonio Machado</a>. Desarrollado por David Fernández Garay<br>
<span class="navbar-text" style="color: black;">
    <?php
        $username = $_SESSION["usuario"];
        $query = "SELECT * FROM usuarios WHERE username = '$username'";
        $vista_usuario= mysqli_query($conn,$query);

        //avatar
        while($row = mysqli_fetch_assoc($vista_usuario)) {
            if (empty($row['imagen'])) {
                $imagen='./media/3289576_user_icon.png';
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
    <img src="<?php echo $imagen; ?>" width="20" height="20" alt=""> <?php echo $_SESSION["usuario"];?><br>
    <?php echo "Ultima Conexión: " . $last_access;?><br>
    <?php echo "Dirección de Ultima Conexión: " . $ip;?>
</span>
</footer>
</body>
</html>