<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="<?php echo base_url('css/styles.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('bootstrap/bootstrap.min.css'); ?>">
  <script src="<?php echo base_url('bootstrap/bootstrap.bundle.min.js'); ?>"></script>
  <script src="<?php echo base_url(); ?>/css/jquery-3.6.0.js"></script>

    </head>

<header >
<img class="marca2"src="<?php echo base_url('/img/marca2.png'); ?>">
<div class="letras">
<h1><?php echo "proyecto taller"; ?></h1>
<h3><?php echo "Shadia Rangel"; ?></h3>
</div>
<a href="https://sena.territotio.la/css/index.php" target="_blank"><img src="<?php echo base_url('/img/logo.png'); ?>"></a>

</header>

<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Ubicación
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?php echo base_url();?>paises">Paises</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url();?>departamentos">Departamentos</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url();?>municipios">Municipios</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url();?>/cargos">Cargo</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Empleados
          </a>
          <ul class="dropdown-menu">
            
            <li class="nav-item"><a class="dropdown-item" href="<?php echo base_url('/empleados');?>">Administrar</a></li>
          </ul>
        </li>
        
      </ul>
    </div>
  </div>
</nav>