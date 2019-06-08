<?php
    require_once 'database.php';
    require_once 'Funcionalidad.php';

    $programa = $_GET['cod'];
    $fc = new Funcionalidad();
    $fc->setEliminarPrograma($programa);
?>