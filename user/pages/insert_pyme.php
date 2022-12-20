<?php

    require ("../../database.php");


    $user_rut = $_POST["rut"];
    $user_name = $_POST["name"];
    $user_address = $_POST["address"];
    $user_phone = $_POST["phone"];
    $user_email = $_POST["email"];
    $name_company = $_POST["name_pyme"];
    $social_networks = $_POST["rrss"];
    $field = $_POST["field"];
    $logo = $_POST["logo"];
    $description = $_POST["descripcion"];
    $state = "Pendiente";





    $sql = "INSERT INTO `entrepreneurs`(rut_entrepreneur, name_entrepreneur, address_entrepreneur, phone_entrepreneur, email_entrepreneur, name_company, social_networks_entrepreneur, field_entrepreneur, image_entrepreneur, description_entrepreneur, state_entrepreneur) VALUES ('$user_rut','$user_name','$user_address','$user_phone','$user_email','$name_company','$social_networks','$field','$logo','$description','$state')";

    $resultado = mysqli_query($conexion, $sql);
    header ('Location: ../../index.php');

?>
