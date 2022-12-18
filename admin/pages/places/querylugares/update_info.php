<?php
require ("../../../../database.php");
session_start();
$data = array();

$id = $_POST["new_id"];

$sql = "SELECT * FROM `places_of_interest` WHERE id_place = '$id'";

$resultado = mysqli_query($conexion, $sql);


if ($resultado) {
    $newsData = $resultado->fetch_assoc();
    $data['result'] = $newsData;
    echo json_encode($data);
} else {
    echo 'error';
}
?>