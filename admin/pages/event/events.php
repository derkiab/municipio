<?php
require_once('../../templates/header.php');
?>
<!-- empezar aqui -->

<!-- Contenido Datatables -->
<?php
    require('../../../database.php');

    $consulta = "SELECT * FROM users";
    $user = mysqli_query($conexion, $consulta);

    $consulta_rol = "SELECT * FROM roles";
    $rol = mysqli_query($conexion, $consulta_rol);

    $consulta_event = "SELECT * FROM events";
    $event = mysqli_query($conexion, $consulta_event);

    $consulta_status_event = "SELECT * FROM status_events";
    $status_event = mysqli_query($conexion, $consulta_status_event);
    
    $js = "event/js/mainevent.js";
?>

<!-- Tabla de usuarios -->
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-4">
                <h5>Eventos</h5>
            </div>
            <div class="col-lg-8 text-end">
                <button id="btn_agregar_event" type="button" class="btn btn-success">Agregar</button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id="tabla_eventos" class="table table-striped table-bordered table-condensed" style="width:100%">
                            <thead class="text-center">
                                <tr>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Titulo</th>
                                    <th>Descripcion</th>
                                    <th>Imagen</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                    while($events=mysqli_fetch_assoc($event)){
                                ?>
                                <tr>
                                    <td><?php echo $events['date_event']?></td>
                                    <td><?php echo $events['time_event']?></td>
                                    <td><?php echo $events['title_event']?></td>
                                    <td><?php echo $events['event_description']?></td>
                                    <td><?php echo "<img src='".$events['event_image']."'style=' width:50%; height:50%; '>" ?></td>
                                    <td>
                                        <?php 
                                            if($events['id_status_event'] == 1) echo "Proximamente";
                                            elseif($events['id_status_event'] == 2)echo "En curso";
                                            else echo "Finalizado";
                                        ?>
                                    </td>
                                    <td>
                                         <div class='text-center'>   
                                            <div class='btn-group'>
                                                <button class='btn btn-primary btn-editar update' id="<?php echo $events['id_event']; ?>">
                                                    <i class='fa-solid fa-pen'></i>
                                                </button>
                                                <button class='btn btn-danger btn-editar delete' id="<?php echo $events['id_event']; ?>">
                                                    <i class='fa-solid fa-trash'></i>
                                                </button>
                                            </div> 
                                        </div>   
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>     
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_event" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h1 class="modal-title fs-5" id="staticBackdropLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="frm_registrar_event">
                <div class="modal-body">
                <input hidden type="number" id="id_event_update" name="event_id">  
                    <div class="form-group">
                        <label for="" class="col-form-label">Fecha</label>
                        <input type="date" class="form-control" name="date" id="date" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-form-label">Hora</label>
                        <input type="time" class="form-control" name="time" id="time" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-form-label">Titulo</label>
                        <input type="text" class="form-control" name="title" id="title" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-form-label">Descripcion</label>
                        <input type="text" class="form-control" name="description" id="description" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-form-label">Imagen</label>
                        <input type="text" class="form-control" name="image" id="image" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-form-label">Estado</label>
                        <select class="form-select" name="status" id="status" required>
                            <?php
                            while($status_events=mysqli_fetch_assoc($status_event)){
                                echo '<option value="'.$status_events['id_status_event'].'">'.$status_events['status_event_name'].'</option>';                                        
                            }
                            ?>
                        </select>
                    </div>
                   
                </div>
            
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btn_guardar" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Fin Contenido -->
<?php
    require_once('../../templates/footer.php');
?>