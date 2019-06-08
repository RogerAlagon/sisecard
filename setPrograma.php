<?php
    require_once 'database.php';
    require_once 'Funcionalidad.php';

    $programa = $_POST['a_programa'];
    $programa = strtoupper($programa);

    $fc = new Funcionalidad();
    if($fc->getDiplicadoPrograma($programa))
    {
        echo 1;
    }else{
        $fc->setProgramas($programa);
        echo 0;
    }
?>