<?php
  require 'database.php';
  require 'Funcionalidad.php';

  $f = new Funcionalidad();
  $codigo = $_GET['codigo'];
  $f->getAlumnos($codigo);
?>
