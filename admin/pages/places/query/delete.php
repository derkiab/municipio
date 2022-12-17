<?php
    require ("../../../../database.php");
    session_start();

    $id_user = $_POST["new_id"];

    $sql = "DELETE FROM `category_places_of_interest` WHERE id_category = '$id_user'";

    $resultado = mysqli_query($conexion, $sql);
    
    if ($resultado) {
        echo "success";
    } else {
        echo 'error';
    }
?>