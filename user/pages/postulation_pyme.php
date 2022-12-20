

<?php

require('../database.php');
$consulta = "SELECT * FROM departments";
$department = mysqli_query($conexion, $consulta);

$consulta2 = "SELECT * FROM contribution_types";
$contribution = mysqli_query($conexion, $consulta2);

$consulta3 = "SELECT * FROM users";
$user = mysqli_query($conexion,$consulta3);
$userid = 0;
while ($rows = mysqli_fetch_assoc($user)) {
  if($rows['email_user'] == $_SESSION['email_user'])
    $userid = (int)$rows['id_user'];  
    
}

?>
<div class="container d-flex justify-content-center py-5">
<div class="card border-dark mb-3 " style="width: 30rem;">
<div class="card-header bg-transparent border-success">Contribucion</div>
<div class="card-body">
  <form action="pages/insert_pyme.php" method="POST" id="frm_contribution">
        <div class="form-group">
            <label for="" class="col-form-label">Rut</label>
            <input type="text" class="form-control" name="rut" id="rut" value="<?php echo $_SESSION['rut_user']; ?>">
        </div>
        <div class="form-group">
            <label for="" class="col-form-label">Nombre</label>
            <input type="text" class="form-control" name="name" id="name" value="<?php echo $_SESSION['username']; ?>">
        </div>
        <div class="form-group">
            <label for="" class="col-form-label">Dirección</label>
            <input type="text" class="form-control" name="address" id="address" value="<?php echo $_SESSION['address'] ?>">
        </div>
        <div class="form-group">
            <label for="" class="col-form-label">Telefono</label>
            <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $_SESSION['phone'] ?>">
        </div>

        <div class="form-group">
            <label for="" class="col-form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="<?php echo $_SESSION['email_user'] ?>">
        </div>      

        <div class="form-group">
            <label for="" class="col-form-label">Nombre PYME</label>
            <input type="text" class="form-control" name="name_pyme" id="name_pyme" value="">
        </div>      

        <div class="form-group">
            <label for="" class="col-form-label">Redes Sociales</label>
            <textarea type="text" class="form-control" name="rrss" id="rrss" value=""></textarea>
        </div>      

        <div class="form-group">
            <label for="" class="col-form-label">Rubro PYME</label>
            <input type="text" class="form-control" name="field" id="field" value="">
        </div>      
        <div class="form-group">
            <label for="" class="col-form-label">Logo</label>
            <input type="text" class="form-control" name="logo" id="logo" value="">
        </div>           
    <div class="form-group" Required>
      <label for="" class="col-form-label" >Descripcion</label>
      <textarea class="form-control" name="descripcion" required></textarea>
    </div>
    <br>
    <div class="container d-flex justify-content-center">
      <button type="submit" id="btn_guardar" name="btn_guardar" class="btn btn-success save">Solicitar ser PYME</button>
    </div>
  </form>
</div>
</div>
</div>
