<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestor de tareas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h1 class="jumbotron">Gestor de tareas</h1>
    <form>
        <div class="card">
            <h5 class="card-header">Nueva tarea</h5>
            <div class="card-body">


                <div class="form-group">
                    <label for="nombre">Tarea:</label>
                    <input type="text" id="nombre" class="form-control" name="nombre">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripcion (Opcional):</label>
                    <input type="text" id="descripcion" class="form-control" name="descripcion">
                </div>
                <div class="form-group">
                    <label for="plazo">Plazo (Opcional):</label>
                    <input type="text" id="plazo" class="form-control" name="plazo">
                </div>

                <!-- prioridad -->

                Prioridad

                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="prioridad" checked value="1">Baja
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="prioridad" value="2">Media
                    </label>
                </div>
                <div class="form-check-inline disabled">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="prioridad" value="3">Alta
                    </label>
                </div>


                <div class="form-check">

                    <input type="checkbox" class="form-check-input" id="finalizada" name="finalizada" value="si">
                    <label class="form-check-label" for="finalizada">Tarea Finalizada</label>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>


    </form>


</div>
<?php if (isset($listaTareas) && count($listaTareas) > 0): ?>
    <table class="table table-bordered">
        <tr class="thead-dark">
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Plazo</th>
            <th>Prioridad</th>
            <th>Finalizada</th>
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
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <div class="alert alert-success">
        No existen tareas
    </div>
<?php endif; ?>
</body>
</html>
