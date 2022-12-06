<?php
    require ("../../../../database.php");
    session_start();

    $id_event = $_POST["event_id"];

    $sql = "DELETE FROM `events` WHERE id_event = '$id_event'";

    $resultado = mysqli_query($conexion, $sql);
    if ($resultado) {
        echo "success";
    } else {
        echo 'error';
    }
?>