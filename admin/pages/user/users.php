<?php
require_once('../../templates/header.php');
?>
<!-- empezar aqui -->

<!-- Contenido Datatables -->
<?php
    require('../../../database.php');
    
    $js = "user/js/user.js";
    $consulta = "SELECT * FROM users";
    $user = mysqli_query($conexion, $consulta);

    $consulta_rol = "SELECT * FROM roles";
    $rol = mysqli_query($conexion, $consulta_rol);
?>

<!-- Tabla de usuarios -->

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-4">
                <h5>Usuarios</h5>
            </div>
            <div class="col-lg-8 text-end">
                <button type="button" class="btn btn-success add">Agregar</button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id="tabla_personas" class="table table-striped table-bordered table-condensed" style="width:100%">
                            <thead class="text-center">
                                <tr>
                                    <th>Rut</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Email</th>
                                    <th>Rol</th>
                                    <th>Telefono</th>
                                    <th>Direccion</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while($users=mysqli_fetch_assoc($user)){
                                ?>
                                <tr>
                                    <td><?php echo $users['rut_user']?></td>
                                    <td><?php echo $users['name_user']?></td>
                                    <td><?php echo $users['lastname_user']?></td>
                                    <td><?php echo $users['email_user']?></td>
                                    <td>
                                        <?php 
                                            if($users['rol_id'] == 1) echo "admin";
                                            else echo "user";
                                        ?>
                                    </td>
                                    <td><?php echo $users['phone_user']?></td>
                                    <td><?php echo $users['address_user']?></td>
                                    <td>
                                        <div class='text-center'>
                                            
                                            <div class='btn-group'>
                                                <button class='btn btn-primary btn-editar update' id="<?php echo $users['id_user']; ?>">
                                                    <i class='fa-solid fa-pen'></i>
                                                </button>
                                                <button class='btn btn-danger btn-editar delete' id="<?php echo $users['id_user']; ?>">
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

            <form id="frm_registrar" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="" class="col-form-label">Rut</label>
                        <input type="text" class="form-control" name="rut" id="rut" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-form-label">Nombre</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-form-label">Apellido</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-form-label">Rol</label>
                        <select class="form-control" name="user_rol" id="user_rol" required>
                            <?php
                            while($roles=mysqli_fetch_assoc($rol)){
                                echo '<option value="'.$roles['rol_id'].'">'.$roles['rol_nombre'].'</option>';                                        
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-form-label" >Telefono</label>
                        <input type="tel" class="form-control" name="phone" id="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-form-label" >Contraseña</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-form-label" >Dirección</label>
                        <input type="text" class="form-control" name="address" id="address" required>
                    </div>
                </div>
              
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btn_guardar" name="btn_guardar" class="btn btn-success save">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Fin Contenido -->
<?php
    require_once('../../templates/footer.php');
?>