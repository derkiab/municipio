<?php
require_once('../templates/header.php');
?>
<!-- empezar aqui -->

<!-- Contenido Datatables -->
<?php
    require('.././db.php');

    $bd = new Conexion();
    $conexion = $bd->Conectar();

    $consulta = "SELECT * FROM entrepeneurs";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container">
    <div class="row">
        <!-- Boton Activador modal -->
        <div class="col-lg-12">
            <button id="btn_agregar" type="button" class="btn btn-success">Agregar</button>
        </div>
    </div>
</div>

<!-- Tabla de usuarios -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table id="tabla_personas" class="table table-striped table-bordered table-condensed" style="width:100%">
                    <thead class="text-center">
                        <tr>
                            <th>Rut</th>
                            <th>Nombre</th>
                            <th>Campo</th>
                            <th>Direccion</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($data as $dat){
                        ?>
                        <tr>
                            <td><?php echo $dat['rut_entrepeneur']?></td>
                            <td><?php echo $dat['name_entrepeneur']?></td>
                            <td><?php echo $dat['field_entrepeneur']?></td>
                            <td><?php echo $dat['address_entrepeneur']?></td>
                            <td><?php echo $dat['email_entrepeneur']?></td>
                            <td><?php echo $dat['phone_entrepeneur']?></td>
                            <td>   
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

<!-- Modal -->
<div class="modal fade" id="modal_crud" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar persona</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="form_personas">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="" class="col-form-label">Rut</label>
                        <input type="text" class="form-control" id="rut">
                    </div>
                    <div class="form-group">
                        <label for="" class="col-form-label">Nombre</label>
                        <input type="text" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="" class="col-form-label">Apellido</label>
                        <input type="text" class="form-control" id="last_name">
                    </div>
                    <div class="form-group">
                        <label for="" class="col-form-label">Email</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="" class="col-form-label">Rol</label>
                        <select class="form-control">
                            <?php
                                foreach($rol as $roles){
                                echo '<option id="users_rol" value="'.$roles['rol_nombre'].'">'.$roles['rol_nombre'].'</option>';                                        
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-form-label" id="phone">Telefono</label>
                        <input type="tel" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="col-form-label" id="password">Contraseña</label>
                        <input type="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="col-form-label" id="address">Dirección</label>
                        <input type="text" class="form-control">
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
    require_once('../templates/footer.php');
?>