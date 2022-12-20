<?php
require_once('../../templates/header.php');
?>

<?php
    require('../../../database.php');
    
    $js = "user/js/user.js";
    $consulta = "SELECT COUNT(id_news) as id_news FROM news";
    $news = mysqli_query($conexion, $consulta);

    $consulta_events = "SELECT COUNT(id_event) as id_event FROM events";
    $events = mysqli_query($conexion, $consulta_events);

    $consulta_opinion = "SELECT COUNT(id_opinion) as id_opinion FROM opinions";
    $opinions = mysqli_query($conexion, $consulta_opinion);

    $consulta_entrepreneurs = "SELECT COUNT(id_entrepreneur) as id_entrepreneur FROM entrepreneurs";
    $entrepreneurs = mysqli_query($conexion, $consulta_entrepreneurs);

    $consulta_admin = "SELECT COUNT(id_user) as id_admin FROM users WHERE rol_id = 1";
    $admin = mysqli_query($conexion, $consulta_admin);

    $consulta_user = "SELECT COUNT(id_user) as id_user FROM users WHERE rol_id = 2";
    $user = mysqli_query($conexion, $consulta_user);
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
const noticias = <?php echo mysqli_fetch_assoc($news)['id_news'] ?>;
const eventos = <?php echo mysqli_fetch_assoc($events)['id_event'] ?>;
const opiniones = <?php echo mysqli_fetch_assoc($opinions)['id_opinion'] ?>;
const pymes = <?php echo mysqli_fetch_assoc($entrepreneurs)['id_entrepreneur'] ?>;

  new Chart(document.getElementById('sucesos'), {
    type: 'doughnut',
    data: {labels: [
            'Noticias',
            'Eventos',
            'Pymes',
            'Contribuciones'
        ],
        datasets: [{
            
            data:[ noticias, eventos, pymes, opiniones],
            backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)',
            'rgb(0, 255, 0)'
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
  
const administrador = <?php echo mysqli_fetch_assoc($admin)['id_admin'] ?>;
const usuarios = <?php echo mysqli_fetch_assoc($user)['id_user'] ?>;
  new Chart(document.getElementById('myChart'), {
    type: 'bar',
    data: {labels: [
            'Administradores',
            'Usuarios',
        ],
        datasets: [{
            data:[administrador, null],
            backgroundColor: [
            'rgb(255, 99, 132)',
            ],
            label: [
              'Administradores',
            ],
            hoverOffset: 4
        }, {
            data:[null, usuarios],
            backgroundColor: [
            'rgb(54, 162, 235)'
            ],
            label: [
              'Usuarios'
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
    require_once('../../templates/footer.php');
?>
