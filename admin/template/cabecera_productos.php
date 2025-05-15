<?php
session_start();

if(!isset($_SESSION["nombre_usuario"])) 
{ 
    header("Location: ../index.php");

} 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link rel="stylesheet" href="http://localhost/practica/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="../inicio.php">Administrador del Sitio Web</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="../inicio.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../module/productos.php">Libros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/practica/index.php">Ver sitio Web</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../module/cerrar.php">Cerrar</a>
        </li>
        
      </ul>
      
    </div>
  </div>
</nav>
<br>
  <div
    class="container">
    <br>
    <div
      class="row">