<?php
require ("../../../../database.php");
session_start();
$data = array();

$id = $_POST["user_id"];

$sql = "SELECT * FROM `category_places_of_interest` WHERE id_category = '$id'";

$resultado = mysqli_query($conexion, $sql);


if ($resultado) {
    $newsData = $resultado->fetch_assoc();
    $data['result'] = $newsData;
    echo json_encode($data);
} else {
    echo 'error';
}
?>
