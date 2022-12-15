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
                header('location: admin\pages\home\home.php');
            break;

            case 2:
                header('location: user\index.php');
            break;

            default:
        }
    }

    if(isset($_POST['username']) && isset($_POST['password'])){
       $username = $_POST['username'];
       $password = $_POST['password'];

       $consulta = "SELECT * FROM users";
       $user = mysqli_query($conexion, $consulta);



       $consulta_rol = "SELECT * FROM roles";
       $rol = mysqli_query($conexion, $consulta_rol);


       $consulta="SELECT *FROM users";
       $resultado= mysqli_query($conexion,$consulta);

       while($row= mysqli_fetch_assoc ($resultado)){
           $iduser = $row['id_user'];
           $username2 = $row['name_user'];
           $lastname = $row['lastname_user'];
           $username_consultado=$row['email_user'];
           $password_consultado =$row['password_user'];
           $rol_consultado =$row['rol_id'];
           if( $username==$username_consultado){

               if( $password==$password_consultado){

                   if($rol_consultado==1){
                       $_SESSION['iduser'] = $iduser;
                       $_SESSION['last_name'] = $lastname;
                       $_SESSION['username'] = $username2;
                       $_SESSION['email_user'] = $username_consultado;
                       $_SESSION['rol'] = $rol_consultado;
                       header('Location: admin/pages/home/home.php');
                   }elseif($rol_consultado==2){
                       $_SESSION['iduser'] = $iduser;
                       $_SESSION['last_name'] = $lastname;
                       $_SESSION['username'] = $username2;
                       $_SESSION['email_user'] = $username_consultado;
                       $_SESSION['rol'] = $rol_consultado;
                       header('location: user/index.php');
                   }
               }
               else{

               }
           }
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
    <div class="container-fluid bg-success vh-100" style="background: linear-gradient(to right, #45cafc, #303f9f)">
      </br>
      </br>
      <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
          <div class="card align-middle">
            <div class="card-header">
              Iniciar sesion Municipalidad de Concepcion
            </div>
              <div class="card-body ">
                <form method="POST">
                  <div class = "form-group">
                    <label for="exampleInputEmail1">Correo electrónico</label>
                    <input type="email" class="form-control" name="username" aria-describedby="emailHelp" placeholder="Usuario" required>
                    <small id="emailHelp" class="form-text text-muted">Nunca compartiremos su correo electrónico con nadie más.</small>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Contraseña</label>
                    <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                  </div>
                  <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary" name="submit">Acceder</button> 
                    <a href="#" class="link-dark mt-2">¿Olvido su contraseña?</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
      </div>
    </div>
  </body>
</html>
