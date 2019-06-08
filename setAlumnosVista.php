<?php
    require_once 'database.php';
    require_once 'Funcionalidad.php';
    
    $fc = new Funcionalidad();
    session_start();
    $id = $_GET['cod'];
    $_SESSION['id'] = $id;
?>
    <!-- formulario actualizar alumno -->
    <form class="omb_loginForm" name="frmactualizarAlumno" id="frmactualizarAlumno" method="post">
        <?php foreach($fc->getAlumnos2($id) as $t):?>
        <div class="form-group">
            <input type="text" class="form-control text-uppercase" name="dni_ac" id="dni_ac" placeholder="INGRESE DNI" required="required"
            hidden value="<?php echo $t['CODIGO'];?>">
        </div>
        <br>
        <div class="form-group">
            <input type="text" class="form-control text-uppercase" name="nombre_ac" id="nombre_ac" placeholder="INGRESE NOMBRE" required="required"
            value="<?php echo $t['NOMBRE'];?>">
        </div>
        <br>
        <div class="form-group">
            <input type="text" class="form-control text-uppercase" name="apellidos_ac" id="apellidos_ac" placeholder="INGRESE APELLIDO" required="required"
            value="<?php echo $t['APELLIDOS'];?>">
        </div>
        <br>
        <div class="form-group">
            <select class="form-control" name="programa_ac" id="programa_ac">
                <option selected hidden><?php echo $t['PROGRAMA'];?></option>
                <?php foreach($fc->getProgramas() as $p):?>
                <option><?php echo $p['PROGRAMA'];?></option>
                <?php endforeach;?>
            </select>
        </div>
        <br>
        <?php endforeach;?>
    </form>