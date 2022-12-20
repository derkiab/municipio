<?php
require ("../../../../database.php");
session_start();
$data = array();

$id = $_POST["id_mapa"];

$sql = "SELECT * FROM `maps` WHERE id_map = '$id'";

$resultado = mysqli_query($conexion, $sql);


if ($resultado) {
    $newsData = $resultado->fetch_assoc();
    $data['result'] = $newsData;
    echo json_encode($data);
} else {
    echo 'error';
}
?>