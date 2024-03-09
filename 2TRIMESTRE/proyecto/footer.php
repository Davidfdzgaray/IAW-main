<footer class="blockquote-footer fixed-bottom">Gestión de incidencias del <a href="https://iesamachado.org" target="_blank">IES Antonio Machado</a>. Desarrollado por David Fernández Garay<br>
<span class="navbar-text" style="color: black;">
    <?php
        $username = $_SESSION["usuario"];
        $query = "SELECT * FROM usuarios WHERE username = '$username'";
        $vista_usuario= mysqli_query($conn,$query);

        while($row = mysqli_fetch_assoc($vista_usuario)) {
            if (empty($row['imagen'])) {
                $imagen='./media/3289576_user_icon.png';
            } else {
                $imagen=$row['imagen'];
            }
        } 
    ?>
    <img src="<?php echo $imagen; ?>" width="20" height="20" alt=""> <?php echo $_SESSION["usuario"];?><br>
    <?php echo "Ultima Conexión: " . $date . " " . $time;?><br>
    <?php echo "Dirección de Ultima Conexión: " . $ip;?>
</span>
</footer>
</body>
</html>