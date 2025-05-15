<?php include_once("template/cabecera.php"); ?>
<div class="row align-items-md-stretch">

<div class="col-md-6">
  <div
    class="h-100 p-5 bg-primary border rounded-3"
  >
    <h2>Bienvenido <?php  echo $_SESSION['nombre_usuario']; ?></h2>
    <p>
      Administracion de los Libros en el Sitio Web.
    </p>
    <a class="btn btn-secondary btn-lg" href="module/productos.php" role="button" >!Administrar  Libros</a>
      
    </button>
  </div>
</div>
</div>
<?php include_once("template/pie.php"); ?>