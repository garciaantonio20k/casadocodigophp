<?php
echo 'Hoy es '.date('d/m/Y').PHP_EOL;
echo 'Ahora es '.date('H:i:s').PHP_EOL;

echo 'Formato y : '.date('y').PHP_EOL; // 21 = año actual en formato corto

// AM/PM
echo 'Hoy es '.date('d/m/Y A').PHP_EOL;

// mostrar dia de la semana como numero
echo 'Hoy es el dia de la semana '.date('N').PHP_EOL;

// dias que faltan para el sabado
echo 'Dias que faltan para el sabado '.(6-date('N')).PHP_EOL;

// nombre actual (En ingles)
echo 'Mes actual '.date('F').PHP_EOL;