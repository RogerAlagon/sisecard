<?php
    require_once 'database.php';
    require_once 'Funcionalidad.php';
    
    $fc = new Funcionalidad();
    $id = $_GET['cod'];
?>
<form class="omb_loginForm" name="frmeliminarAlumno" id="frmeliminarAlumno" method="post">
    <?php foreach($fc->getAlumnos2($id) as $t):?>
        <input type="text" id="codigo" name="codigo" value=<?php echo $t['ID'];?> hidden>
        <p id="dni_eli">CODIGO : <?php echo $t['CODIGO'];?></p>
        <p id="nombre_eli">NOMBRE : <?php echo $t['NOMBRE'];?></p>
        <p id="apellidos_eli">APELLIDOS : <?php echo $t['APELLIDOS'];?></p>
        <p id="programa_eli">PROGRAMA : <?php echo $t['PROGRAMA'];?></p>
    <?php endforeach;?>
</form>