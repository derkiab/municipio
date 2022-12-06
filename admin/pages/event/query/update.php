<?php
require ("../../../../database.php");
session_start();
$data = array();

$id_event = $_POST["event_id"];
$date_event = $_POST["date"];
$time_event = $_POST["time"];
$title_event = $_POST["title"];
$event_description = $_POST["description"];
$event_image	 = $_POST["image"];
$event_status = $_POST["status"];

$sql = "UPDATE events SET date_event='$date_event', time_event='$time_event', event_description='$event_description', event_image='$event_image', event_status='$event_status' , title_event='$title_event' WHERE id_event = '$id_event'";

$resultado = mysqli_query($conexion, $sql);


if ($resultado) {
    echo 'success';
} else {
    echo 'error';
}
?>