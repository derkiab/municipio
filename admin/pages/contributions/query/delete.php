<?php
    require ("../../../../database.php");
    session_start();

    $id_user = $_POST["user_id"];

    $sql = "DELETE FROM `users` WHERE id_user = '$id_user'";

    $resultado = mysqli_query($conexion, $sql);
    
    if ($resultado) {
        echo "success";
    } else {
        echo 'error';
    }
?>