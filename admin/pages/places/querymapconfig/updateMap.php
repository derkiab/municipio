<?php
require ("../../../../database.php");
session_start();
$data = array();

$id = $_POST["id1"];
$latitudlimitenoreste = $_POST["latitudlimitenoreste"];
$longitudlimitenoreste = $_POST["longitudlimitenoreste"];
$latitudlimitesuroeste = $_POST["latitudlimitesuroeste"];
$longitudlimitesuroeste = $_POST["longitudlimitesuroeste"];
$centrox = $_POST["centrox"];
$centroy = $_POST["centroy"];
$minzoom = $_POST["minzoom"];
$maxzoom = $_POST["maxzoom"];



$sql = "UPDATE maps SET lat_northeast='$latitudlimitenoreste', lng_northeast='$longitudlimitenoreste', 
lat_southwest = '$latitudlimitesuroeste', lng_southwest = '$longitudlimitesuroeste',center_x = '$centrox', center_y ='$centroy',min_zoom ='$minzoom',max_zoom='$maxzoom' ";

$resultado = mysqli_query($conexion, $sql);


if ($resultado) {
    echo $id;
} else {
    echo 'error';
}
?>