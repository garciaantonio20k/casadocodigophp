<?php session_start(); ?>
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
        <fieldset>
            <legend>Nueva tarea</legend>
        </fieldset>
        <div class="form-group">
            <label for="nombre">Tarea:</label>
            <input type="text" class="form-control" name="nombre">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>


    <?php
    // isset($variable) comprueba existe una variable
    // array_key_exits($key,$array) compruea existe en un array una key

    $listaTareas = [];
    if (array_key_exists('tareas', $_SESSION)) {
        $listaTareas = $_SESSION['tareas'];
    }
    // guardamos la tarea introducida por formulario
    if (array_key_exists('nombre', $_GET)) {
        $listaTareas[] = $_GET['nombre'];
    }
    // guardamos para proxima peticion
    $_SESSION['tareas'] = $listaTareas;
    ?>
    <table class="table table-bordered">
        <tr class="thead-dark">
            <th>Tareas</th>
        </tr>
        <?php foreach ($listaTareas as $tarea): ?>
            <tr>
                <td><?php echo $tarea; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</div>
</body>
</html>
