<?php
    require ("../../../../database.php");
    session_start();

    $nombrelugar = $_POST['nombreLugar'];
    $tipolugar = $_POST['tipolugar'];
    $latitudlugar = $_POST['latitudlugar'];
    $longitudlugar = $_POST['longitudlugar'];
    $sql = "INSERT INTO places_of_interest VALUES ('','$tipolugar', '$nombrelugar','$latitudlugar','$longitudlugar')";

    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        echo "success";
    } else
    {
        echo 'error';
    }
?>