<?php
    require('../database.php');

    $consulta_news = "SELECT * FROM news";
    $new = mysqli_query($conexion, $consulta_news);

    $consulta_status_new = "SELECT * FROM status_news";
    $status_new = mysqli_query($conexion, $consulta_status_new);

?>
   


<div class="row row-cols-1 row-cols-md-5 g-4 m-2">
<?php
        while($news=mysqli_fetch_assoc($new)){
    ?>
    <div class="col">
    <a class="navbar-link text-decoration-none text-dark" href="index.php?p=show_news&id_news=<?php echo $news['id_news']; ?>" >
        <div class="card h-100">
        <img src="<?php echo $news['news_image'] ?>" class="rounded" alt="..." width="100%" height="45%">
        <div class="card-body">
            <h5 class="card-title"><?php echo $news['title_news']?></h5>
        </div>
        <div class="card-footer">
            <small class="text-muted">
                <?php 
                    if($news['id_status_news'] == 1) echo "En curso";
                    else echo "Finalizado";
                ?>
            </small>
        </div>
        </div>
        </a>
    </div>
    <?php
         }
    ?>
</div>
