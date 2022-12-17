<?php
    require ("../../../../database.php");
    session_start();
    $date_event = $_POST["date"];
    $time_event  = $_POST["time"];
    $event_description = $_POST["description"];
    $event_image  = $_POST["image"];
    $event_status  = $_POST["status"];
    $title_event  = $_POST["title"];

    $sql = "INSERT INTO events VALUES ('','$date_event  ', '$time_event ', '$event_description ', '$event_image', '$event_status','$title_event ')";

    $resultado = mysqli_query($conexion, $sql);
    
    if ($resultado) {
        echo "success";
    } else 
    {
        echo 'error';
    }
?>