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

    $consulta_news = "SELECT * FROM news";
    $new = mysqli_query($conexion, $consulta_news);

    $consulta_status_new = "SELECT * FROM status_news";
    $status_new = mysqli_query($conexion, $consulta_status_new);
    $js = "news/js/mainnews.js";


?>

<!-- Tabla de usuarios -->
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-4">
                <h5>Noticias</h5>
            </div>
            <div class="col-lg-8 text-end">
                <button id="btn_agregar_news" type="button" class="btn btn-success">Agregar</button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id="tabla_noticias" class="table table-striped table-bordered table-condensed" style="width:100%">
                            <thead class="text-center">
                                <tr>
                                    <th>ID</th>
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

                                    while($news=mysqli_fetch_assoc($new)){
                                ?>
                                <tr>
                                    <td><?php echo $news['id_news']?></td>
                                    <td><?php echo $news['date_news']?></td>
                                    <td><?php echo $news['time_news']?></td>
                                    <td><?php echo $news['title_news']?></td>

                                    <td><?php echo $news['news_description']?></td>
                                    <td><?php echo "<img src='".$news['news_image']."'style=' width:50%; height:50%; '>" ?></td>
                                    <td>
                                        <?php 
                                            if($news['id_status_news'] == 1) echo "En curso";
                                            else echo "Finalizado";
                                        ?>
                                    </td>
                                    <td>
                                         <div class='text-center'>   
                                            <div class='btn-group'>
                                                <button class='btn btn-primary btn-editar update' id="<?php echo $news['id_news']; ?>">
                                                    <i class='fa-solid fa-pen'></i>
                                                </button>
                                                <button class='btn btn-danger btn-editar delete' id="<?php echo $news['id_news']; ?>">
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
<div class="modal fade" id="modal_news" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h1 class="modal-title fs-5" id="staticBackdropLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="frm_registrar_news">
                <div class="modal-body">
                    <input type="number" id="id_news_update" name="new_id">              
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
                            while($status_news=mysqli_fetch_assoc($status_new)){
                                echo '<option value="'.$status_news['id_status_news'].'">'.$status_news['status_news_name'].'</option>';                                        
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