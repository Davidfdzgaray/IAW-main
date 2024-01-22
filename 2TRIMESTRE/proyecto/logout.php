<?php include "header.php" ?>
<?php 
    session_destroy();
    echo "<script>window.location='home.php';</script>"; 
?>
<?php include "footer.php" ?>