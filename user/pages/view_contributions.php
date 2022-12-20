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
        <strong class="text">Departamento: <?php 
                                    
                                    $namedepa;
                                    $iddepa = $rows['department'];
                                    $sql = "SELECT * FROM departments";
                                    $query = mysqli_query($conexion, $sql);
                                    while($rows1 = mysqli_fetch_assoc($query)){
                                        if($rows1['id_department']== $iddepa){
                                            $namedepa = $rows1['name_department'];
                                        }
                                    }
                                    echo $namedepa;

                                    ?></strong>
        <div>
          Tipo de Contribución: <?php $name_contribution;
                                    $id_contribution = $rows['id_type_contribution'];
                                    $sql = "SELECT * FROM contribution_types";
                                    $query = mysqli_query($conexion, $sql);
                                    while($rows2 = mysqli_fetch_assoc($query)){
                                        if($rows2['id_contribution_type']== $id_contribution){
                                            $name_contribution = $rows2['name_contribution_type'];
                                        }
                                    }
                                    echo $name_contribution;?>  
        </div>
        <div>
          Descripción: <?php echo $rows['opinion_description']?>  
        </div>
        Respuesta: <?php if($rows['answer'] == ""){echo "Pendiente";} else{ echo $rows['answer'];}?>
      </div>
    </div>
  </div>
<?php
}

?>

