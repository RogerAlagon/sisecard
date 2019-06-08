<?php
    require_once '../database.php';
    require_once '../Funcionalidad.php';

    $fnc = new Funcionalidad();
    $buscar = $_POST['alumno'];
?>
<?php $r = $fnc->getDatosAlumnoDni($buscar);?>
    <p id="codigo"><strong>CODIGO : <?php echo $r['CODIGO'];?></strong></p>
    <p><strong>NOMBRE : <?php echo $r['NOMBRE'].' '.$r['APELLIDOS'];?></strong></p>
<!--</*?php
    $datos = $fnc->getDatosAlumnos();
    $row = array_filter($datos, function($var) use ($buscar) 
    { 
        return preg_grep("/$buscar/i", $var); 
    });
    if($row)
    {
        foreach($row as $r)
        { ?>
            <p><strong>CODIGO : </*?php echo $r['CODIGO'];?></strong></p>
            <p><strong>NOMBRE : </*?php echo $r['NOMBRE'];?></strong></p>
  < /*?php }
    }else{
        echo "no hay datos";
    }
?>-->