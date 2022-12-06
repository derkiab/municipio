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

<?php

  require('../database.php');
  $consulta = "SELECT * FROM departments";
  $department = mysqli_query($conexion, $consulta);

  $consulta2 = "SELECT * FROM contribution_types";
  $contribution = mysqli_query($conexion, $consulta2);

  $consulta3 = "SELECT * FROM users";
  $user = mysqli_query($conexion,$consulta3);
  $userid=0;
  while ($rows = mysqli_fetch_assoc($user)) {
    if($rows['email_user'] == $_SESSION['email_user'])
      $userid = (int)$rows['id_user'];
      
  }

?>

<div class="card text-center contri">

  <div class="card-body text-center">
    <h5 class="card-title mt-5">Contribuye Ahora</h5>
    <p class="card-text">Hacenos saber tu opinion para mejorar nuestra comunidad</p>
    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Contribuye</a>
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
        <form action="pages/insert.php" method="POST" id="contributionform">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="" class="col-form-label">Nombre</label>
                        <input type="text" class="form-control" name="name" id="name" value="<?php echo $_SESSION['username']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-form-label">Apellido</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $_SESSION['last_name'] ?>"disabled>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?php echo $_SESSION['email_user'] ?>" disabled>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label" >Departamento</label>
                        <select class="form-control" name="department" id="department" required>
                            <?php
                             while($departamentos=mysqli_fetch_assoc($department)){
                                echo '<option value="'.$departamentos['id_department'].'">'.$departamentos['name_department'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-form-label" >Tipo contribucion</label>
                        <select class="form-control" name="contribucion" required>
                            <?php
                             while($contribuciones=mysqli_fetch_assoc($contribution)){
                                echo '<option value="'.$contribuciones['id_contribution_type'].'">'.$contribuciones['name_contribution_type'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group" Required>
                        <label for="" class="col-form-label" >Descripcion</label>
                        <textarea class="form-control" name="descripcion" required></textarea>
                    </div>
                    <br>
                </div>
                <div class="modal-footer">
                  <input type="hidden" name="userid" value=<?php echo $userid ?>>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Atras</button>
                  <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Enviar Contribución</button>
                </div>
            </form>
      </div>

    </div>
  </div>
</div>
