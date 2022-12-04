<?php
    require ("../../../../database.php");
    session_start();
    $rut_user = $_POST["rut"];
    $name_user = $_POST["name"];
    $lastname_user = $_POST["last_name"];
    $email_user = $_POST["email"];
    $rol_id = $_POST["user_rol"];
    $phone_user = $_POST["phone"];
    $password_user = $_POST["password"];
    $address_user = $_POST["address"];

    $sql = "INSERT INTO users VALUES ('','$rut_user', '$name_user', '$lastname_user', '$email_user', '$rol_id', '$phone_user', '$password_user', '$address_user')";

    $resultado = mysqli_query($conexion, $sql);
    
    if ($resultado) {
        echo "success";
    } else 
    {
        echo 'error';
    }
?>