<?php
  require('../database.php');
  $user_id = $_SESSION['iduser'];
  $consulta = "SELECT * FROM opinions WHERE id_user = $user_id";
  $opinions = mysqli_query($conexion, $consulta);

  $consulta2 = "SELECT * FROM contribution_types";
  $contribution = mysqli_query($conexion, $consulta2);

  $consulta3 = "SELECT * FROM users";
  $user = mysqli_query($conexion,$consulta3);

?>
<?php

while ($rows = mysqli_fetch_assoc($opinions)) {
  if($rows['answer'] != ""){
    $state = "respondido";
  }
  else{
    $state = "esperando";
  }
?>
  <div class="container">
    <div class="row d-flex justify-content-center align-item-center py-2 my-2 border border-primary">
      <div class="col-lg-3 col-sm-3 col-3 text-center ">
        <img src="resources/<?php echo $state?>.png" class="w-50 rounded-circle img-fluid">
      </div>
      <div class="col-lg-4 col-sm-4 col-4">
        <strong class="text-info"><?php echo $rows['department'] ?></strong>
        <div>
          <?php echo $rows['id_type_contribution']?>
        </div>
        <small class="text-warning"><?php echo $rows['answer']?></small>
      </div>
    </div>
  </div>
<?php
}

?>