<?php
require_once('../../templates/header.php');

?>
<!-- empezar aqui -->

<!-- Contenido Datatables -->
<?php
    require('../../../database.php');
 


    $consulta = "SELECT * FROM users";
    $user = mysqli_query($conexion, $consulta);

    $consulta_rol = "SELECT * FROM roles";
    $rol = mysqli_query($conexion, $consulta_rol);
?>



<!-- Fin Contenido -->
<?php
    require_once('../../templates/footer.php');
?>
