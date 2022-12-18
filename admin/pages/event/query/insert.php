<?php
    require ("../../../../database.php");
    session_start();
    $date_event = $_POST["date"];
    $time_event  = $_POST["time"];
    $title_event  = $_POST["title"];
    $event_description = $_POST["description"];
    $event_image  = $_POST["image"];
    $id_status_event  = $_POST["status"];
   

    $sql = "INSERT INTO events VALUES ('','$date_event  ', '$time_event ','$title_event ', '$event_description ', '$event_image', '$id_status_event')";

    $resultado = mysqli_query($conexion, $sql);
    
    if ($resultado) {
        echo "success";
    } else 
    {
        echo 'error';
    }
?>