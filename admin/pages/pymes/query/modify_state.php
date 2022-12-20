<?php
require ("../../../../database.php");
session_start();
$data = array();

$id_entrepreneur = $_POST["entrepreneur_id"];
$state_entrepreneur = $_POST["state_entrepreneur"];


$sql = "UPDATE entrepreneurs SET state_entrepreneur='$state_entrepreneur'  WHERE id_entrepreneur = '$id_entrepreneur'";

$resultado = mysqli_query($conexion, $sql);


if ($resultado) {
    echo 'success';
} else {
    echo 'error';
}
?>