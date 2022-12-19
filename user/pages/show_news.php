<?php
    require('../database.php');

    $myid=$_GET['id_news'];

    $consulta_news = "SELECT * FROM news  where id_news=".$myid ;
    $new = mysqli_query($conexion, $consulta_news);

    $js = "news/js/mainnews.js";
?>

<div class="card">
    <div class="card-body.justify-content-start m-5 ">
    <?php
    
    $news=mysqli_fetch_assoc($new);
    
    ?>
        <h3 class="card-title fw-bold"  ><?php echo $news['title_news']?></h3>
        <hr>
    </div>
    
    <div class="text-center">
        <img src="<?php echo $news['news_image'] ?>" class="rounded" alt="..." width="80%" height="500px">
    </div>
  
    <div class="card-body m-5 ">
    <HR></HR>
        <h5 class="card-text.justify-content-start" ><?php echo $news['news_description']?></h5>
        Noticia:&nbsp; 
        <?php 
           if($news['id_status_news'] == 1) echo "En curso";
            else echo "Finalizada";
        ?>
    </div>

</div>