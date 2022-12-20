<?php
    require ("../../../../database.php");
    session_start();

    $id_user = $_POST["id_place2"];

    $sql = "DELETE FROM `places_of_interest` WHERE id_place = '$id_user'";

    $resultado = mysqli_query($conexion, $sql);
    
    if ($resultado) {
        echo "success";
    } else {
        echo 'error';
    }
?>