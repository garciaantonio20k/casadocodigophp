<?php
require 'banco.php';

borrarFinalizadas($conexion);

header('Location: tareas.php');