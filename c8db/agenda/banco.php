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

function buscarContactos($conexion)
{
    $sql = "select id, nombre, telefono, email, descripcion, fechanacimiento, favorito from contactos";
    $res = mysqli_query($conexion, $sql);
    $data = [];
    while ($item = mysqli_fetch_assoc($res)) {
        $data[] = $item;
    }
    return $data;
}

function guardarContacto($conexion, $contacto)
{
    $sql = "insert into contactos (nombre, telefono, email, descripcion, fechanacimiento, favorito) values 
        (
        '{$contacto['nombre']}',
        '{$contacto['telefono']}',
        '{$contacto['email']}',
        '{$contacto['descripcion']}',
        '{$contacto['fechanacimiento']}',
        {$contacto['favorito']}
        )";
    $res = mysqli_query($conexion, $sql);
    if(!$res) {
        echo $sql;
        echo mysqli_error($conexion);
    }
}
