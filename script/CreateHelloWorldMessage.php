<?php

$path = __DIR__;
$fileName = 'hola_mundo.txt';
$fullPath = "$path/$fileName";

file_put_contents($fullPath, 'Hola Mundo');

echo "Archivo creado con éxito en: $fullPath";
