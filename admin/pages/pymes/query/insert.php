<?php
    require ("../../../../database.php");
    session_start();
    $rut_entrepreneur = $_POST["rut"];
    $name_entrepreneur  = $_POST["name"];
    $address_entrepreneur  = $_POST["address"];
    $phone_entrepreneur = $_POST["phone"];
    $email_entrepreneur = $_POST["email"];
    $name_company  = $_POST["name_company"];
    $social_networks_entrepreneur = $_POST["social_networks"];
    $field_entrepreneur = $_POST["field"];
    $image_entrepreneur = $_POST["image"];
    $description_entrepreneur = $_POST["description"];

    $sql = "INSERT INTO entrepreneurs VALUES ('','$rut_entrepreneur ', '$name_entrepreneur ', '$address_entrepreneur', '$phone_entrepreneur ', '$email_entrepreneur', '$name_company','$social_networks_entrepreneur','$field_entrepreneur','$image_entrepreneur','$description_entrepreneur')";

    $resultado = mysqli_query($conexion, $sql);
    
    if ($resultado) {
        echo "success";
    } else 
    {
        echo 'error';
    }
?>