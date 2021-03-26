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

function buscarTareas($conexion): array
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
        ";
    if ($tarea['plazo'] === '') {
        $sql .= "null,";
    } else {
        $sql .= "'{$tarea['plazo']}',";

    }

    $sql .= "{$tarea['finalizada']} )";
    return mysqli_query($conexion, $sql);
}

function buscarTarea($conexion, $id): array
{
    $sql = "select id, nombre, descripcion, plazo, prioridad, finalizada from tareas where id=" . $id;
    $res = mysqli_query($conexion, $sql);
    return mysqli_fetch_assoc($res);
}

function editarTarea($conexion, $tarea)
{
    $sql = "UPDATE casadocodigophp.tareas SET
                  nombre = '{$tarea['nombre']}',
                  descripcion = '{$tarea['descripcion']}',
                  prioridad = {$tarea['prioridad']},";
    // Modificacion para que UPDATE para el campo fecha funcione ya que no admite valor ''
    if ($tarea['plazo'] === '') {
        $sql .= "plazo = null,";
    } else {
        $sql .= "plazo = '{$tarea['plazo']}',";
    }
    $sql .= "finalizada = {$tarea['finalizada']}
                  WHERE id=" . $tarea['id'];
    $res = mysqli_query($conexion, $sql);
    echo 'UPDATE: ' . $sql;
    echo mysqli_connect_error();
    return $res;
}

function borrarTarea($conexion, $id)
{
    $sql = 'delete from tareas where id=' . (int)$id;
    return mysqli_query($conexion, $sql);
}

// DESAFIO: duplicamos usando insert+select
// FUNCIONA
function duplicarSQL($conexion, $id)
{
    $sql = 'insert into casadocodigophp.tareas(nombre, descripcion, plazo, prioridad, finalizada)
            select nombre, descripcion, plazo, prioridad, finalizada from casadocodigophp.tareas where id=' . $id;
    return mysqli_query($conexion, $sql);
}

// DESAFIO: duplicamos usando metodos.
// FUNCIONA
function duplicar($conexion, $id)
{
    $tarea = buscarTarea($conexion, $id);
    return guardarTarea($conexion, $tarea);
}

// DESAFIO: borrar finalizadas
function borrarFinalizadas($conexion)
{
    $sql = 'delete from tareas where finalizada=1';
    return mysqli_query($conexion, $sql);
}