<?php
    require_once 'database.php';
    require_once 'Funcionalidad.php';

    $buscar = $_POST['alumno']; 
?>
<?php


function llenarAlumnos()
{
    $fc = new Funcionalidad();
    $datos = $fc->getDatosAlumnos();
    foreach($datos as $row)
    {
        $ID = $row['ID'];
        $CODIGO = $row['CODIGO'];
        $NOMBRE = $row['NOMBRE'];
        $APELLIDOS = $row['APELLIDOS'];
        $PROGRAMA = $row['PROGRAMA'];
    
        $arrayDatosAlumnos[] = array(
            'ID'=>$ID, 'CODIGO'=>$CODIGO, 
            'NOMBRE'=>$NOMBRE, 'APELLIDOS'=>$APELLIDOS,
            'PROGRAMA'=>$PROGRAMA
        );
     if(empty($arrayDatosAlumnos))
     {
        $arrayDatosAlumnos[] = array(
            'ID'=>$ID, 'CODIGO'=>$CODIGO, 
            'NOMBRE'=>$NOMBRE, 'APELLIDOS'=>$APELLIDOS,
            'PROGRAMA'=>$PROGRAMA
        );
     }
    }
    return $arrayDatosAlumnos;
}
$row = array_filter(llenarAlumnos(), function($var) use ($buscar) 
{ 
    return preg_grep("/$buscar/i", $var); 
});
if($row) 
{
    foreach ($row as $r) 
    { 
        ?>
        <tr>
            <td>
                <div class="radio">
                    <label><input type="radio" name="opcion" value=<?php echo $r['ID'];?>></label>
                </div>
            </td>
            <td><?php echo $r['CODIGO'];?></td>
            <td><?php echo $r['NOMBRE'];?></td>
            <td><?php echo $r['APELLIDOS'];?></td>
            <td><?php echo $r['PROGRAMA'];?></td>
        </tr> 
<?php }
}else{
    echo "no hay datos";
}
?>