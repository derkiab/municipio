<?php
require_once('../../templates/header.php');
?>

<?php
    require('../../../database.php');
    
    $js = "user/js/user.js";
    $consulta = "SELECT COUNT(id_news) FROM news";
    $news = mysqli_query($conexion, $consulta);

    $consulta_rol = "SELECT COUNT(id_event) FROM events";
    $events = mysqli_query($conexion, $consulta_rol);

    $consulta_rol = "SELECT COUNT(id_opinion) FROM opinions";
    $opinions = mysqli_query($conexion, $consulta_rol);

    $consulta_rol = "SELECT COUNT(id_entrepeneur) FROM entrepeneurs";
    $entrepeneurs = mysqli_query($conexion, $consulta_rol);

    $consulta_rol = "SELECT COUNT(id_user) FROM users WHERE rol_id = 1";
    $admin = mysqli_query($conexion, $consulta_rol);

    $consulta_rol = "SELECT COUNT(id_user) FROM users WHERE rol_id = 2";
    $user = mysqli_query($conexion, $consulta_rol);
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- empezar aqui -->
<div class="row">
    <div class="col-md-4 px-2 py-2 ">
            <div class="card text-center">
              <img class="card-img-top" src="holder.js/100px180/" alt="">
              <div class="card-body">
                <h4 class="card-title">Title</h4>
                    <canvas id="sucesos"></canvas>
              </div>
            </div>
    </div>
    <div class="col-md-8 px-2 py-2">
            <div class="card text-left">
              <img class="card-img-top" src="holder.js/100px180/" alt="">
              <div class="card-body">
                <h4 class="card-title">Cantidad de usuarios por mes</h4>
                <canvas id="myChart"></canvas>
              </div>
            </div>
            
    </div>
</div>




<script>
const datos = <?php echo json_encode($news) ?>;

  new Chart(document.getElementById('sucesos'), {
    type: 'doughnut',
    data: {labels: [
            'Noticias',
            'Eventos',
            'Pymes',
            'Contribuciones'
        ],
        datasets: [{
            
            data:[ 3, 3, 0, 2],
            backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)',
            'rgb(255, 205, 32)'
            ],
            hoverOffset: 4
        }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: false
        }
      }
    }
  });
</script>
<script>
  new Chart(document.getElementById('myChart'), {
    type: 'bar',
    data: {labels: [
            'Administradores',
            'Usuarios',
        ],
        datasets: [{
            data: [2, 3],
            backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)'
            ],
            hoverOffset: 4
        }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
<!-- Fin Contenido -->
<?php
    require_once('../templates/footer.php');
?>
<!-- Fin Contenido -->
<?php
    require_once('../templates/footer.php');
?>