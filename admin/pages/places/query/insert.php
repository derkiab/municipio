<?php
    require ("../../../../database.php");
    session_start();

    $type_place = $_POST["type"];
    $icon_place  = $_POST["icon"];


    $sql = "INSERT INTO category_places_of_interest VALUES ('','$type_place ', '$icon_place')";

    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        echo "success";
    } else
    {
        echo 'error';
    }
?>
