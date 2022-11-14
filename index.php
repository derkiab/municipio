<?php

    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: guest/home.php');
    }else{
        if($_SESSION['rol'] != 2 || $_SESSION['rol'] != 1){
            header('location: login.php');
        }else{
          header('location: pages\home.php');
        }
          header('location: pages\home.php');
    }


?>
