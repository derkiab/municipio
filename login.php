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
                <form method="POST" action="logincheck.php">
                  <div class = "form-group">
                    <label for="exampleInputEmail1">Correo electrónico</label>
                    <input type="email" class="form-control" name="username" aria-describedby="emailHelp" placeholder="Usuario" required>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Contraseña</label>
                    <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                  </div>
                 <button type="submit" class="btn btn-primary" name="submit">Acceder</button> 
                  <!-- <a class="btn btn-primary" href="user/home.php" role="button">ACCEDER</a> -->
                </form>
              </div>
            </div>
          </div>
      </div>
    </div>
  </body>
</html>
