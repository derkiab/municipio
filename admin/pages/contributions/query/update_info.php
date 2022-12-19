<?php
require ("../../../../database.php");
session_start();
$data = array();

$id = $_POST["id_opinion"];

$sql = "SELECT * FROM `opinions` WHERE id_opinion = '$id'";

$resultado = mysqli_query($conexion, $sql);


if ($resultado) {
    $userData = $resultado->fetch_assoc();
    $data['result'] = $userData;
    echo json_encode($data);
} else {
    echo 'error';
}
?>