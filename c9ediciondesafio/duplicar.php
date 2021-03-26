<?php

require 'banco.php';

duplicar($conexion,$_GET['id']);

header('Location: tareas.php');
