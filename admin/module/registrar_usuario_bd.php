<?php
if($_POST){
    function registrar_usuario(){
        include_once '../connection/conexion.php';
        $usuario = $_POST['usuario_registrar'];
        $clave = $_POST['clave_registrar'];
        
        $sql = "INSERT INTO usuarios (nombre, clave) VALUES ('$usuario', '$clave')";
        $result= $conn->query($sql);
        
        if (isset($result)) {
            echo "<script>alert('Usuario registrado exitosamente');</script>";
            echo "<script>window.location='../index.php';</script>";
        } else {
            echo "<script>alert('Error al registrar el usuario: " . $conn->error . "');</script>";
            echo "<script>window.location='../index.php';</script>";
        }
    }
    registrar_usuario();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
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
            <h4 class="card-title">Registrar Usuario</h4>
            
            <form action="registrar_usuario_bd.php" method="post">
                <label for="usuario">Usuario</label>
                <input type="text" name="usuario_registrar" class="form-control" id="usuario" required>

                <label for="clave">Contraseña</label>
                <input type="password" name="clave_registrar" class="form-control" id="clave" required>
                
                <input type="submit" value="Registrar Usuario" class="btn btn-primary mt-3">
             
            </form>
            <br>
            
        </div>
      </div>
      
        
    </div>
    
      
        
    </div>
    
    
    
</body>
</html>


    
    