<?php include_once("../template/cabecera_productos.php"); ?>

<?php

 $id_libro="";
 $nombre="";
 $imagen="";
 $accion = "";

if($_POST){

    $accion = $_POST['accion'];

    switch($accion){
        case 'agregar':
            
            function registrar_libro($nombre, $imagen){

                $imagen_libro=$_FILES['imagen_libro']['name'];
                $imagen_temporal=$_FILES['imagen_libro']['tmp_name'];
                move_uploaded_file($imagen_temporal, "../../img/".$imagen_libro);
            
                include_once("../connection/conexion.php");
                $sql="INSERT INTO `libros` (`id`, `nombre`, `imagen`) VALUES (NULL, '".$nombre."', '".$imagen."')";
                $resultado = mysqli_query($conn, $sql);
                if(isset($resultado)){
                    echo "<script>alert('Libro Registrado Correctamente');</script>";
                    echo "<script>window.location.href='productos.php';</script>";
                }else{
                    echo "<script>alert('Error al registrar el libro');</script>";
                }
               
            }
            registrar_libro($_POST['txtNOMBRE'], $_FILES['imagen_libro']['name']);
            
            break;
            
        case 'modificar':
            include_once("../connection/conexion.php");
            $idTXT=$_POST['txtID'];
            $nombreTXT=$_POST['txtNOMBRE'];
            $imagenTXT=$_FILES['imagen_libro']['name'];
            $sql="UPDATE libros SET nombre='".$nombreTXT."' WHERE id='".$idTXT."'";
            $resultado = mysqli_query($conn, $sql);

            
            $sql="SELECT * FROM libros WHERE id='".$idTXT."'";
            $resultado = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($resultado);
            $imagen=$row['imagen'];
            if($imagen != ""){
                if(file_exists("../../img/".$imagen)){
                    unlink("../../img/".$imagen);
                }
            } 
            
            
            if($imagenTXT != ""){
                $sql="UPDATE libros SET imagen='".$imagenTXT."' WHERE id='".$idTXT."'";
                $resultado = mysqli_query($conn, $sql);
                $imagen_libro=$_FILES['imagen_libro']['name'];
                $imagen_temporal=$_FILES['imagen_libro']['tmp_name'];
                move_uploaded_file($imagen_temporal, "../../img/".$imagen_libro);
            }
            
            break;

        case 'cancelar': 
            header("location:productos.php");
            
            break;

        case 'seleccionar':
            include_once("../connection/conexion.php");
            $id=$_POST['libroID'];
            $sql="SELECT * FROM libros WHERE id='".$id."'";
            $resultado = mysqli_query($conn, $sql);    
            if(mysqli_num_rows($resultado)>0){
            $row = mysqli_fetch_assoc($resultado);
            $id_libro=$row['id'];
            $nombre=$row['nombre'];
            $imagen=$row['imagen'];
            }  
            
            break; 

        case 'eliminar':
            include_once("../connection/conexion.php");
            $id=$_POST['libroID'];
            $sql="SELECT * FROM libros WHERE id='".$id."'";
            $resultado = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($resultado);
            $imagen=$row['imagen'];
            if($imagen != ""){
                if(file_exists("../../img/".$imagen)){
                    unlink("../../img/".$imagen);
                }
            }

            
            $sql="DELETE FROM libros WHERE id='".$id."'";
            mysqli_query($conn, $sql);
            echo "<script>alert('Libro Eliminado Correctamente');</script>";
            echo "<script>window.location.href='productos.php';</script>";
        
            break;

        default:
            break;

    }

}

?>

<div class="col-md-5">

    <div class="card">
        <div class="card-header">Datos del Libro </div>
        <div class="card-body">
            
    <form action="productos.php" method="post" enctype="multipart/form-data" >

        <div class="mb-3">
            <label for="id" class="form-label">ID:</label>
            <input type="text" class="form-control" required readonly value="<?php echo $id_libro; ?> " name="txtID" id="id"  placeholder="ID"  />
        </div> 

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" required value="<?php echo $nombre ?> " name="txtNOMBRE" id="nombre"  placeholder="NOMBRE DEL LIBRO" required/>
        </div> 

        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen:</label>
            <input type="file" class="form-control" name="imagen_libro" id="imagen" required/>
        </div> 

        <div class="btn-group" role="group" aria-label="Button group name" >
            <button type="sudmit" class="btn btn-success" <?php echo ($accion=="seleccionar") ?"disabled" :"" ; ?> name="accion" value="agregar" > Agregar </button>

            <button type="sudmit" class="btn btn-warning"  <?php echo ($accion!="seleccionar") ?"disabled" :"" ; ?> name="accion" value="modificar" >  Modificar  </button>
            
            <button  type="sudmit" class="btn btn-info"  <?php echo ($accion!="seleccionar") ?"disabled" :"" ; ?> name="accion" value="cancelar" > Cancelar</button>
        
        </div>
    </form>
        </div>
    </div>
</div>
    
<div class="col-md-7">
    
    <div
        class="table-responsive"
    >
        <table
            class="table table-primary"
        >
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">IMAGEN</th>
                    <th scope="col">ACCIONES</th>
                </tr>
            </thead>
            <?php
            include_once("../connection/conexion.php");
            $sql="SELECT * FROM libros";
            $resultado = mysqli_query($conn, $sql);
           ; 
            foreach($resultado as $row){
                echo    "<tbody>";
                echo        "<tr>";
                echo            "<td>".$row['id']."</td>";
                echo            "<td>".$row['nombre']."</td>";
                echo            '<td><img src="http://localhost/practica/img/'.$row["imagen"].'" style="width:100px;height:100px;"></td>';
                echo            '<td>
                                <form method="post">
                                    <input type="hidden" name="libroID" value="'.$row['id'].'">
                                    <button type="submit" name="accion" value="seleccionar" class="btn btn-info">Seleccionar</button>
                                    <button type="submit" name="accion" value="eliminar" class="btn btn-danger">Eliminar</button>
                                </form>
                                </td>';
                echo        "</tr>";
                echo    "</tbody>";
            }
            ?>
        </table>
    </div>
   
</div>

<?php include_once("../template/pie.php"); ?>