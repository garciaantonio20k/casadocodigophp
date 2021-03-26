<?php if (isset($listaTareas) && count($listaTareas) > 0): ?>


    <table class="table table-bordered">
        <tr class="thead-dark">
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Plazo</th>
            <th>Prioridad</th>
            <th>Finalizada</th>
            <th>Opciones</th>
        </tr>
        <?php foreach ($listaTareas as $tarea): ?>
            <tr>
                <td><?php echo $tarea['nombre']; ?></td>
                <td><?php echo $tarea['descripcion']; ?></td>
                <td><?php echo convierteFechaMySQLParaFormulario($tarea['plazo']); ?></td>

                <td>
                    <?php
                    // v1
                    //echo $tarea['prioridad'];
                    // v2 pasar de codigo a nombres
                    /*
                    if ($tarea['prioridad'] == 1) {
                        echo 'Baja';
                    }
                    if ($tarea['prioridad'] == 2) {
                        echo 'Media';
                    }
                    if ($tarea['prioridad'] == 3) {
                        echo 'Alta';
                    }
                    */
                    // v3 creamos funcion utilizable en otras vistas
                    echo obtenerNombrePrioridad($tarea['prioridad']);
                    ?>
                </td>
                <td><?php echo mostrarFinalizada($tarea['finalizada']); ?></td>
                <td>
                    <a href="editar.php?id=<?php echo $tarea['id']; ?>">Editar</a>
                    <a href="borrar.php?id=<?php echo $tarea['id']; ?>">Borrar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <div class="alert alert-success">
        No existen tareas
    </div>
<?php endif; ?>
