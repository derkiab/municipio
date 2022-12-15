<?php
require ("../../../../database.php");
session_start();
$data = array();

$id_opinion = $_POST["id_opinion"];
$answer = $_POST["answer"];
$sql = "UPDATE opinions SET answer='$answer' WHERE id_opinion = '$id_opinion'";

$resultado = mysqli_query($conexion, $sql);

if ($resultado) {
    echo "success";
} else {
    echo 'error';
}
?>