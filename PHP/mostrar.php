<?php
    $conexion = conexionBD();
    $listaTareas = mysqli_query($conexion, "SELECT * FROM  tareas");
    $i = 1;
    while($item = mysqli_fetch_array($listaTareas)){
?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $item['titulo']; ?></td>
        <td><?php echo $item['descripcion']; ?></td>
        <td><?php echo date("d-m-Y h:m:s", strtotime($item['fecha_registro'])); ?></td>
        <td>
            <a href="PHP/editar.php?idregistro=<?php echo $item['idtareas']; ?>" class="btn btn-primary">Actualizar <i class="fa fa-pencil"></i></a>
            <a href="PHP/eliminar.php?idregistro=<?php echo $item['idtareas']; ?>" class="btn btn-danger">Borrar <i class="fa fa-trash"></i></a>
        </td>
    </tr>
<?php
$i++;
    }

?>