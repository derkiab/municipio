<?php
require ("../../../../database.php");
session_start();
$data = array();

$id_event = $_POST["event_id"];
$date_event = $_POST["date"];
$time_event = $_POST["time"];
$title_event = $_POST["title"];
$event_description = $_POST["description"];
$event_image= $_POST["image"];
$id_status_event = $_POST["status"];


$sql = "UPDATE events SET date_event='$date_event', time_event='$time_event', title_event='$title_event', event_description='$event_description', event_image='$event_image', id_status_event='$id_status_event' WHERE id_event = '$id_event'";

$resultado = mysqli_query($conexion, $sql);


if ($resultado) {
    echo 'success';
} else {
    echo 'error';
}
?>