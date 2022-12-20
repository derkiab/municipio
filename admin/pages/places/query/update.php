<?php
require ("../../../../database.php");
session_start();
$data = array();

$id = $_POST["id"];

$type_place = $_POST["type"];
$icon_place  = $_POST["icon"];


$sql = "UPDATE category_places_of_interest SET name_category='$type_place', icon_category='$icon_place' WHERE id_category ='$id'";

$resultado = mysqli_query($conexion, $sql);


if ($resultado) {
    echo $id;
} else {
    echo 'error';
}
?>
