<?php include_once("template/cabecera.php"); ?>

<?php  
include_once("admin/connection/conexion.php");
$sql="SELECT * FROM libros";
$resultado = mysqli_query($conn, $sql);
?>
<?php foreach($resultado as $row){ ?>

<div class="col-md-3">
    <div class="card">
        <img class="card-img-top" src="img/<?php echo $row['imagen']; ?>" style="width:auto;height:200px;" alt="<?php echo $row['nombre']; ?>" />
        <div class="card-body">
            <h4 class="card-title"><?php echo $row['nombre']; ?></h4>
            <a name="" id=""  class="btn btn-primary"  href="#" role="button" >Ver Mas</a>
        </div>
    </div>
    <br>
</div>

<?php } ?>


<?php include_once("template/pie.php"); ?>