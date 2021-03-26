<?php
require 'banco.php';

borrarTarea($conexion,$_GET['id']);

header('Location: tareas.php');
