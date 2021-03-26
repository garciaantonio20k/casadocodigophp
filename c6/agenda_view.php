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
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
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
        <div class="form-group">
            <label for="email">Descripcion:</label>
            <input type="text" class="form-control" name="descripcion">
        </div>
        <div class="form-group">
            <label for="fechanacimiento">Fecha nacimiento:</label>
            <input type="text" class="form-control" name="fechanacimiento">
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="favorito" name="favorito" value="si">
            <label class="form-check-label" for="favorito">Favorito</label>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
    <?php if (count($agenda) > 0): ?>
        <table class="table table-bordered">
            <tr class="thead-dark">
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>Descripcion</th>
                <th>Fecha Nacimiento</th>
                <th>Favorito</th>
            </tr>
            <?php foreach ($agenda as $contacto): ?>
                <tr>
                    <td><?php echo $contacto['nombre']; ?></td>
                    <td><?php echo $contacto['telefono']; ?></td>
                    <td><?php echo $contacto['email']; ?></td>
                    <td><?php echo $contacto['descripcion']; ?></td>
                    <td><?php echo $contacto['fechanacimiento']; ?></td>
                    <td style="color:orange;text-align: center;"><?php echo $contacto['favorito'] == 'si' ? '<i class="fas fa-star"></i>' : '<i class="far fa-star"></i>'; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>
</body>
</html>
