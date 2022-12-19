<?php
    require('../database.php');

    $consulta_event = "SELECT * FROM events";
    $event = mysqli_query($conexion, $consulta_event);
    
    $consulta_status_event = "SELECT * FROM status_events";
    $status_event = mysqli_query($conexion, $consulta_status_event);

    $js = "event/js/mainevent.js";
?>




<br>

<div class="row row-cols-1 row-cols-md-3 g-4 m-2">
<?php
        while($events=mysqli_fetch_assoc($event)){
    ?>
    <div class="col">
    <a class="navbar-link text-decoration-none text-dark" href="index.php?p=show_events&id_event=<?php echo $events['id_event']; ?>" >
        <div class="card h-100">
        <img src="<?php echo $events['event_image'] ?>" class="rounded" alt="..." width="100%" height="60%">
        <div class="card-body">
            <h5 class="card-title"><?php echo $events['title_event']?></h5>
        </div>
        <div class="card-footer">
            <small class="text-muted">
                <?php 
                    if($events['id_status_event'] == 1) echo "Proximamente";
                    elseif($events['id_status_event'] == 2)echo "En curso";
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
