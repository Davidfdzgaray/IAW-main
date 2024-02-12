<?php include_once "header.php" ?>
<div class="container mt-5">
    <h1 class="text-center"> Gestión simple de incidencias</h1>
        <p class="text-center">
            Ejemplo sin uso de cookies ni sesiones para implementar un CRUD en PHP con MySQL
        </p>
  <div class="container">
    <form action="login.php" method="post">
        <div class="from-group text-center">
            <input type="submit" class="btn btn-primary mt-2" value="¡Al lío!">
        </div>
    </form>
  </div>
</div>
<?php include_once "footer.php" ?>

<?php 
/*AÑADIR*/
/* Crea un panel de administración que permitirá añadir usuarios. 
Los usuarios podrán tener distintos perfiles: dirección, profesorado y administradores.
Solo los usuarios iniciales (pacomaestre, joseluisnunez, josecarlosgarcia) podrán acceder al panel de administración.
Los administradores podrán eliminar otros usuarios del sistema
Solo los usuarios administradores y dirección podrán eliminar incidencias o modificar incidencias. 
El resto de usuarios, profesorado, tan solo podrá añadir incidencias o consultarlas.
Al resolver una incidencia se enviará un correo electrónico a la dirección del usuario que la dio de alta(añade email como campo a la tabla usuarios) comunicándole que ha sido resuelta. 
Esta incidencia no se borra del sistema pero ya no se mostrará en pantalla al consultar las incidencias abiertas.
*/ ?>