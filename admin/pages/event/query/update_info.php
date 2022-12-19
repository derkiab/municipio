<?php
require ("../../../../database.php");
session_start();
$data = array();

$id = $_POST["event_id"];

$sql = "SELECT * FROM `events` WHERE id_event = '$id'";

$resultado = mysqli_query($conexion, $sql);


if ($resultado) {
    $eventData = $resultado->fetch_assoc();
    $data['result'] = $eventData;
    echo json_encode($data);
} else {
    echo 'error';
}
?>