<?php
require ("../../../../database.php");
session_start();
$data = array();

$id = $_POST["entrepreneur_id"];

$sql = "SELECT * FROM `entrepreneurs` WHERE id_entrepreneur = '$id'";

$resultado = mysqli_query($conexion, $sql);


if ($resultado) {
    $entrepreneurData = $resultado->fetch_assoc();
    $data['result'] = $entrepreneurData;
    echo json_encode($data);
} else {
    echo 'error';
}
?>