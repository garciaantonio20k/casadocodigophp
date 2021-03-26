<?php

$dbServidor = 'localhost';
$dbUsuario = 'root';
$dbPass = '';
$dbBase = 'casadocodigophp';

$conexion = mysqli_connect($dbServidor, $dbUsuario, $dbPass, $dbBase);

if (mysqli_connect_errno()) {
    echo 'Error conexion MySQL: ';
    echo mysqli_connect_error();
    die();
}

function buscarTareas($conexion)
{
    $sql = "select id, nombre, descripcion, plazo, prioridad, finalizada from tareas";
    $res = mysqli_query($conexion, $sql);
    $tareas = [];
    while ($tarea = mysqli_fetch_assoc($res)) {
        $tareas[] = $tarea;
    }
    return $tareas;
}

function guardarTarea($conexion, $tarea)
{
    $sql = "insert into tareas (nombre,descripcion,prioridad,plazo,finalizada)
    values ('{$tarea['nombre']}',
        '{$tarea['descripcion']}',
        {$tarea['prioridad']},
        {$tarea['plazo']},
        {$tarea['finalizada']}
        )";
    mysqli_query($conexion, $sql);
}
