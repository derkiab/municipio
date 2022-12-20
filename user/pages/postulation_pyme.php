
<?php

require('../database.php');

$consulta_entrepreneur= "SELECT * FROM entrepreneurs";
$entrepreneur = mysqli_query($conexion, $consulta_entrepreneur); 

$consulta3 = "SELECT * FROM users";
$user = mysqli_query($conexion,$consulta3);
$userid = 0;
while ($rows = mysqli_fetch_assoc($user)) {
  if($rows['email_user'] == $_SESSION['email_user'])
    $userid = (int)$rows['id_user'];  
    
}

?>
<br>
<div class="card border-primary mb-3 justify-content-center container d-flex " style="width: 50rem;" >
    <div class="card-header">Header</div>
    <div class="card-body text-primary">
        <h5 class="card-title">Primary card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
</div>