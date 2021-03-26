<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Desafio: Agenda</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h1 class="jumbotron">Agenda</h1>
    <form>
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" name="nombre">
        </div>
        <div class="form-group">
            <label for="telefono">Telefono:</label>
            <input type="text" class="form-control" name="telefono">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" name="email">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>


    <?php
    $agenda = [];
    if (array_key_exists('agenda', $_SESSION)) {
        $agenda = $_SESSION['agenda'];
    }

    $contacto = [];
    if (array_key_exists('nombre', $_GET)
        && array_key_exists('telefono', $_GET)
        && array_key_exists('email', $_GET)) {
        $contacto['nombre'] = $_GET['nombre'];
        $contacto['telefono'] = $_GET['telefono'];
        $contacto['email'] = $_GET['email'];
        $agenda[] = $contacto;
    }

    // guardamos para proxima peticion
    $_SESSION['agenda'] = $agenda;
    var_dump($agenda);
    ?>
    <?php if (count($agenda) > 0): ?>
        <table class="table table-bordered">
            <tr class="thead-dark">
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Email</th>
            </tr>
            <?php foreach ($agenda as $contacto): ?>
                <tr>
                    <td><?php echo $contacto['nombre']; ?></td>
                    <td><?php echo $contacto['telefono']; ?></td>
                    <td><?php echo $contacto['email']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>
</body>
</html>
