<?php
require ("../../../../database.php");
session_start();
$data = array();

$id = $_POST["id_place2"];

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