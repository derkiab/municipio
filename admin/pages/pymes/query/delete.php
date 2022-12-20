<?php
    require ("../../../../database.php");
    session_start();

    $id_entrepreneur = $_POST["entrepreneur_id"];

    $sql = "DELETE FROM `entrepreneurs` WHERE id_entrepreneur = '$id_entrepreneur'";

    $resultado = mysqli_query($conexion, $sql);
    if ($resultado) {
        echo "success";
    } else {
        echo 'error';
    }
?>