<?php

session_start();

if(!isset($_SESSION['rol'])){
    header('location: ../login.php');
}else{
    if($_SESSION['rol'] != 2){
        header('location: ../login.php');
    }
}

$page= isset($_GET['p'])?strtolower($_GET['p']): 'home';

//este fragmento de html contiene el head de nuesttra pagina web
require_once 'templates/header.php';

require_once 'pages/'.$page.'.php';

require_once 'templates/footer.php';
?>
