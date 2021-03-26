<?php

// Funcion traduce CODIGO->NOMBRE
// Util en vistas para mostrar el nombre asociado a un codigo
// Estas asociaciones pueden estar en BD
function obtenerNombrePrioridad($codigo)
{
    $prioridad = '';
    switch ($codigo) {
        case 1:
            $prioridad = 'Baja';
            break;
        case 2:
            $prioridad = 'Media';
            break;
        case 3:
            $prioridad = 'Alta';
            break;
    }
    return $prioridad;
}

// Fechas
// Las fechas en los formularios se rellenan en España en formato dd/mm/yyyy
// En MySQL se guardan en formato yyyy-mm-dd
// Necesitamos funciones que pasen de un formato a otro
// Version 1: suponemos separador fecha formulario es / y para fecha Mysql es -
function convierteFechaFormularioParaMySQL($fechaFormulario)
{
    if ($fechaFormulario === '') {
        return '';
    }

    //$datos = explode('/', $fechaFormulario);
    //return $datos[2] . '-' . $datos[1] . '-' . $datos[0];
    // Desafio: usar Datetime
    $data = DateTime::createFromFormat('d/m/Y', $fechaFormulario);
    return $data->format('Y-m-d');
}

function convierteFechaMySQLParaFormulario($fechaMySQL)
{
    if ($fechaMySQL == '' || $fechaMySQL == '0000-00-00') {
        return '';
    }
    //$datos = explode('-', $fechaMySQL);
    //return $datos[2] . '/' . $datos[1] . '/' . $datos[0];
    // Desafio: usar Datetime
    $data = DateTime::createFromFormat('Y-m-d', $fechaMySQL);
    return $data->format('d/m/Y');

}

// Version 2 usando Datetime (necesita objetos)
// Es mas potente que version 1 que no comprueba formato fechas y complica mostrar otros formatos
// Podemos incluir un parametro region y si fuera USA mostrar fechas como m/d/Y
function mostrarPantallaFechaBD($fechaBD)
{
    if ($fechaBD == '' || $fechaBD == '0000-00-00') {
        return '';
    }
    // Si el campo de mysql usa datetime podemos usar el formato Y-m-d H:i:s
    $data = DateTime::createFromFormat('Y-m-d', $fechaBD);
    return $data->format('d/m/Y');
}

function mostrarFinalizada($finalizada)
{
    if ($finalizada == 1) {
        return 'Si';
    }
    return 'No';
}