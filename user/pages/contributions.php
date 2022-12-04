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
    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Contribuye</a>
  </div>
  <hr></hr>
  <div class="card-body">
    <h5 class="card-title mt-5">Ver contribuciones pasadas</h5>
    <p class="card-text">Revisa tus contribuciones pasadas</p>
    <a href="#" class="btn btn-primary">Ver</a>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Contribuye</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>
      <div class="modal-body">
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">@</span>
          <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Atras</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Enviar Contribucion</button>
      </div>
    </div>
  </div>
</div>
