<?php
require ("../../../../database.php");
session_start();
$data = array();

$id_lugar = $_POST["ingresolugarmapa3"];




$sql = "SELECT id_place,name_place,category_place, latitude_place, longitude_place, category_places_of_interest.icon_category FROM places_of_interest, category_places_of_interest WHERE id_place = '$id_lugar' AND id_category = category_place";

$resultado = mysqli_query($conexion, $sql);


if ($resultado) {
    $newsData = $resultado->fetch_assoc();
    $data['result'] = $newsData;
    echo json_encode($data);
} else {
    echo 'error';
}
?>