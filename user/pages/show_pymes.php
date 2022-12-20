<?php
    require('../database.php');

    $myid=$_GET['id_entrepreneur'];

    $consulta_entrepreneur = "SELECT * FROM entrepreneurs  where id_entrepreneur=".$myid ;
    $entrepreneur = mysqli_query($conexion, $consulta_entrepreneur);

    $js = "pymes/js/mainpymes.js";
?>

<div class="card card border-light mb-3 m-5" >
    <?php  
        $entrepreneurs=mysqli_fetch_assoc($entrepreneur);   
    ?>
     <div class="card-body">
        <h1 class="card-title fw-bolder">PYME: <?php echo $entrepreneurs['name_company']?></h1>
        <hr>
        <h4>Acerca de "<?php echo $entrepreneurs['name_company']?>"</h4>
        <h5 class="card-text">Rubro Comercial: <?php echo $entrepreneurs['field_entrepreneur']?></h5>
        <h5 class="card-text">Descripcion: <?php echo $entrepreneurs['description_entrepreneur']?></h5>
        <h5 class="card-text">Encuentranos: <?php echo $entrepreneurs['address_entrepreneur']?></h5>
    </div>
    <div class="text-start">
        <img src="<?php echo $entrepreneurs['image_entrepreneur'] ?>" class="rounded" alt="..." width="50%" height="50%">
    </div>
    <div class="card-body">
        <h4>Informacion de Contacto</h4>
        <h5 class="card-text">Dueño: <?php echo $entrepreneurs['name_entrepreneur']?></h5>
        <h5 class="card-text">Telefono:+56 9 <?php echo $entrepreneurs['phone_entrepreneur']?></h5>
        <h5 class="card-text">Correo: <?php echo $entrepreneurs['email_entrepreneur']?></h5>
        <h5 class="card-text">Redes Sociales: <?php echo $entrepreneurs['social_networks_entrepreneur']?></h5>

    </div>
</div>


