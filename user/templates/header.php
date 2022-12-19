<?php
    session_start();
    if(!isset($_SESSION['rol'])){
        header('location: ../login.php');
    }else{
        if($_SESSION['rol'] != 2){
            header('location: ../login.php');
        }
    }
?>

<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style/styles.css">
    <!-- iconos -->
    <script src="https://kit.fontawesome.com/d75291e766.js" crossorigin="anonymous"></script>
  </head>
  <body >
     <nav class="navbar navbar-expand-lg" style="background-color: #004794;">
      <div class="container-fluid ">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-center ms-auto">
            <li class="nav-item ">
              <a class="nav-link text-white" aria-current="page" href="index.php?p=home">INICIO</a>
            </li>

            <li class="nav-item">
              <a class="nav-link text-white" href="index.php?p=map">MAPA INTERACTIVO</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="index.php?p=commune">NUESTRA COMUNA</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-white" href="index.php?p=formalities" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                TRAMITES
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="index.php?p=news">NOTICIAS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="index.php?p=events">EVENTOS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="index.php?p=contributions">CONTRIBUCIONES</a>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
          <div class="d-flex">
            <ul class="navbar nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item-dropdown">
                  <a href="#" class="nav-link dropdown-toggle primary-text fw-bold" id="navbar_dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa-solid fa-user me-2"></i>Demo
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbar_dropdown">
                      <li><a href="#" class="dropdown-item">Perfil</a></li>
                      <li><a href="#" class="dropdown-item">Configuracion</a></li>
                      <li><a href="../logout.php" class="dropdown-item">Cerrar Sesion</a></li>
                  </ul>
              </li>
            </ul>
          </div>
          <div class="d-flex">
           
          </div>
        </ul>
        
      </div>
    </nav>
    <img src="../assets/munimg.png" class="rounded mx-auto d-block" alt="" width="300" height="100">

    <nav class="navbar navbar-expand-lg" style="background-color: #004794;">
    </nav>

