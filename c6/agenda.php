<?php
session_start();


$agenda = [];
if (array_key_exists('agenda', $_SESSION)) {
    $agenda = $_SESSION['agenda'];
}


if (array_key_exists('nombre', $_GET) && $_GET['nombre'] != '') {
    $contacto = [];

    $contacto['nombre'] = $_GET['nombre'];
    if (array_key_exists('telefono', $_GET)) {
        $contacto['telefono'] = $_GET['telefono'];
    }
    if (array_key_exists('email', $_GET)) {
        $contacto['email'] = $_GET['email'];
    }
    if (array_key_exists('descripcion', $_GET)) {
        $contacto['descripcion'] = $_GET['descripcion'];
    }
    if (array_key_exists('fechanacimiento', $_GET)) {
        $contacto['fechanacimiento'] = $_GET['fechanacimiento'];
    }
    $contacto['favorito'] = isset($_GET['favorito']) ? $_GET['favorito'] : 'no';

    $agenda[] = $contacto;
}

// guardamos para proxima peticion
$_SESSION['agenda'] = $agenda;

include_once 'agenda_view.php';