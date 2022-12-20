<?php
require_once('../../templates/header.php');
?>
<!-- empezar aqui -->

<!-- Contenido Datatables -->
<?php
    require('../../../database.php');
    
    $js = "contributions/js/contributions.js";
    $consulta = "SELECT * FROM opinions";
    $opinion = mysqli_query($conexion, $consulta);

    $consulta_rol = "SELECT * FROM roles";
    $rol = mysqli_query($conexion, $consulta_rol);

?>

<!-- Tabla de usuarios -->

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-4">
                <h5>Opiniones</h5>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id="tabla_contribuciones" class="table table-striped table-bordered table-condensed" style="width:100%">
                            <thead class="text-center">
                                <tr>
                                    <th>Nombre Usuario</th>
                                    <th>Descripcion</th>
                                    <th>Imagen (Opcional)</th>
                                    <th>Departamento</th>
                                    <th>Tipo</th>
                                    <th>Respuesta</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while($opinions=mysqli_fetch_assoc($opinion)){
                                ?>
                                <tr>
                                    <?php
                                        $id_user = $opinions['id_user'];
                                        $consulta_user = "SELECT name_user, lastname_user FROM users WHERE id_user = '$id_user'";
                                        $sql_user = mysqli_query($conexion, $consulta_user);
                                        $name_user = mysqli_fetch_assoc($sql_user);
                                    ?>
                                    <td><?php echo $name_user['name_user'] ?></td>
                                    <td><?php echo $opinions['opinion_description']?></td>
                                    <td><?php echo $opinions['opinion_image']?></td>
                                    <td><?php 
                                    
                                    $namedepa;
                                    $iddepa = $opinions['department'];
                                    $sql1 = "SELECT * FROM departments";
                                    $query = mysqli_query($conexion, $sql1);
                                    while($rows = mysqli_fetch_assoc($query)){
                                        if($rows['id_department']== $iddepa){
                                            $namedepa = $rows['name_department'];
                                        }
                                    }
                                    echo $namedepa;

                                    ?></td> 
                                    <td><?php $nametype;
                                            $idtype = $opinions['id_type_contribution'];
                                            $sql2 = "SELECT * FROM contribution_types";
                                             $query2 = mysqli_query($conexion, $sql2);
                                            while($rows = mysqli_fetch_assoc($query2)){
                                                 if($rows['id_contribution_type']== $idtype){
                                                        $nametype = $rows['name_contribution_type'];
                                                 }
                                            }
                                    echo $nametype;
                                    
                                    ?></td>                                
                                    <td><?php echo $opinions['answer']?></td>                                
                                    <td>
                                        <div class='text-center'>
                                            <div class='btn-group'>
                                                <button class='btn btn-primary btn-editar update' id="<?php echo $opinions['id_opinion']; ?>">
                                                    <i class='fa-solid fa-pen'></i>
                                                </button>
                                                <button class='btn btn-danger btn-editar delete' id="<?php echo $opinions['id_opinion']; ?>">
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
<div class="modal fade" id="modal_insert" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="frm_registrar">
            
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="id" id="id">
                    <div class="form-group">
                        <label for="" class="col-form-label">Id usuario</label>
                        <input type="text" class="form-control" name="id_user" id="id_user" disabled>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-form-label">Departamento</label>
                        <input type="text" class="form-control" name="department" id="department" disabled>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-form-label">Opinion</label>
                        <input type="text" class="form-control" name="opinion" id="opinion" disabled>
                    </div>
            
                    <div class="form-group">
                        <label for="" class="col-form-label">Respuesta</label>
                        <textarea class="form-control" name="answer" id="answer" required></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btn_guardar" name="btn_guardar" class="btn btn-success save">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Fin Contenido -->
<?php
    require_once('../../templates/footer.php');
?>
