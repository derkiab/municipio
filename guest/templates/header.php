<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <!-- iconos -->
    <script src="https://kit.fontawesome.com/d75291e766.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <nav class="navbar" style="background-color: #e3f2fd;">
      <div class="container-fluid">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
            
              <a class="navbar-link" href="https://www.facebook.com/MuniConce/">
              <i class="fa-brands fa-facebook"></i>
            </a>
           
              <a class="navbar-link" href="https://www.instagram.com/muni_conce/?hl=es">
              <i class="fa-brands fa-instagram"></i>
            </a>
           
              <a class="navbar-link" href="https://twitter.com/Muni_Concepcion?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor">
              <i class="fa-brands fa-twitter"></i>
            </a>
          </ul>
        <!-- <button class="btn btn-outline-success " type="submit" >INICIAR SESION</button> -->
          <a class="btn btn-primary" href="../login.php" role="button">INICIAR SESION</a>
      </div>
    </nav>
    
    <img src="../assets/media/images/munimg.png" class="rounded mx-auto d-block" alt="" width="300" height="100">

    <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
      <div class="container-fluid ">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-center ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php?p=home">INICIO</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?p=map">MAPA INTERACTIVO</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?p=commune">NUESTRA COMUNA</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?p=news">NOTICIAS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?p=events">EVENTOS</a>
            </li>
           
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="BUSQUEDA" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">BUSQUEDA</button>
          </form>
        </div>
      </div>
    </nav>