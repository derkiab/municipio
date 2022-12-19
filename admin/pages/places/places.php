<?php

    session_start();
    if(!isset($_SESSION['rol'])){
        header('location: ../../../login.php');
    }else{
        if($_SESSION['rol'] != 1){
            header('location: ../../../login.php');
        }
    }
require('../../templates/header.php');

?>

<?php
require('../../../database.php');
  $js = "places/js/main.js";

?>
<?php

  $sql = "SELECT * FROM category_places_of_interest";
  $query = mysqli_query($conexion,$sql);

$sqllugar = "SELECT * FROM places_of_interest";
$queryLugar = mysqli_query($conexion, $sqllugar);


 ?>





<br>
<div class="card">
  <div class="card-header">
    <h5>Tipos de lugares de interes</h5>

  </div class="card-body">
    <div class="col-lg-11 text-end">
        <button id="btn_agregar_places" type="button" class="btn btn-success me-3 mt-3">Agregar Nuevo Tipo</button>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="tabla_lugares" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Nombre Tipo</th>
                                <th class="text-center">Icono Tipo</th>
                                

                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while($lugares=mysqli_fetch_assoc($query)){
                            ?>
                            <tr>
                                <td align="center"><?php echo $lugares['name_category']?></td>
                                <td align="center"><?php echo "<img src='".$lugares['icon_category']."'style=' width:3.5%; height:3.5%;'>" ?></td>
                                <td align="center">
                                    <div class='text-center'>

                                        <div class='btn-group'>
                                            <button class='btn btn_update btn-primary btn-editar update' id="<?php echo $lugares['id_category']; ?>">
                                                <i class='fa-solid fa-pen'></i>
                                            </button>
                                            <button class='btn btn-danger btn-editar delete' id="<?php echo $lugares['id_category']; ?>">
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
  <br>
  <br>
  
  <div class="modal fade" id="modal_places" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header bg-success">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel"></h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <form id="frm_registrar_places">
                  <div class="modal-body">

                      <div class="form-group">
                          <label for="" class="col-form-label">Tipo</label>
                          <input type="text" class="form-control" name="type" id="type" required>
                      </div>
                      <div class="form-group">
                          <label for="" class="col-form-label">Icono (Inserte enlace)</label>
                          <input type="text" class="form-control" name="icon" id="icon" required>
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

  <!-- Aqui va tabla lugares y modal -->

  <div class="card">
  <div class="card-header">
    <h5>Lugares de interés</h5>

  </div class="card-body">
    <div class="col-lg-11 text-end">
        <button id="btn_agregar_lugares_interes" type="button" class="btn btn-success me-3 mt-3">Agregar Nuevo Lugar</button>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="tabla_lugares_interes" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Nombre Lugar</th>
                                <th class="text-center">Tipo de lugar</th>
                                <th class="text-center">Latitud / Longitud</th>

                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while($lugaresInteres=mysqli_fetch_assoc($queryLugar)){
                                    $latitud = $lugaresInteres['latitude_place'];
                                    $longitud = $lugaresInteres['longitude_place'];
                                    $idplace = $lugaresInteres['id_place'];
                            ?>
                            <tr>
                                <td align="center"><?php echo $lugaresInteres['name_place']?></td>
                                <td align="center">
                                <?php
                                $consultaTipo = "SELECT id_category, name_category FROM category_places_of_interest";
                                $queryTipo = mysqli_query($conexion, $consultaTipo);
                                while ($rowTipo = mysqli_fetch_assoc($queryTipo)) {
                                    if($lugaresInteres['category_place']==$rowTipo['id_category']){
                                        echo $rowTipo['name_category'];
                                    }
                                }
                                ?>
                                </td >
                                <td align="center">
                                
                                <?php


                                echo $latitud .' / '.$longitud;
                               
                                ?>
                                
                                </td>
                                <td>
                                    <div class='text-center'>

                                        <div class='btn-group'>
                                            <button class='btn btn_update btn-primary btn-editar update1' id="<?php echo $lugaresInteres['id_place']; ?>">
                                                <i class='fa-solid fa-pen'></i>
                                            </button>
                                            <button class='btn btn-danger btn-editar delete1' id="<?php echo $lugaresInteres['id_place']; ?>">
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
  <br>
  <br>
  
  <div class="modal fade" id="modal_lugares_interes" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header bg-success">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel"></h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <form id="frm_registrar_lugar">
                  <div class="modal-body">
                      <div class="form-group">
                          <label for="" class="col-form-label">Nombre Lugar</label>
                          <input type="text" class="form-control" name="nombreLugar" id="nombreLugar" required>
                      </div>
                      <div class="form-group">
                        <label for="" class="col-form-label">Tipo</label>
                        <select class="form-select" name="tipolugar" required>
                            <?php
                            $consultatipo2 = "SELECT * FROM category_places_of_interest";
                            $querytipo2 = mysqli_query($conexion,$consultatipo2);
                            while($tipos=mysqli_fetch_assoc($querytipo2)){
                                echo '<option value="'.$tipos['id_category'].'">'.$tipos['name_category'].'</option>';
                            }
                            ?>
                        </select>
                      </div>
                      <div class="form-group">
                          <label for="" class="col-form-label">Latitud (ubicacion)</label>
                          <input type="text" class="form-control" name="latitudlugar" id="latitudlugar" required>
                      </div>
                      <div class="form-group">
                          <label for="" class="col-form-label">Longitud (ubicacion)</label>
                          <input type="text" class="form-control" name="longitudlugar" id="longitudlugar" required>
                      </div>
                  </div>

                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                      <button type="submit" id="btn_guardar_lugar" class="btn btn-success">Guardar</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
    
  <div class="card">
  <div class="card-header">
    <h5>Mapa</h5>

  </div class="card-body">
  
  <div class="container map-container">
     <div class="" id="map">

     </div>
     <br>
     <div class="">
        <div class="card-header">
            <h5>Configuracion del mapa</h5>
        </div>
        
        <form action="mapconfig">
            

        </form>
     </div>
  </div>                          


  





<button type="button" class="btn btn-success btn-floating btn-lg" id="btn-back-to-top"
style="position: fixed;
bottom: 20px;
right: 20px;
display: none;
opacity: 75%;
}">
  <i class="fas fa-arrow-up"></i>
</button>


<?php
    require('../../templates/footer.php');

?>
