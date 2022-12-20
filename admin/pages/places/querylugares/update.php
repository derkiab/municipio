<?php
require ("../../../../database.php");
session_start();
$data = array();

$id = $_POST["id1"];
$nombrelugar = $_POST["nombreLugar"];
$tipolugar  = $_POST["tipolugar"];
$latitudlugar = $_POST["latitudlugar"];
$longitudlugar = $_POST["longitudlugar"];


$sql = "UPDATE places_of_interest SET category_place='$tipolugar', name_place='$nombrelugar', latitude_place = '$latitudlugar', longitude_place = '$longitudlugar' WHERE id_place ='$id'";

$resultado = mysqli_query($conexion, $sql);


if ($resultado) {
    echo $id;
} else {
    echo 'error';
}
?>