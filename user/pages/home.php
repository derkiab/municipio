<?php
    require('../database.php');

    $consulta_news = "SELECT * FROM news";
    $new = mysqli_query($conexion, $consulta_news);

    $consulta_status_new = "SELECT * FROM status_news";
    $status_new = mysqli_query($conexion, $consulta_status_new);

    
    $consulta_event = "SELECT * FROM events";
    $event = mysqli_query($conexion, $consulta_event);
    
    $consulta_status_event = "SELECT * FROM status_events";
    $status_event = mysqli_query($conexion, $consulta_status_event);

    $consulta_entrepreneur= "SELECT * FROM entrepreneurs";
    $entrepreneur = mysqli_query($conexion, $consulta_entrepreneur);

    ?>
<BR></BR>
    <h1 class="text-center">BIENVENIDOS A LA MUNICIPALIDAD DE CONCEPCION</h1>
<BR></BR>
<div class="p-3 mb-2 fs-3  text-white text-center" style="background-color:#486FAF;">Noticias</div>
<div class="row row-cols-1 row-cols-md-5 g-4 m-5">
<?php
        while($news=mysqli_fetch_assoc($new)){
    ?>
    <div class="col">
    <a class="navbar-link text-decoration-none text-dark" href="index.php?p=show_news&id_news=<?php echo $news['id_news']; ?>" >
        <div class="card h-100" >
        <img src="<?php echo $news['news_image'] ?>" class="card-img-top" alt="..." width="100%" height="50%">
        <div class="card-body">
            <h5 class="card-title"><?php echo $news['title_news']?></h5>
        </div>
        </div>
        </a>
    </div>
    <?php
         }
    ?> 
</div>


<div class="p-3 mb-2  fs-3 text-white text-center" style="background-color:#486FAF;">Eventos</div>
<div class="row row-cols-1 row-cols-md-5 g-7 m-5">
<?php
        while($events=mysqli_fetch_assoc($event)){
    ?>
    <div class="col">
    <a class="navbar-link text-decoration-none text-dark" href="index.php?p=show_events&id_event=<?php echo $events['id_event']; ?>" >
        <div class="card h-100" >
        <img src="<?php echo $events['event_image']  ?>" class="card-img-top" alt="..." width="100%" height="45%">
        <div class="card-body">
            <h5 class="card-title"><?php echo $events['title_event']?></h5>
        </div>
        </div>
        </a>
    </div>
    <?php
         }
    ?> 
</div>


