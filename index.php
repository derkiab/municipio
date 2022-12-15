<?php

    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: guest/index.php');
    }else{
      if($_SESSION['rol'] != 2 || $_SESSION['rol'] != 1){
          header('location: login.php');
      }else if($_SESSION['rol'] == 1){
          header('location: admin\pages\home\home.php');
        }else{
          header('location: user\index.php');
        }

    }


?>
