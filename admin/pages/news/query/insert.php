<?php
    require ("../../../../database.php");
    session_start();
    $date_news = $_POST["date"];
    $time_news  = $_POST["time"];
    $title_news  = $_POST["title"];
    $news_description = $_POST["description"];
    $news_image  = $_POST["image"];
    $id_status_news  = $_POST["status"];

    $sql = "INSERT INTO news VALUES ('','$date_news ', '$time_news ', '$title_news', '$news_description ', '$news_image', '$id_status_news')";

    $resultado = mysqli_query($conexion, $sql);
    
    if ($resultado) {
        echo "success";
    } else 
    {
        echo 'error';
    }
?>