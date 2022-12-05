<?php
    require ("../../../../database.php");
    session_start();

    $id_new = $_POST["new_id"];

    $sql = "DELETE FROM `users` WHERE id_new = '$id_new'";

    $resultado = mysqli_query($conexion, $sql);
    if ($resultado) {
        echo "success";
    } else {
        echo 'error';
    }
?>