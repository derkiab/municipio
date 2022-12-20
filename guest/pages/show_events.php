<?php
    require('../database.php');

    $myid=$_GET['id_event'];

    $consulta_events = "SELECT * FROM events  where id_event=".$myid ;
    $event = mysqli_query($conexion, $consulta_events);

    $js = "events/js/mainnews.js";
?>

<div class="card">
    <div class="card-body.justify-content-start m-5 ">
    <?php
    
    $events=mysqli_fetch_assoc($event);
    
    ?>
        <h3 class="card-title fw-bold"  ><?php echo $events['title_event']?></h3>
        <hr>
    </div>
    
    <div class="text-center">
        <img src="<?php echo $events['event_image'] ?>" class="rounded" alt="..." width="80%" height="500px">
    </div>
  
    <div class="card-body m-5 ">
    <HR></HR>
        <h5 class="card-text.justify-content-start" ><?php echo $events['event_description']?></h5>

        <h4 class="card-title fw-bold"  >Fecha:&nbsp;<?php echo $events['date_event']?></h4>
        <h4 class="card-title fw-bold"  >Hora del evento:&nbsp;<?php echo $events['time_event']?> hras.</h4>
        Evento:&nbsp; 
        <?php 
                    if($events['id_status_event'] == 1) echo "Proximamente";
                    elseif($events['id_status_event'] == 2)echo "En curso";
                    else echo "Finalizado";
                 ?>
    </div>

</div>


