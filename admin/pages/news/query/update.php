<?php
require ("../../../../database.php");
session_start();
$data = array();

$id_news = $_POST["new_id"];
$date_news = $_POST["date"];
$time_news = $_POST["time"];
$title_news = $_POST["title"];
$news_description = $_POST["description"];
$news_image	 = $_POST["image"];
$news_status = $_POST["status"];

$sql = "UPDATE news SET date_news='$date_news', time_news='$time_news',title_news='$title_news', news_description='$news_description', news_image='$news_image', news_status='$news_status' WHERE id_news = '$id_news'";

$resultado = mysqli_query($conexion, $sql);


if ($resultado) {
    echo 'success';
} else {
    echo 'error';
}
?>