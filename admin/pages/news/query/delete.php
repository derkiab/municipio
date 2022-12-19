<?php
    require ("../../../../database.php");
    session_start();

    $id_news = $_POST["new_id"];

    $sql = "DELETE FROM `news` WHERE id_news = '$id_news'";

    $resultado = mysqli_query($conexion, $sql);
    if ($resultado) {
        echo "success";
    } else {
        echo 'error';
    }
?>