<?php
    require('../database.php');

    $consulta = "SELECT * FROM users";
    $user = mysqli_query($conexion, $consulta);

    $consulta_rol = "SELECT * FROM roles";
    $rol = mysqli_query($conexion, $consulta_rol);

    $consulta_news = "SELECT * FROM news";
    $new = mysqli_query($conexion, $consulta_news);

    $consulta_status_new = "SELECT * FROM status_news";
    $status_new = mysqli_query($conexion, $consulta_status_new);
    $js = "news/js/mainnews.js";
?>

<div class="card">
    <div class="card-body">
    <?php
    $news=mysqli_fetch_assoc($new)
    ?>
        <h5 class="card-title"><?php echo $news['title_news']?></h5>
        <p class="card-text"><?php echo $news['news_description']?></p>
        <p class="card-text"><small class="text-muted"> 
        <?php 
                                if($news['id_status_news'] == 1) echo "En curso";
                                else echo "Finalizado";
                            ?>
        </small></p>
    </div>
    <img src="<?php echo $news['news_image'] ?>" class="card-img-bottom" alt="...">
</div>