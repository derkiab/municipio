<?php
require ("../../../../database.php");
session_start();
$data = array();

$id = $_POST["user_id"];

$sql = "SELECT * FROM `users` WHERE id_user = '$id'";

$resultado = mysqli_query($conexion, $sql);


if ($resultado) {
    $userData = $resultado->fetch_assoc();
    $data['result'] = $userData;
    echo json_encode($data);
} else {
    echo 'error';
}
?>