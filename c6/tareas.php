<?php

session_start();

$listaTareas = [];
if (array_key_exists('tareas', $_SESSION)) {
    $listaTareas = $_SESSION['tareas'];
}
// guardamos la tarea introducida por formulario
if (array_key_exists('nombre', $_GET) && $_GET['nombre'] != '') {
    $tarea = [];
    $tarea['nombre'] = $_GET['nombre'];

    if (array_key_exists('descripcion', $_GET)) {
        $tarea['descripcion'] = $_GET['descripcion'];
    } else {
        $tarea['descripcion'] = '';
    }
    if (array_key_exists('plazo', $_GET)) {
        $tarea['plazo'] = $_GET['plazo'];
    } else {
        $tarea['plazo'] = '';
    }
    $tarea['prioridad'] = $_GET['prioridad'];
    if (array_key_exists('finalizada', $_GET)) {
        $tarea['finalizada'] = $_GET['finalizada'];
    } else {
        $tarea['finalizada'] = 'no';
    }
    $listaTareas[] = $tarea;
}
// guardamos para proxima peticion
$_SESSION['tareas'] = $listaTareas;

include_once 'tareas_view.php';