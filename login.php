<?php
    include_once 'database.php';

    session_start();

    if(isset($_GET['cerrar_sesion'])){
        session_unset();

        // destroy the session
        session_destroy();
    }

    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:
                header('location: admin/home.php');
            break;

            case 2:
            header('location: pages/home.php');
            break;

            default:
        }
    }

    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $db = new Database();
        $query = $db->connect()->prepare('SELECT *FROM users WHERE email_user = :username AND password_user = :password');
        $query->execute(['username' => $username, 'password' => $password]);

        $row = $query->fetch(PDO::FETCH_NUM);

        if($row == true){
            $rol = $row[5];

            $_SESSION['rol'] = $rol;
            switch($rol){
                case 1:
                    header('location: admin/home.php');
                break;

                case 2:
                    header('location: pages/home.php');
                break;

                default:
            }
        }else{
            // no existe el usuario
            echo "Nombre de usuario o contraseña incorrecto";
        }


    }

?>
<!doctype html>
<html lang="es">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
    <body>
      <div class="container">
        </br>
        </br>
        <div class="row">
          <div class="col-md-4">

          </div>
          <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Iniciar Sesion
                </div>
                <div class="card-body">
                  <form method="POST">
                    <div class = "form-group">
                      <label for="exampleInputEmail1">Correo electronico</label>
                        <input type="email" class="form-control" name="username" aria-describedby="emailHelp" placeholder="Usuario">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Contraseña</label>
                        <input type="password" class="form-control" name="password" placeholder="Contraseña">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Acceder</button>
                  </form>
                  </div>
              </div>
            </div>
          </div>
        </div>
    </body>
  </html>
