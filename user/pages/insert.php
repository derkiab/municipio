<?php

    require ("../../database.php");


    $user = $_POST["userid"];
    $department = $_POST["department"];
    $contribution = $_POST["contribucion"];
    $descripcion = $_POST["descripcion"];





    $sql = "INSERT INTO opinions (id_user,opinion_description,department,id_type_contribution) VALUES ($user, '$descripcion', '$department', '$contribution')";

    $resultado = mysqli_query($conexion, $sql);
    header ('Location: ../../index.php');

?>