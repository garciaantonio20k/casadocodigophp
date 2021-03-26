<?php


session_start();

require_once 'banco.php';
require_once 'utilidades.php';

$mostrarTabla = false;

// En editar no buscamos todas las tareas. Buscaremos solo la que estamos editando
//$listaTareas = buscarTareas($conexion);

// guardamos la tarea introducida por formulario
if (array_key_exists('nombre', $_GET) && $_GET['nombre'] !== '') {
    $tarea = [];

    $tarea['id'] = $_GET['id'];

    $tarea['nombre'] = $_GET['nombre'];


    /*
    if (array_key_exists('descripcion', $_GET)) {
        $tarea['descripcion'] = $_GET['descripcion'];
    } else {
        $tarea['descripcion'] = '';
    }*/
    // PHP 7 Null Coalescing Operator
    $tarea['descripcion'] = $_GET['descripcion'] ?? '';

    if (array_key_exists('plazo', $_GET)) {
        $tarea['plazo'] = convierteFechaFormularioParaMySQL($_GET['plazo']);
    } else {
        $tarea['plazo'] = null;
    }
    $tarea['prioridad'] = $_GET['prioridad'];

    // En un checkbox es suficiente comprobar que llega
    // Eso significa que es 1. En otro caso 0
    if (array_key_exists('finalizada', $_GET)) {
        $tarea['finalizada'] = 1;
    } else {
        $tarea['finalizada'] = 0;
    }
    //$listaTareas[] = $tarea;
    //guardarTarea($conexion, $tarea);
    $res = editarTarea($conexion, $tarea);

    // Redireccionar si exito al listado
    if ($res) {
        header('location:tareas.php');
        die();
    }

}

// buscar tarea por id para mostrar
$tarea = buscarTarea($conexion, $_GET['id']);

require_once 'tareas_view.php';