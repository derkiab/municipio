

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Bootstrap-5.2.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

    <link rel="stylesheet" href="../../resources/css/style.css">
    
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
                <i></i>Municipalidad
            </div>

            <div class="list-group list-group-flush my-3">
                <a href="../home.php" class="list-group-item list-group-item-action bg-transparent second-text active">
                <i class="fa-solid fa-gauge-high me-2"></i>Dasboard
                </a>
                <a href="../user/users.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa-solid fa-user me-2"></i>Usuarios
                </a>
                <a href="../news/news.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa-solid fa-newspaper me-2"></i>Noticias
                </a>
                <a href="../event/events.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa-solid fa-calendar-days me-2"></i>Eventos
                </a>
                <a href="../pymes/pymes.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa-solid fa-briefcase me-2"></i>Pymes
                </a>
                <a href="../../logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">
                    <i class="fa-solid fa-right-from-bracket me-2"></i>Cerrar Sesion
                   
                </a>
            </div> 
        </div>
        <!-- Fin Sidebar  -->
        
        <!-- Contenido -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex aling-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dasboard</h2>
                </div>
                <div class="collapse navbar-collapse" id="navbar_content">
                    <ul class="navbar nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item-dropdown">
                            <a href="#" class="nav-link dropdown-toggle primary-text fw-bold" id="navbar_dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-user me-2"></i>Demo
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbar_dropdown">
                                <li><a href="#" class="dropdown-item">Perfil</a></li>
                                <li><a href="#" class="dropdown-item">Configuracion</a></li>
                                <li><a href="#" class="dropdown-item">Cerrar Sesion</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>        
            <div class="container-fluid px-4">