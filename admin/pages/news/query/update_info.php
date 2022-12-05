<?php
require ("../../../../database.php");
session_start();
$data = array();

$id = $_POST["new_id"];

$sql = "SELECT * FROM `news` WHERE id_news = '$id'";

$resultado = mysqli_query($conexion, $sql);


if ($resultado) {
    $userData = $resultado->fetch_assoc();
    $data['result'] = $newsData;
    echo json_encode($data);
} else {
    echo 'error';
}
?>