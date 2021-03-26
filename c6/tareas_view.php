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
                    <input type="text" class="form-control" name="nombre">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripcion (Opcional):</label>
                    <input type="text" class="form-control" name="descripcion">
                </div>
                <div class="form-group">
                    <label for="plazo">Plazo (Opcional):</label>
                    <input type="text" class="form-control" name="plazo">
                </div>

                <!-- prioridad -->

                Prioridad

                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="prioridad" checked value="baja">Baja
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="prioridad" value="media">Media
                    </label>
                </div>
                <div class="form-check-inline disabled">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="prioridad" value="alta">Alta
                    </label>
                </div>


                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="finalizada" name="finalizada" value="si">
                    <label class="form-check-label" for="finalizada">Finalizada</label>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>



    </form>

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
                <td><?php echo $tarea['plazo']; ?></td>
                <td><?php echo $tarea['prioridad']; ?></td>
                <td><?php echo $tarea['finalizada']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>
