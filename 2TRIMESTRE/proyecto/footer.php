<footer class="blockquote-footer fixed-bottom">Gestión de incidencias del <a href="https://iesamachado.org" target="_blank">IES Antonio Machado</a>. Desarrollado por David Fernández Garay<br>
<span class="navbar-text" style="color: black;">
    <img src="./media/3289576_user_icon.png" width="20" height="20" alt=""> <?php echo $_SESSION["usuario"];?><br>
    <?php echo "Ultima Conexión: " . $date . " " . $time;?><br>
    <?php echo "Dirección de Ultima Conexión: " . $ip;?>
</span>
</footer>
</body>
</html>