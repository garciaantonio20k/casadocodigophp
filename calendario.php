<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calendario <?php echo date('d/m/Y'); ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h1>Calendario <?php echo date('Y'); ?></h1>
    <h2>Hoy es <?php echo date('d/m'); ?></h2>
    <table class="table table-bordered">
        <tr>
            <th>Domingo</th>
            <th>Lunes</th>
            <th>Martes</th>
            <th>Miercoles</th>
            <th>Jueves</th>
            <th>Viernes</th>
            <th>Sabado</th>
        </tr>
        <?php echo calendario(); ?>
    </table>
</div>
</body>
</html>
<?php
function lineaMes($semana)
{
    $linea = '<tr>';
    for ($i = 0; $i < 7; $i++) {
        if(array_key_exists($i,$semana)) {
            $linea .= '<td>'.$semana[$i].'</td>';
        } else {
            // el dia no existe pero necesitamos el hueco html
            $linea .= '<td></td>';
        }
    }
    $linea .= '</tr > ';
    return $linea;
}

function calendario()
{
    $calendario = '';
    $dia = 1;
    $semana = [];
    while ($dia <= 31) {
        array_push($semana, $dia);
        if (count($semana) == 7) {
            $calendario .= lineaMes($semana);
            $semana = [];
        }
        $dia++;
    }
    // añadimos el resto final de dias si hubiera
    $calendario .= lineaMes($semana);

    return $calendario;
}