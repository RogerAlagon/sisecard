<?php
    require_once 'database.php';
    require_once 'Funcionalidad.php';

    session_start();

    $dni = $_POST['dni_ac'];
    $nombre = $_POST['nombre_ac'];
    $apellidos = $_POST['apellidos_ac'];
    $programa = $_POST['programa_ac'];

    $dni = strtoupper($dni);
    $nombre = strtoupper($nombre);
    $apellidos = strtoupper($apellidos);
    $programa = strtoupper($programa);

    $fc = new Funcionalidad();
    $fc->setActualizarAlumnos($_SESSION['id'],$dni,$nombre,$apellidos,$programa);
?>