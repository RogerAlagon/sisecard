<?php
    require_once 'database.php';
    require_once 'Funcionalidad.php';

    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $programa = $_POST['programa'];
    
    $dni = strtoupper($dni);
    $nombre = strtoupper($nombre);
    $apellidos = strtoupper($apellidos);
    $programa = strtoupper($programa);

    $fc = new Funcionalidad();
    if($fc->getDuplicadoAlumno($dni))
    {
       echo 1;
    }else{
        $fc->setAlumnos($dni,$nombre,$apellidos,$programa);
        echo 0;
    }
    
?>

