<?php
session_start();

require_once 'banco.php';
require_once 'utilidades.php';


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
        $contacto['fechanacimiento'] = convierteFechaFormularioParaMySQL($_GET['fechanacimiento']);
    }
    $contacto['favorito'] = isset($_GET['favorito']) ? $_GET['favorito'] : 0;

    guardarContacto($conexion, $contacto);

}
$contactos = buscarContactos($conexion);
include_once 'agenda_view.php';