<?php
    require('../database.php');

    $myid=$_GET['id_news'];

    $consulta_news = "SELECT * FROM news  where id_news=".$myid ;
    $new = mysqli_query($conexion, $consulta_news);

    $js = "news/js/mainnews.js";
?>

<div class="card">
    <div class="card-body " style="width: 90rem;">
    <?php
    
    $news=mysqli_fetch_assoc($new);
    
    ?>
        <h5 class="card-title"><?php echo $news['title_news']?></h5>
        <p class="card-text"><?php echo $news['news_description']?></p>

    </div>
    
    <div class="text-center">
        <img src="<?php echo $news['news_image'] ?>" class="rounded" alt="..." width="80%" height="500px">
    </div>

    <div class="card-footer text-muted">
        <?php 
            if($news['id_status_news'] == 1) echo "En curso";
            else echo "Finalizado";
        ?>
  </div>
</div>