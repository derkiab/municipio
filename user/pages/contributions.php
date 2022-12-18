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
<div class="container d-flex justify-content-center py-5">
<div class="card border-dark mb-3 " style="max-width: 24rem;">
  <div class="card-header bg-transparent border-success">Contribucion</div>
  <div class="card-body">
    <form action="pages/insert.php" method="POST" id="contributionform">
          <div class="form-group">
              <label for="" class="col-form-label">Nombre</label>
              <input type="text" class="form-control" name="name" id="name" value="<?php echo $_SESSION['username']; ?>">
          </div>
          <div class="form-group">
              <label for="" class="col-form-label">Apellido</label>
              <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $_SESSION['last_name'] ?>">
          </div>

          <div class="form-group">
              <label for="" class="col-form-label">Email</label>
              <input type="email" class="form-control" name="email" id="email" value="<?php echo $_SESSION['email_user'] ?>">
          </div>
          <div class="form-group">
              <label for="" class="col-form-label" >Departamento</label>
              <select class="form-select" name="department" id="department" required>
                  <?php
                    while($departamentos=mysqli_fetch_assoc($department)){
                      echo '<option value="'.$departamentos['id_department'].'">'.$departamentos['name_department'].'</option>';
                  }
                  ?>
              </select>
          </div>
      <div class="form-group">
        <label for="" class="col-form-label" >Tipo contribucion</label>
        <select class="form-select" name="contribucion" required>
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
      <div class="container d-flex justify-content-center">
        <input type="hidden" name="userid" value=<?php echo $userid ?>>
        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Enviar Contribución</button>
      </div>
    </form>
  </div>
</div>
</div>