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

    $consulta_entrepreneur= "SELECT * FROM entrepreneurs";
    $entrepreneur = mysqli_query($conexion, $consulta_entrepreneur);

    $js = "pymes/js/mainpymes.js";
?>

<!-- Tabla de usuarios -->
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-4">
                <h5>PYMES ACEPTADAS</h5>
            </div>
            <div class="col-lg-8 text-end">
                <button id="btn_agregar_pymes" type="button" class="btn btn-success">Agregar</button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id="tabla_pymes" class="table table-striped table-bordered table-condensed" style="width:100%">
                            <thead class="text-center">
                                <tr>
                                    <th>Rut</th>
                                    <th>Nombre</th>
                                    <th>Direccion</th>
                                    <th>Telefono</th>
                                    <th>Correo</th>
                                    <th>Nombre Empresa</th>
                                    <th>Redes Sociales</th>
                                    <th>Categoria</th>
                                    <th>Imagen</th>
                                    <th>Descripcion</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while($entrepreneurs=mysqli_fetch_assoc($entrepreneur)){
                                        if($entrepreneurs['state_entrepreneur'] == "Aceptada"){
                                ?>
                                <tr>
                                    <td><?php echo $entrepreneurs['rut_entrepreneur']?></td>
                                    <td><?php echo $entrepreneurs['name_entrepreneur']?></td>
                                    <td><?php echo $entrepreneurs['address_entrepreneur']?></td>
                                    <td><?php echo $entrepreneurs['phone_entrepreneur']?></td>
                                    <td><?php echo $entrepreneurs['email_entrepreneur']?></td>
                                    <td><?php echo $entrepreneurs['name_company']?></td>
                                    <td><?php echo $entrepreneurs['social_networks_entrepreneur']?></td>
                                    <td><?php echo $entrepreneurs['field_entrepreneur']?></td>
                                    <td><?php echo "<img src='".$entrepreneurs['image_entrepreneur']."'style=' width:50%; height:50%; '>" ?></td>
                                    <td><?php echo $entrepreneurs['description_entrepreneur']?></td>
                                    <td><?php echo $entrepreneurs['state_entrepreneur']?></td>
                                    <td>
                                        <div class='text-center'>
                                            
                                            <div class='btn-group'>
                                                
                                                <button class='btn btn-danger btn-editar delete' id="<?php echo $entrepreneurs['id_entrepreneur']; ?>">
                                                    <i class='fa-solid fa-xmark'></i>
                                                </button>
                                            </div>
                                        </div>   
                                    </td>

                                    
                                </tr>
                                <?php
                                        }
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
<br>
<!-- Tabla pymes pendientes -->
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-4">
                <h5>PYMES PENDIENTES</h5>
            </div>
            <div class="col-lg-8 text-end">
                <button id="btn_agregar_pymes" type="button" class="btn btn-success">Agregar</button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id="tabla_pymes_pendientes" class="table table-striped table-bordered table-condensed" style="width:100%">
                            <thead class="text-center">
                                <tr>
                                    <th>Rut</th>
                                    <th>Nombre</th>
                                    <th>Direccion</th>
                                    <th>Telefono</th>
                                    <th>Correo</th>
                                    <th>Nombre Empresa</th>
                                    <th>Redes Sociales</th>
                                    <th>Categoria</th>
                                    <th>Imagen</th>
                                    <th>Descripcion</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $consulta_entrepreneur= "SELECT * FROM entrepreneurs";
                                    $entrepreneur = mysqli_query($conexion, $consulta_entrepreneur);
                                    while($entrepreneurs=mysqli_fetch_assoc($entrepreneur)){
                                        if($entrepreneurs['state_entrepreneur'] == "Pendiente"){
                                ?>
                                <tr>
                                    <td><?php echo $entrepreneurs['rut_entrepreneur']?></td>
                                    <td><?php echo $entrepreneurs['name_entrepreneur']?></td>
                                    <td><?php echo $entrepreneurs['address_entrepreneur']?></td>
                                    <td><?php echo $entrepreneurs['phone_entrepreneur']?></td>
                                    <td><?php echo $entrepreneurs['email_entrepreneur']?></td>
                                    <td><?php echo $entrepreneurs['name_company']?></td>
                                    <td><?php echo $entrepreneurs['social_networks_entrepreneur']?></td>
                                    <td><?php echo $entrepreneurs['field_entrepreneur']?></td>
                                    <td><?php echo "<img src='".$entrepreneurs['image_entrepreneur']."'style=' width:50%; height:50%; '>" ?></td>
                                    <td><?php echo $entrepreneurs['description_entrepreneur']?></td>
                                    <td><?php echo $entrepreneurs['state_entrepreneur']?></td>
                                    <td>
                                        <div class='text-center'>
                                            
                                            <div class='btn-group'>
                                                <button class='btn btn-primary btn-editar update' id="<?php echo $entrepreneurs['id_entrepreneur']; ?>">
                                                    <i class='fa-solid fa-check'></i>
                                                </button>
                                                <button class='btn btn-danger btn-editar delete' id="<?php echo $entrepreneurs['id_entrepreneur']; ?>">
                                                    <i class='fa-solid fa-xmark'></i>
                                                </button>
                                            </div>
                                        </div>   
                                    </td>
                                </tr>
                                <?php
                                        }
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
<br>
<!-- Tabla pymes rechazadas -->
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-4">
                <h5>PYMES RECHAZADAS</h5>
            </div>
            <div class="col-lg-8 text-end">
                <button id="btn_agregar_pymes" type="button" class="btn btn-success">Agregar</button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id="tabla_pymes_rechazadas" class="table table-striped table-bordered table-condensed" style="width:100%">
                            <thead class="text-center">
                                <tr>
                                    <th>Rut</th>
                                    <th>Nombre</th>
                                    <th>Direccion</th>
                                    <th>Telefono</th>
                                    <th>Correo</th>
                                    <th>Nombre Empresa</th>
                                    <th>Redes Sociales</th>
                                    <th>Categoria</th>
                                    <th>Imagen</th>
                                    <th>Descripcion</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $consulta_entrepreneur= "SELECT * FROM entrepreneurs";
                                    $entrepreneur = mysqli_query($conexion, $consulta_entrepreneur);
                                    while($entrepreneurs=mysqli_fetch_assoc($entrepreneur)){
                                        if($entrepreneurs['state_entrepreneur'] == "Rechazada"){
                                ?>
                                <tr>
                                    <td><?php echo $entrepreneurs['rut_entrepreneur']?></td>
                                    <td><?php echo $entrepreneurs['name_entrepreneur']?></td>
                                    <td><?php echo $entrepreneurs['address_entrepreneur']?></td>
                                    <td><?php echo $entrepreneurs['phone_entrepreneur']?></td>
                                    <td><?php echo $entrepreneurs['email_entrepreneur']?></td>
                                    <td><?php echo $entrepreneurs['name_company']?></td>
                                    <td><?php echo $entrepreneurs['social_networks_entrepreneur']?></td>
                                    <td><?php echo $entrepreneurs['field_entrepreneur']?></td>
                                    <td><?php echo "<img src='".$entrepreneurs['image_entrepreneur']."'style=' width:50%; height:50%; '>" ?></td>
                                    <td><?php echo $entrepreneurs['description_entrepreneur']?></td>
                                    <td><?php echo $entrepreneurs['state_entrepreneur']?></td>
                                    <td>
                                        <div class='text-center'>
                                            
                                            <div class='btn-group'>
                                                <button class='btn btn-primary btn-editar update' id="<?php echo $entrepreneurs['id_entrepreneur']; ?>">
                                                    <i class='fa-solid fa-check'></i>
                                                </button>
                                                
                                            </div>
                                        </div>   
                                    </td>
                                </tr>
                                <?php
                                        }
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
<div class="modal fade" id="modal_pymes" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h1 class="modal-title fs-5" id="staticBackdropLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
 
            <form id="frm_registrar_pymes">
                <div class="modal-body">
                    <input hidden type="number" id="id_entrepreneur_update" name="entrepreneur_id">              
                    <div class="form-group">
                        <label for="" class="col-form-label">RUT</label>
                        <input type="text" class="form-control" name="rut" id="rut" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-form-label">Nombre Emprendedor</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-form-label">Direccion</label>
                        <input type="text" class="form-control" name="address" id="address" required>
                    </div>
                
                    <div class="form-group">
                        <label for="" class="col-form-label">Telefono</label>
                        <input type="tel" class="form-control" name="phone" id="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-form-label">Nombre Empresa</label>
                        <input type="text" class="form-control" name="name_company" id="name_company" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-form-label">Redes Sociales</label>
                        <input type="text" class="form-control" name="social_networks" id="social_networks" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-form-label">Campo</label>
                        <input type="text" class="form-control" name="field" id="field" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-form-label">Imagen</label>
                        <input type="text" class="form-control" name="image" id="image" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-form-label">Descripcion</label>
                        <input type="text" class="form-control" name="description" id="description" required>
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