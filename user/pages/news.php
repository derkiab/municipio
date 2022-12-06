<?php
    require('../database.php');

    $consulta = "SELECT * FROM users";
    $user = mysqli_query($conexion, $consulta);

    $consulta_rol = "SELECT * FROM roles";
    $rol = mysqli_query($conexion, $consulta_rol);

    $consulta_news = "SELECT * FROM news";
    $new = mysqli_query($conexion, $consulta_news);
    $js = "news/js/mainnews.js";
?>



<span class="border border-light" >
   <div id="carouselExampleDark" class="carousel carousel-dark slide container text-center " data-bs-ride="carousel" >
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner rounded-4">
            <div class="carousel-item active" data-bs-interval="10000" style="width: 90rem;" >
                <a class="navbar-link" href="...">
                    <img src="https://i.pinimg.com/originals/e0/19/17/e0191785c29396e42bccc19c6c3db098.jpg" class="d-block w-100 " alt="..." width="100%" height="70%">
                </a>
            <div class="carousel-caption d-none d-md-block">
                <h5>NOTICIA 1</h5>
                <p>MICHI 1</p>
            </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000" style="width: 90rem;">
                <a class="navbar-link" href="...">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQPYNtKNXX05yrfCWjT7gmPLPXC42sPsld0rg&usqp=CAU" class="d-block w-100 " alt="..." width="100%" height="70%">
                </a>
            <div class="carousel-caption d-none d-md-block">
                <h5>NOTICIA 2</h5>
                <p>MICHI 2</p>
            </div>
            </div>
            <div class="carousel-item" style="width: 90rem;">
                <a class="navbar-link" href="...">
                    <img src="https://s3.abcstatics.com/media/sociedad/2016/10/20/gato-huerfano2-kM2--620x349@abc.jpg" class="d-block w-100 " alt="..." width="100%" height="70%">
                </a>    
            <div class="carousel-caption d-none d-md-block">
                <h5>NOTICIA 3</h5>
                <p>MICHI 3</p>
            </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</span>
<br>

<div class="container text-center">
    <div class="row">
    <?php
        while($news=mysqli_fetch_assoc($new)){
    ?>
        <div class="col">
            <a class="navbar-link" href="https://www.facebook.com/MuniConce/">
                <div class="card" style="width: 18rem;">
                
                <img src="<?php echo $news['news_image'] ?>" class="card-img-top" alt="..." width="300" height="300">
                    <div class="card">
                        <div class="card-header">
                            <?php echo $news['date_news']?>
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                            <H3><?php echo $news['title_news']?></H3>
                            <p><?php echo $news['news_description']?></p>
                            </blockquote>
                            </div>
                        </div>
                        <div class="card-footer">
                        <?php echo $news['news_status']?>
                        </div>
                    </div>
                </a> 
            </div>
        <?php
         }
        ?>
    </div>
</div>
