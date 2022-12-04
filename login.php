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
              Iniciar Sesion
            </div>
              <div class="card-body ">
                <form method="POST" action="logincheck.php">
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
