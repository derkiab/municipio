<?php
    include_once 'database.php';
  
    session_start();

    if(isset($_GET['cerrar_sesion'])){
        session_unset();

        // destroy the session
        session_destroy();
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
            $username_consultado=$row['email_user']; 
            $password_consultado =$row['password_user']; 
            $rol_consultado =$row['rol_id']; 
            if( $username==$username_consultado){
                echo  "usuario encontrado";
                if( $password==$password_consultado){
                    echo  "contraseña correcta";
                    if($rol_consultado==1){
                        header('Location: admin/pages/home/home.php');
                    }elseif($rol_consultado==2){
                        header('location: user/index.php');
                    }
                }
                else{
                    echo  "contraseña incorrecta";
                }
            } 
        }


    }

?>