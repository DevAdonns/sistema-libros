<?php
include_once 'connection/conexion.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $_usuario = $_POST['usuarioTXT'];
    $_clave = $_POST['claveTXT'];

    $sql = "SELECT * FROM usuarios WHERE nombre = '$_usuario' AND clave = '$_clave'";
    $result = $conn->query($sql);

    if(mysqli_num_rows($result) > 0){
        session_start();
        $_SESSION['nombre_usuario'] = $_usuario;
        header("Location: inicio.php");

    }else{
        echo "<div class='alert alert-danger' role='alert'>Usuario o contraseña incorrectos</div>";
       
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador del Sitio Web</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
<br>
<br>
    <div
        class="container"
    >
   
    <div
        class="col-md-5"
    ><div class="card">
        
        <div class="card-body">
            <h4 class="card-title">Login</h4>
            
            <form action="index.php" method="post">
                
                <label for="usuario">Usuario</label>
                <input type="text" name="usuarioTXT" class="form-control" id="usuario" required>

                <label for="clave">Contraseña</label>
                <input type="password" name="claveTXT" class="form-control" id="clave" required>
                
                <input type="submit" value="Iniciar Sesion" class="btn btn-primary mt-3">
             
            </form>
            <br>
            <a  class="btn btn-warning" href="module/registrar_usuario_bd.php">Registrar Usuario</a>
        </div>
      </div>
      
        
    </div>
    
      
        
    </div>
    
    
</body>
</html>