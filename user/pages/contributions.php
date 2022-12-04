<?php

    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: ../../login.php');
    }else{
        if($_SESSION['rol'] != 2){
            header('location: ../login.php');
        }
    }


?>

<h1>hola</h1>
