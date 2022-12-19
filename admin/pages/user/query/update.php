<?php
require ("../../../../database.php");
session_start();
$data = array();

$id_user = $_POST["id"];
$rut_user = $_POST["rut"];
$name_user = $_POST["name"];
$lastname_user = $_POST["last_name"];
$email_user = $_POST["email"];
$rol_id = $_POST["user_rol"];
$phone_user = $_POST["phone"];
$password_user = $_POST["password"];
$address_user = $_POST["address"];

$sql = "UPDATE users SET  name_user='$name_user', lastname_user='$lastname_user', email_user='$email_user', rol_id='$rol_id', phone_user='$phone_user', password_user='$password_user', address_user='$address_user' WHERE id_user = '$id_user'";

$resultado = mysqli_query($conexion, $sql);

if ($resultado) {
    echo $id_user;
} else {
    echo 'error';
}
?>