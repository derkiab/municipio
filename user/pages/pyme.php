<?php
    require('../database.php');

    $consulta_entrepreneur= "SELECT * FROM entrepreneurs";
    $entrepreneur = mysqli_query($conexion, $consulta_entrepreneur);

    $js = "pymes/js/mainpymes.js";
?>
   

<div class="row row-cols-1 row-cols-md-3 g-4 m-2 " style="width: 75rem;">
    <?php
        while($entrepreneurs=mysqli_fetch_assoc($entrepreneur)){
    ?>
    <div class="col">
        <a class="navbar-link text-decoration-none text-dark" href="index.php?p=show_pymes&id_entrepreneur=<?php echo $entrepreneurs['id_entrepreneur']; ?>" >
            <div class="card h-100">
                <img src="<?php echo $entrepreneurs['image_entrepreneur'] ?>" class="card-img-top" alt="..." width="100%" height="60%">
                <div class="card-body  ">
                    <h4 class="card-title"><?php echo $entrepreneurs['name_company']?></h4>
                    <hr>
                    <h5 class="card-text "><?php echo $entrepreneurs['field_entrepreneur']?></h5>
                    <h5 class="card-text"><?php echo $entrepreneurs['description_entrepreneur']?></h5>
                </div>
            </div>
            </a>
        </div>
    <?php
       }
    ?>
</div>

<div class="card text-center m-3" >
    <div class="card-body">
        <h5 class="card-title">¿ Quieres aparecer en nuestra pagina ?</h5>
        <p class="card-text"> * SI CUMPLES CON LOS REQUISITOS </p>
        <a href="index.php?p=postulation_pyme" class="btn btn-primary">POSTULA AQUI</a>
    </div>
</div>