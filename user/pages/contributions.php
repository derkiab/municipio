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

<div class="card text-center contri">

  <div class="card-body">
    <h5 class="card-title mt-5">Contribuye Ahora</h5>
    <p class="card-text">Hacenos saber tu opinion para mejorar nuestra comunidad</p>
    <a href="#" class="btn btn-primary">Contribuye</a>
  </div>
  <hr></hr>
  <div class="card-body">
    <h5 class="card-title mt-5">Ver contribuciones pasadas</h5>
    <p class="card-text">Revisa tus contribuciones pasadas</p>
    <a href="#" class="btn btn-primary">Ver</a>
  </div>

</div>
