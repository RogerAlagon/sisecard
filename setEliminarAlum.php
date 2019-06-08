<?php
    require_once 'database.php';
    require_once 'Funcionalidad.php';

    $codigo = $_POST['codigo'];
    $fc = new Funcionalidad();
    $fc->setEliminarAlumnos($codigo);
?>