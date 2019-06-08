<?php
    require_once 'database.php';
    require_once 'Funcionalidad.php';

    $fc = new Funcionalidad();
?>
<?php foreach($fc->getDatosAlumnos() as $r):?>
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
<?php endforeach;?>